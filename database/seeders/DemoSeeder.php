<?php

namespace Database\Seeders;

use App\Models\Property;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Database\Seeder;

class DemoSeeder extends Seeder
{
    public function run()
    {
        // Créer un utilisateur admin (si n'existe pas)
        $user = User::first() ?? User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
        ]);

        // Créer 10 propriétés
        Property::factory(10)->create()->each(function ($property) use ($user) {
            // Pour chaque propriété, créer 1 à 3 réservations
            Booking::factory(rand(1, 3))->create([
                'user_id' => $user->id, // Lier toutes les résas à l'admin
                'property_id' => $property->id,
            ]);
        });

        // Optionnel : Créer 5 autres utilisateurs + réservations aléatoires
        User::factory(5)->create()->each(function ($guest) {
            Booking::factory(rand(1, 2))->create([
                'user_id' => $guest->id,
                'property_id' => Property::inRandomOrder()->first()->id,
            ]);
        });
    }
}
