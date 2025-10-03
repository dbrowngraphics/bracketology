<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WeightClassName extends Model
{
    protected $table = 'weight_class_names';
    protected $fillable = ['name'];

    public function weightClasses()
    {
        return $this->hasMany(WeightClass::class, 'class_name_id');
    }
}
