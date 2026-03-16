<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Appointment;

class Doctor extends Model
{
    //
    protected $fillable = [
        'name',
        'specialty',
        'city',
        'years_of_experience',
        'consultation_price',
        'available_days'
    ];
      protected $casts = [
        'available_days' => 'array',
    ];
    
    public function appoinments(){
        return $this->hasMany(Appointment::class);
    }
}
