<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Availability extends Model
{
    use HasFactory;

    protected $fillable = [
        'doctor_id',
        'available_date',
        'start_time',
        'end_time',
        'duration',
        'is_booked'
    ];
    public function doctor(): BelongsTo
    {
        return $this->belongsTo(Doctor::class);
    }
}
