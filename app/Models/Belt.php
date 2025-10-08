<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Belt extends Model
{
    protected $table = 'belts';
    protected $fillable = ['name'];

    public function registrations()
    {
        return $this->hasMany(TournamentRegistration::class, 'belt_id');
    }
}
