<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Symptoms extends Model
{
    //
    protected $fillable = [
        'name',
        'severity',
        'description',
        'date_recorded',
        'notes',
        'user_id'

    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
