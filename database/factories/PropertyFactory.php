<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->words(3, true), // Ex: "Luxury Beach Villa"
            'description' => $this->faker->paragraphs(2, true), // 2 paragraphes aléatoires
            'price_per_night' => $this->faker->randomFloat(2, 50, 500), // entre 50€ et 500€
        ];
    }
}
