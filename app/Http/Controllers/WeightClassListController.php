<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TournamentRegistration;
use App\Models\WeightClass;

class WeightClassListController extends Controller
{
    public function index()
    {
        // Load all weight classes with class name
        $weightClasses = WeightClass::with('className')->get();

        // For each weight class, get people who fit into it
        $data = $weightClasses->map(function ($weightClass) {
            $people = TournamentRegistration::where('gender', $weightClass->gender)
                ->where('age', '>=', $weightClass->division === 'adult' ? 18 : 0) // basic filter adult/kid
                ->when($weightClass->max_weight, function ($query) use ($weightClass) {
                    $query->where('weight', '<=', $weightClass->max_weight);
                })
                ->get();

            return [
                'weight_class' => $weightClass,
                'people' => $people,
            ];
        });

        return view('weight_classes_list.index', compact('data'));
    }
}
