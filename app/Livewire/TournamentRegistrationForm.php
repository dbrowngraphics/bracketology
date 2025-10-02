<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\TournamentRegistration;

class TournamentRegistrationForm extends Component
{
    public $name = '';
    public $age = '';
    public $gender = '';
    public $weight = '';
    public $height = '';
    public $belt_rank = '';
    public $school_name = '';

    public $beltRanks = [
        'White Belt',
        'Yellow Belt',
        'Orange Belt',
        'Green Belt',
        'Blue Belt',
        'Purple Belt',
        'Brown Belt',
        'Red Belt',
        'Black Belt (1st Dan)',
        'Black Belt (2nd Dan)',
        'Black Belt (3rd Dan)',
        'Black Belt (4th Dan+)',
    ];

    protected $rules = [
        'name' => 'required|string|min:3|max:255',
        'age' => 'required|integer|min:5|max:100',
        'gender' => 'required|in:male,female,other,prefer_not_to_say',
        'weight' => 'required|numeric|min:20|max:500',
        'height' => 'required|numeric|min:50|max:300',
        'belt_rank' => 'required|string',
        'school_name' => 'required|string|min:3|max:255',
    ];

    protected $messages = [
        'name.required' => 'Please enter your full name.',
        'age.required' => 'Please enter your age.',
        'age.min' => 'Minimum age is 5 years.',
        'gender.required' => 'Please select your gender.',
        'weight.required' => 'Please enter your weight.',
        'height.required' => 'Please enter your height.',
        'belt_rank.required' => 'Please select your belt rank.',
        'school_name.required' => 'Please enter your school name.',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $validated = $this->validate();

        TournamentRegistration::create($validated);

        session()->flash('message', 'Registration submitted successfully!');

        $this->reset();
    }

    public function render()
    {
        return view('livewire.tournament-registration-form');
    }
}
