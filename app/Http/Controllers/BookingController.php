<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;

class BookingController extends Controller
{
    public function create(Property $property)
    {
        // كنعطي الـ Blade المتغير $property
        return view('bookings.create', compact('property'));
    }
}
