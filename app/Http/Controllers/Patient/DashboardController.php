<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Consultation;
use App\Models\Patient;
use App\Models\Prescription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $patient = auth()->user()->patient;
        $maintenant = now();
        // 1. Récupérer le prochain rendez-vous (le plus proche dans le futur)
        $prochainRDV = Appointment::where('patient_id', $patient->id)
            ->where('date', '>=', now())
            ->orderBy('date', 'asc')
            ->first();


        $derniereConsultation = null;

        // 1. Récupérer la dernière consultation du patient connecté
        // 1. Trouver l'ID du patient associé à l'utilisateur connecté (user_id)


        // 2. Chercher la dernière consultation avec le BON patient_id (le id de la table patients)
        $derniereConsultation = \App\Models\Consultation::where('patient_id', $patient->id)
            // On prend l'ID le plus grand
            ->first();

        // 2. Calcul des statistiques pour les 4 cartes
        $stats = [
            // RDV à venir : Statut 'pending' ou 'confirmed' avec date future
            'rdv_a_venir' => \App\Models\Appointment::where('patient_id', $patient->id)
                ->where(function ($query) use ($maintenant) {
                    $query->where('date', '>', $maintenant->format('Y-m-d'))
                        ->orWhere(function ($q) use ($maintenant) {
                            $q->where('date', '=', $maintenant->format('Y-m-d'))
                                ->where('time', '>', $maintenant->format('H:i:s'));
                        });
                })
                ->whereIn('status', ['pending', 'confirmed'])
                ->count(),

            // Nombre total de consultations passées
            'total_consultations' => Consultation::where('patient_id', $patient->id)->count(),

            // Nombre d'ordonnances (lié via les consultations du patient)
            'total_ordonnances' => Prescription::whereHas('consultation', function ($query) use ($patient) {
                $query->where('patient_id', $patient->id);
            })->count(),

            // Annulations : Statut 'canceled' dans la table appointments
            'annulations' => \App\Models\Appointment::where('patient_id', $patient->id)
                ->where('status', 'canceled')
                ->count(),
        ];


        // // 2. Récupérer les statistiques pour tes cartes (RDV à venir, Consultations, etc.)
        // $stats = [
        //     'total_rdv' => Appointment::where('patient_id', Auth::id())->where('date', '>=', now())->count(),
        //     'consultations' => Appointment::where('user_id', Auth::id())->where('status', 'confirmed')->count(),
        //     'ordonnances' => 5, // À lier à ta table Ordonnances plus tard
        //     'annulations' => Appointment::where('user_id', Auth::id())->where('status', 'cancelled')->count(),
        // ];

        // 3. Envoyer le tout à la vue
        return view('patient.dashboard', compact('prochainRDV', 'derniereConsultation', 'stats'));
    }
}
