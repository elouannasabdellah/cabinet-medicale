<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;

    // Dans Consultation.php
protected $fillable = ['patient_id', 'doctor_id', 'motif', 'diagnostic', 'temperature', 'tension', 'fc_bpm', 'poids', 'observations'];

public function prescriptions() {
    return $this->hasMany(Prescription::class);
}

public function doctor() {
    return $this->belongsTo(Doctor::class);
}

public function patient()
{
    // On lie la consultation au modèle Patient via la clé 'patient_id'
    return $this->belongsTo(Patient::class, 'patient_id');
}


}
