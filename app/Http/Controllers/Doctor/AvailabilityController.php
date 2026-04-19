<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Availability;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AvailabilityController extends Controller
{
    /**
     * Afficher la page des disponibilités
     */
    public function index()
    {
        // $doctorId = Auth::id();
        
        // On récupère les dispos existantes pour les afficher dans le formulaire
        // On trie par date pour avoir une cohérence
        $currentAvailabilities = Availability::where('doctor_id', auth()->user()->doctor->id)
            // ->where('available_date', '>=', now()->toDateString())
            ->get()
           ->keyBy(function($item) {
            // On indexe par le nom du jour en anglais (ex: "Monday")
             return \Carbon\Carbon::parse($item->available_date)->format('l');
        });
         return view('doctor.mes_disponibilités', compact('currentAvailabilities'));
    }

    /**
     * Enregistrer les disponibilités pour la semaine
     */
    public function store(Request $request)
    {
       
        // 1. On récupère l'ID du docteur connecté (indispensable !)
            $doctor = auth()->user()->doctor;

        // Traduction pour que Carbon comprenne les jours de ta vue Blade
        $daysMapping = [
            'Lundi'    => 'Monday',
            'Mardi'    => 'Tuesday',
            'Mercredi' => 'Wednesday',
            'Jeudi'    => 'Thursday',
            'Vendredi' => 'Friday',
            'Samedi'   => 'Saturday',
            'Dimanche' => 'Sunday',
        ];

        // On valide un minimum les données reçues
        $request->validate([
            'days' => 'required|array',
        ]);

        foreach ($request->days as $dayName => $data) {
            // Si le bouton toggle (checkbox) est activé pour ce jour
            // CAS 1 : C'est coché -> On crée ou on met à jour
            if (isset($data['active']) && $data['active'] == 'on') {
                
                // On calcule la date du prochain jour correspondant
                // Exemple : Si on est mercredi et qu'on traite "Lundi", 
                // Carbon trouvera la date du lundi suivant.
                $targetDate = Carbon::now()->next($daysMapping[$dayName])->toDateString();
                 
                 // 1. On cherche si une dispo existe déjà pour ce docteur à cette date
                 
                  $existingDispo = Availability::where('doctor_id', auth()->user()->doctor->id)
                                 ->where('available_date', $targetDate)
                                 ->first();

                    $startTime = $data['start'] ?? ($existingDispo->start_time ?? '09:00');
                    $endTime   = $data['end']   ?? ($existingDispo->end_time   ?? '18:00');
                 Availability::updateOrCreate(
                    [
                        'doctor_id'      => $doctor->id,
                        'available_date' => $targetDate,
                    ],
                    [
                        'start_time' =>  $startTime,
                        'end_time'   =>  $endTime,
                         'duration'   => 30, // Durée fixe de 30min comme sur ta capture BD
                        'is_booked'  => 0,  // Par défaut, le créneau est libre
                    ]
                );
            }else{
                    // CAS 2 : Ce n'est pas coché -> On supprime la dispo pour ce jour là
                    // Cela permet au docteur de passer en "Repos" réellement
                    Availability::where('doctor_id', auth()->user()->doctor->id)
                    ->where('available_date', $targetDate)
                    ->delete();
        
            }
        }

    return redirect()->route('doctor.availability.index')->with('success', 'Planning mis à jour !');  

    }

    // pour la page planning calendar de doctor

    public function calendarIndex()
    {
        return view('doctor.calendar');
    }

    // Pour envoyer les données au calendrier (Format JSON)
    
        public function getEvents()
    {
        // On récupère les rendez-vous du docteur connecté
        $appointments = Appointment::where('doctor_id', 2)    //auth()->id()
                        // ->where('status', '!=', 'canceled') // On masque les annulés pour libérer l'espace
                        ->get();

        $events = $appointments->map(function($app) {
            // Fusion de la date (Y-m-d) et de l'heure (H:i)
            // Résultat attendu par le JS : "2026-04-03T14:30"
            $startDateTime = $app->date->format('Y-m-d') . 'T' . $app->time;

            return [
                'id'    => $app->id,
                'title' => $app->patient_name . " - " . $app->reason,
                'start' => $startDateTime,
                'extendedProps' => [
                'reason' => $app->reason, // <--- C'est cette ligne qui remplit "Motif"
                'phone'  => $app->patient_phone
                    ],
                // Pas besoin de 'end', FullCalendar gère la taille du bloc tout seul
                'backgroundColor' => (function() use ($app) {
                    return match ($app->status) {
                        'pending'  => '#f39c12', // 
                        'confirmed' => '#2ecc71', 
                        'canceled'  => '#c0392b', 
                        default     => '#3498db', 
                    };
                })(),           
               'borderColor' => 'transparent',
            ];
        });

        return response()->json($events);
    }


}