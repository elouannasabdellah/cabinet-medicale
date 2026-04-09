<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\Patient;
use Illuminate\Support\Facades\DB; // Pour sécuriser la double insertion

use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

    // Utilisation d'une Transaction DB pour être sûr que soit tout s'enregistre, soit rien
    return DB::transaction(function () use ($request) {

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'patient', // Défini par défaut ici
        ]);

        // 2. Créer automatiquement le patient lié
        Patient::create([
            'user_id' => $user->id,
            // Tu peux laisser les autres champs vides au début
        ]);

        event(new Registered($user));

        Auth::login($user);

        // return redirect(RouteServiceProvider::HOME);
        return redirect(route('patient.dashboard', absolute: false));

        });

      }
    
}
