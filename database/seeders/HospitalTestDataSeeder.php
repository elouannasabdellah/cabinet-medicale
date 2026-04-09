<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Doctor;
use App\Models\Availability;
use Carbon\Carbon;

class HospitalTestDataSeeder extends Seeder
{
  
       public function run(): void
{
    // 1. On vide les tables pour éviter les doublons (Optionnel mais conseillé)
    \App\Models\Availability::truncate();




    // 2. Définition et création des docteurs
    $doctorsData = [
        ['name' => 'Alaoui', 'specialty' => 'Cardiologue', 'color' => 'bg-danger'],
        ['name' => 'Benchekroun', 'specialty' => 'Ophtalmologue', 'color' => 'bg-secondary'],
        ['name' => 'Tazi', 'specialty' => 'Généraliste', 'color' => 'bg-success'],
        ['name' => 'Moussaoui', 'specialty' => 'Dermatologue', 'color' => 'bg-info'],
    ];

   
        // 3. Si c'est Benchekroun, on lui ajoute son planning de test
       
            $planning = [
                ['date' => '2026-03-30', 'start' => '09:00', 'end' => '13:00'], // Lundi
                ['date' => '2026-03-31', 'start' => '08:30', 'end' => '13:30'], // Mardi
                ['date' => '2026-04-01', 'start' => '09:00', 'end' => '14:00'], // Mercredi
                ['date' => '2026-04-02', 'start' => '14:00', 'end' => '18:00'], // Jeudi
                ['date' => '2026-04-03', 'start' => '14:30', 'end' => '18:00'], // Vendredi
                ['date' => '2026-04-04', 'start' => '09:00', 'end' => '12:00'], // Samedi
            ];

        foreach ($planning as $slot) {
            \App\Models\Availability::create([
                'doctor_id'      => 1, // L'ID de Benchekroun
                'available_date' => $slot['date'],
                'start_time'     => $slot['start'],
                'end_time'       => $slot['end'],
                'duration'       => 30,
                'is_booked'      => false,
            ]);
        }
           
        }
    }

