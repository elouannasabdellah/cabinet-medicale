<?php

use App\Http\Controllers\Doctor\AvailabilityController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Patient\DashboardController; 

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// si en a besoin seulement de authentification
// Route::middleware('auth')->group(function () {

Route::middleware(['auth', 'role:patient'])->prefix('patient')->group(function () {
    // On appelle la méthode 'index' du nouveau contrôleur
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('patient.dashboard');
    // Route::view('/dashboard', 'patient.dashboard')->name('patient.dashboard');;
    
    Route::view('/rdv', 'patient.rdv-list')->name('patient.rdv-list');;
    Route::view('/rdv/create', 'patient.rdv-create')->name('patient.rdv-create');;
    // Route::view('/rdv/date', 'patient.rdv-date')->name('patient.rdv-date');
});

// 4. Espace DOCTEUR (Protégé par auth + role:doctor)
// Route::middleware(['auth', 'role:doctor'])->prefix('doctor')->group(function () {
//     Route::view('/dashboard', 'doctor.dashboard')->name('doctor.dashboard');
//     Route::view('/planning', 'doctor.planning')->name('doctor.planning');
//     // Ajoute ici tes autres routes pour les médecins
// });
Route::prefix('doctor')->group(function () {

    Route::view('/dashboard', 'doctor.dashboard')->name('doctor.dashboard');
    Route::get('/disponnibilite', [AvailabilityController::class, 'index'])
        ->name('doctor.availability.index');;
});
Route::post('/doctor/disponnibilite', [AvailabilityController::class, 'store'])
    ->name('doctor.availability.store');
 
Route::get('/doctor/calendar', [AvailabilityController::class, 'calendarIndex'])->name('doctor.calendar');
Route::get('/doctor/events', [AvailabilityController::class, 'getEvents']);

// 5. Espace ADMIN (Protégé par auth + role:admin)
// Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
//     Route::view('/dashboard', 'admin.dashboard')->name('admin.dashboard');
//     Route::view('/users', 'admin.users-list')->name('admin.users');
//     // Ajoute ici tes autres routes pour l'administration
// });


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
