<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Doctor\AvailabilityController;
use App\Http\Controllers\Doctor\DoctorController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Patient\DashboardController;
use App\Http\Controllers\patient\HistoriqueController;

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

    Route::get('/historique', [HistoriqueController::class, 'index'])->name('patient.historique');

    Route::get('/ordonnance', [HistoriqueController::class, 'ordonnance'])->name('patient.ordonnance');
    Route::get('/ordonnance/download/{id}', [HistoriqueController::class, 'downloadPDF'])->name('patient.ordonnance.download');
});

// 4. Espace DOCTEUR (Protégé par auth + role:doctor)
// Route::middleware(['auth', 'role:doctor'])->prefix('doctor')->group(function () {
//     Route::view('/dashboard', 'doctor.dashboard')->name('doctor.dashboard');
//     Route::view('/planning', 'doctor.planning')->name('doctor.planning');
//     // Ajoute ici tes autres routes pour les médecins
// });
Route::middleware(['auth'])->prefix('doctor')->group(function () {

    Route::view('/dashboard', 'doctor.dashboard')->name('doctor.dashboard');
    Route::get('/disponnibilite', [AvailabilityController::class, 'index'])
        ->name('doctor.availability.index');

    Route::get('/dashboard', [DoctorController::class, 'dashboardIndex'])->name('doctor.dashboard');

    Route::get('/rdv', [DoctorController::class, 'index'])->name('doctor.rdv');
    Route::patch('/rdv/{id}/status', [DoctorController::class, 'updateStatus'])->name('rdv.status');

    // Route::get('/consultation', [DoctorController::class, 'consultation'])->name('doctor.consultation');
    Route::get('/consultation/{id}', [DoctorController::class, 'createConsultation'])
        ->name('doctor.consultation');
    Route::post('/consultation/store', [DoctorController::class, 'store'])
        ->name('doctor.consultation.store');
});
Route::post('/doctor/disponnibilite', [AvailabilityController::class, 'store'])
    ->name('doctor.availability.store');

Route::get('/doctor/calendar', [AvailabilityController::class, 'calendarIndex'])->name('doctor.calendar');
Route::get('/doctor/events', [AvailabilityController::class, 'getEvents']);

// 5. Espace ADMIN (Protégé par auth + role:admin)
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {

    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/add-doctor', [AdminController::class, 'createDoctor'])->name('admin.doctors.create');
    Route::post('/add-doctor', [AdminController::class, 'storeDoctor'])->name('admin.doctors.store');

    Route::get('/users', [AdminController::class, 'index'])->name('admin.users.index');
    Route::delete('/admin/users/{user}', [AdminController::class, 'destroy'])->name('admin.users.destroy');

    // Dans ton groupe de routes admin
    Route::get('/rendez-vous', [AdminController::class, 'allAppointments'])->name('admin.appointments.index');
    Route::delete('/appointments/{id}', [AdminController::class, 'destroyAppointment'])->name('admin.appointments.destroy');
});


// Route::get('/dashboard', function () {   
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/notifications/read-all', [DoctorController::class, 'readAllNotifications'])->name('notifications.readAll');
});

require __DIR__ . '/auth.php';
