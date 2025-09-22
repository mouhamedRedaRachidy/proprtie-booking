<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Booking;
use App\Models\Property;

class BookingManager extends Component
{
    public $propertyId;
    public $start_date;
    public $end_date;

    protected $rules = [
        'start_date' => 'required|date|after:today',
        'end_date' => 'required|date|after:start_date',
    ];

    public function mount($propertyId)
    {
        $this->propertyId = $propertyId;
    }

    public function book()
    {
        $this->validate();

        Booking::create([
            'user_id' => auth()->id(),
            'property_id' => $this->propertyId,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
        ]);

        session()->flash('message', '✅ Réservation confirmée avec succès !');

        return redirect()->route('home');
    }

    public function render()
    {
        $property = Property::findOrFail($this->propertyId);
        return view('livewire.booking-manager');
    }
}
