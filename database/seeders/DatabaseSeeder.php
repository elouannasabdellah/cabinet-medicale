<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // --- 1. CRÉATION DES ADMINS ---
        User::create([
            'name' => 'admin',
            'email' => 'a.elouannas8489@uca.ac.ma',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Support Admin',
            'email' => 'support@uca.ac.ma',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);

        // --- 2. CRÉATION DES DOCTEURS (Table users + table doctors) ---
        $doc1 = User::create([
            'name' => 'Dr. Alaoui',
            'email' => 'abdellahmath296@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'doctor',
        ]);
        Doctor::create([
            'user_id' => $doc1->id,
            'name' => 'Alaoui',
            'specialty' => 'Cardiologue',
            'color' => 'bg-danger'
        ]);

        $doc2 = User::create([
            'name' => 'Dr. Tazi',
            'email' => 'tazi@uca.ac.ma',
            'password' => Hash::make('password123'),
            'role' => 'doctor',
        ]);
        Doctor::create([
            'user_id' => $doc2->id,
            'name' => 'Tazi',
            'specialty' => 'Généraliste',
            'phone' => '0666778899',
            'color' => 'bg-success'
        ]);

        // Ajoute ici les 2 autres docteurs sur le même modèle...

        // --- 3. CRÉATION DES PATIENTS (Table users + table patients) ---
        $pat1 = User::create([
            'name' => 'abdellah',
            'email' => 'abdellahuca2018@gmail.com',
            'password' => Hash::make('password123'),
            'role' => 'patient',
        ]);
        Patient::create([
            'user_id' => $pat1->id,
            'phone' => '0612345678',
            'address' => 'Rue Mohamed V, Marrakech',
            'birth_date' => '1990-05-15',
            'gender' => 'M'
        ]);

        // Ajoute le 2ème patient ici...
    }
}