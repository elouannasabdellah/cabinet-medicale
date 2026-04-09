<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    
    protected $casts = [
        'date' => 'date',
    ];

    protected $fillable = ['doctor_id', 'date', 'time', 'status', 'patient_name', 'patient_phone', 'reason','patient_id'];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}

// Seeder qui remplit les deux tables doctors et availabilities/ POUR LE TEST
// php artisan make:seeder HospitalTestDataSeeder  
