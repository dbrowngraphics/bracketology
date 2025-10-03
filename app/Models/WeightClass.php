<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WeightClass extends Model
{
    protected $table = 'weight_classes';
    protected $fillable = ['division', 'gender', 'class_name_id', 'max_weight', 'unit'];

    public function className()
    {
        return $this->belongsTo(WeightClassName::class, 'class_name_id');
    }
}
