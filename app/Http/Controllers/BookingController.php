<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function create(Property $property)
    {
        return view('bookings.create', ['propertyId' => $property->id]);
    }
}
