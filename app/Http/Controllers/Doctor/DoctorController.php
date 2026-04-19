<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Consultation;
use App\Models\Prescription;

use Illuminate\Http\Request;
use App\Notifications\AppointmentConfirmed;
use App\Notifications\AppointmentCancelled;

use function Ramsey\Uuid\v1;

class DoctorController extends Controller
{
    public function index() {

        $doctor = auth()->user()->doctor;
    // On récupère les RDV du docteur connecté (id = 2 d'après ton image)
      $rendezVous = Appointment::where('doctor_id',$doctor->id)   //auth()->id()
        ->orderBy('date', 'asc')
        ->orderBy('time', 'asc')
        ->get();

        return view("doctor.rdv",compact('rendezVous'));
    }

    public function updateStatus(Request $request, $id)
    {
        // 1. Trouver le rendez-vous par son ID
        $rdv = Appointment::with(['patient', 'doctor'])->findOrFail($id);
        
        // 2. Mise à jour simple du statut
        $rdv->update([
            'status' => $request->status
        ]);
        
        // On récupère le compte utilisateur du patient
        $user = $rdv->patient->user ?? null;

      if ($user) {
        if ($request->status === 'confirmed') {
            $user->notify(new AppointmentConfirmed($rdv));
        } 
        // Vérifie si c'est 'cancelled', 'annulé', ou 'annuler' dans ta base
        elseif ($request->status === 'canceled') { 
            $user->notify(new AppointmentCancelled($rdv));
        }
    }

        // 3. Retour à la page des rendez-vous
        return redirect()->back()->with('success', 'Statut mis à jour !');
    }

    public function createConsultation($id){

        // On récupère le RDV. Laravel trouvera automatiquement doctor_id et patient_id
     $rdv = Appointment::with(['patient', 'doctor'])->findOrFail($id);

        return view("doctor.consultation",compact('rdv'));

    }


    public function store(Request $request)
{
    // 1. Validation des données de base
    $request->validate([
        'patient_id' => 'required',
        'doctor_id'  => 'required',
        'diagnostic' => 'required|string',
        "observations"=>'required|string',
    ]);

    // 2. Création de la consultation
    $consultation = Consultation::create([
        'patient_id'  => $request->patient_id,
        'doctor_id'   => auth()->id(),
        'motif'       => $request->motif,
        'diagnostic'  => $request->diagnostic,
        'temperature' => $request->temperature,
        'tension'     => $request->tension,
        'fc_bpm'      => $request->fc_bpm,
        'poids'       => $request->poids,
        'observations'=> $request->observations,
    ]);

    // 3. Enregistrement des médicaments (Prescriptions)
    // On vérifie si des médicaments ont été ajoutés via le bouton JS
    if ($request->has('medicaments')) {
        foreach ($request->medicaments as $item) {
            // On vérifie que le nom du médicament n'est pas vide
            if (!empty($item['nom'])) {
                Prescription::create([
                    'consultation_id' => $consultation->id ,
                    'medicament_nom' => $item['nom'],
                    'posologie' => $item['posologie'] ?? '',
                    'duree'     => $item['duree'] ?? '',
                ]);
            }
        }
    }

    // 4. Redirection vers l'ordonnance ou la liste des RDV
    // return redirect()->route('doctor.consultation')
    //                  ->with('success', 'La consultation a été enregistrée avec succès.');
    return back()->with('success', "La consultation a été enregistrée avec succès." );

}

public function dashboardIndex(){

    // 1. Récupérer le docteur connecté via sa relation avec User
    $doctor = auth()->user()->doctor;

    // Sécurité : Si l'utilisateur n'a pas de profil docteur
    if (!$doctor) {
        return redirect()->back()->with('error', 'Profil docteur introuvable.');
    }

    $stats = [
        'rdv_count'  => Appointment::where('doctor_id', $doctor->id)->where('date', '>=', now()->toDateString())
        ->where('status', '!=', 'cancelled')
        ->count(),
        'cons_count' => Consultation::where('doctor_id', $doctor->id)->count(),
        'ord_count' => Consultation::where('doctor_id', $doctor->id)->has('prescriptions')->count(), // Compte uniquement les consultations qui ont une entrée liée dans la table prescriptions->count(),
        'ann_count'  => Appointment::where('doctor_id', $doctor->id)->where('status', 'cancelled')->count(),
    ];

    // 3. Planning du jour (Cards de gauche)
    $planningDuJour = Appointment::with('patient')
        ->where('doctor_id', $doctor->id)
        // ->whereDate('date', now())
        ->orderBy('time', 'asc')
        ->take(3)
        ->get();

        // 4. Activité récente (Timeline de droite)
    $recentActivity = Consultation::with('patient')
        ->where('doctor_id', $doctor->id)
        ->latest()
        ->take(3)
        ->get();


        // 1. Récupérer les données existantes
        $rawStats = Appointment::selectRaw('DATE(date) as date, count(*) as count')
            ->where('doctor_id', $doctor->id)
            ->whereBetween('date', [now()->startOfWeek(), now()->endOfWeek()])
            ->groupBy('date')
            ->pluck('count', 'date');

        // 2. Préparer les jours de la semaine (Lundi à Dimanche)
        $days = [];
        $counts = [];

        for ($i = 0; $i < 7; $i++) {
            // On part du début de la semaine et on ajoute $i jours
            $date = now()->startOfWeek()->addDays($i);
            $dateString = $date->toDateString();
            
            // On formate le label (ex: "Lun 13")
            $days[] = $date->translatedFormat('D d');
            
            // Si la date existe dans la DB on prend le compte, sinon 0
            $counts[] = $rawStats[$dateString] ?? 0;
        }

        return view("doctor.dashboard", compact('doctor', 'stats', 'planningDuJour', 'recentActivity','days' , 'counts'));

    }

    public function readAllNotifications()
    {
        // Récupère toutes les notifications non lues et les marque comme lues
        auth()->user()->unreadNotifications->markAsRead();

        // Redirige l'utilisateur là où il était avec un petit message
        return back()->with('success', 'Toutes les notifications ont été marquées comme lues.');
    }



}

