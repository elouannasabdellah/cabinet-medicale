<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','name', 'specialty', 'color'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function availabilities() {
        return $this->hasMany(Availability::class);
    }
    
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }


}