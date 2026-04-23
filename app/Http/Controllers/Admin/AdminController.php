<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Consultation;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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

    // pour create un doctor pour l'admin
    public function createDoctor()
    {
        // On retourne la vue du formulaire
        return view('admin.doctors.create');
    }
    public function storeDoctor(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'role'      => 'required|in:admin,doctor',
            // On ne demande la spécialité que si c'est un docteur
            'specialty' => $request->role === 'doctor' ? 'required|string' : 'nullable',

        ]);

        DB::transaction(function () use ($request) {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
            ]);

            if ($request->role === 'doctor') {
                $colors = ['bg-primary', 'bg-success', 'bg-danger', 'bg-warning', 'bg-info', 'bg-secondary'];

                Doctor::create([
                    'user_id' => $user->id,
                    'name' => $request->name,
                    'specialty' => $request->specialty,
                    'phone' => $request->phone,
                    'color'     => $colors[array_rand($colors)], // Choisit une couleur au hasard, // Optionnel : pour vos graphique

                ]);
            }
        });
        return redirect()->back()->with('success', 'Utilisateur créé avec succès !');
    }
}


// mysql://root:KrqgOrRWDNUUkaFTZbRNUJwHEMomCJPs@mysql.railway.internal:3306/railway
//DATABASE_URL