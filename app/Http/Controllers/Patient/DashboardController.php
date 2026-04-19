<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {       
        $patient = auth()->user()->patient;
        // 1. Récupérer le prochain rendez-vous (le plus proche dans le futur)
        $prochainRDV = Appointment::where('patient_id', $patient->id)
            ->where('date', '>=', now())
            ->orderBy('date', 'asc')
            ->first();

        // // 2. Récupérer les statistiques pour tes cartes (RDV à venir, Consultations, etc.)
        // $stats = [
        //     'total_rdv' => Appointment::where('patient_id', Auth::id())->where('date', '>=', now())->count(),
        //     'consultations' => Appointment::where('user_id', Auth::id())->where('status', 'confirmed')->count(),
        //     'ordonnances' => 5, // À lier à ta table Ordonnances plus tard
        //     'annulations' => Appointment::where('user_id', Auth::id())->where('status', 'cancelled')->count(),
        // ];

        // 3. Envoyer le tout à la vue
        return view('patient.dashboard', compact('prochainRDV'));
    }
}