<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'specialty', 'color'];

    public function availabilities() {
        return $this->hasMany(Availability::class);
    }
    // doctor plusieurs rdvs
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
