<?php

namespace Database\Factories;

use App\Models\Property;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookingFactory extends Factory
{
    public function definition()
    {
        // start_date: بين اليوم و شهر قدام
        $startDate = $this->faker->dateTimeBetween('now', '+1 month');

        // end_date: بعد start_date بواحد الأسبوع مثلاً
        $endDate = (clone $startDate)->modify('+'.rand(1, 7).' days');

        return [
            'user_id' => User::factory(),
            'property_id' => Property::factory(),
            'start_date' => $startDate->format('Y-m-d'),
            'end_date' => $endDate->format('Y-m-d'),
        ];
    }
}
