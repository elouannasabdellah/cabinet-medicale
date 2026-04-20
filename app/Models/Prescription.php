<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Prescription extends Model
{
    use HasFactory;
    protected $fillable = ['consultation_id', 'medicament_nom', 'posologie', 'duree'];

    public function consultation()
    {
        return $this->belongsTo(Consultation::class, 'consultation_id');
    }
}
