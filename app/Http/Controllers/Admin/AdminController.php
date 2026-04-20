<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Consultation;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //
    public function dashboard()
    {

        // 1. Données dynamiques pour les Cartes
        $stats = [
            'medecins' => User::where('role', 'doctor')->count(),
            'patients' => Patient::count(),
            'rdv_aujourdhui' => Appointment::whereDate('date', now())->count(),
            'consultations' => Consultation::count(),
        ];
        // 1. Récupération des RDV par mois
        $rdvDataRaw = Appointment::select(
            DB::raw('count(*) as total'),
            DB::raw('MONTH(date) as month')
        )
            ->whereYear('date', date('Y'))
            ->groupBy('month')
            ->pluck('total', 'month')->all();
        // 2. Récupération des Consultations par mois
        // (On suppose que votre table consultations a une colonne 'created_at' ou 'date')
        $consDataRaw = Consultation::select(
            DB::raw('count(*) as total'),
            DB::raw('MONTH(created_at) as month')
        )
            ->whereYear('created_at', date('Y'))
            ->groupBy('month')
            ->pluck('total', 'month')->all();

        // 3. NOUVEAU : Patients par mois
        $patDataRaw = Patient::select(DB::raw('count(*) as total'), DB::raw('MONTH(created_at) as month'))
            ->whereYear('created_at', date('Y'))->groupBy('month')->pluck('total', 'month')->all();

        // 2 ème graphe
        // Récupération des spécialités (Exemple: Cardiologie, Pédiatrie, etc.)

        // Récupération des spécialités via une jointure entre users et doctors
        $specialties = \App\Models\User::join('doctors', 'users.id', '=', 'doctors.user_id')
            ->select('doctors.specialty', \Illuminate\Support\Facades\DB::raw('count(*) as total'))
            ->groupBy('doctors.specialty')
            ->get();

        $specialtyLabels = $specialties->pluck('specialty')->all();
        $specialtyData = $specialties->pluck('total')->all();

        // Remplissage des 12 mois pour les deux datasets
        $chartRdv = [];
        $chartCons = [];
        $chartPat = [];
        for ($i = 1; $i <= 12; $i++) {
            $chartRdv[] = $rdvDataRaw[$i] ?? 0;
            $chartCons[] = $consDataRaw[$i] ?? 0;
            $chartPat[] = $patDataRaw[$i] ?? 0;
        }


        return view("admin.dashboard", compact('stats', 'chartRdv', 'chartCons', 'chartPat', 'specialtyLabels', 'specialtyData'));
    }
}
