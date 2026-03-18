<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HealthAdvice extends Model
{
    //

    protected $fillable = [
        "user_id",
        'symptoms_context',
        'advice'
    ];
}
