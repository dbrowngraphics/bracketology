<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;



class TournamentRegistration extends Model
{
    protected $fillable = [
        'name', 'age', 'gender', 'weight', 
        'height', 'belt_rank', 'school_name'
    ];
}
