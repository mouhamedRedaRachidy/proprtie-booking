<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Booking;
use App\Models\Property;
use Illuminate\Support\Facades\Auth;

class BookingManager extends Component
{
    public $propertyId;
    public $start_date;
    public $end_date;

    //validation
    protected $rules = [
        'start_date' => 'required|date|after:today',
        'end_date' => 'required|date|after:start_date',
    ];

    //message des errors
    protected $messages = [
        'start_date.required' => 'La date de début est obligatoire.',
        'start_date.date' => 'La date de début doit être une date valide.',
        'start_date.after' => 'La date de début doit être après aujourdhui.',
        'end_date.required' => 'La date de fin est obligatoire.',
        'end_date.date' => 'La date de fin doit être une date valide.',
        'end_date.after' => 'La date de fin doit être après la date de début.',
    ];

    public function mount($propertyId)
    {
        $this->propertyId = $propertyId;
    }

    public function book()
    {
        $this->validate();

        //vrifier si déjà réservé
        $overlapping = Booking::where('property_id', $this->propertyId)
            ->where(function ($query) {
                $query->whereBetween('start_date', [$this->start_date, $this->end_date])
                    ->orWhereBetween('end_date', [$this->start_date, $this->end_date])
                    ->orWhere(function ($q) {
                        $q->where('start_date', '<=', $this->start_date)
                            ->where('end_date', '>=', $this->end_date);
                    });
            })->exists();

        if ($overlapping) {
            $this->addError('start_date', 'Ce bien est deje reserve pour ces dates.');
            return;
        }

        Booking::create([
            'user_id' => Auth::user()->id,
            'property_id' => $this->propertyId,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
        ]);


        session()->flash('message', 'Reservation confirmée avec succes');


        $this->start_date = null;
        $this->end_date   = null;
    }

    public function render()
    {
        $property = Property::findOrFail($this->propertyId);
        return view('livewire.booking-manager', compact('property'));
    }
}
