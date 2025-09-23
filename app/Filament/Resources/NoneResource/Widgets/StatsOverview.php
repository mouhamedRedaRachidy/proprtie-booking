<?php

namespace App\Filament\Widgets;

use App\Models\User;
use App\Models\Booking;
use App\Models\Property;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        return [
            Stat::make('Users', User::count())
                ->description('Nombre total des utilisateurs')
                ->color('success'),

            Stat::make('Bookings', Booking::count())
                ->description('Nombre total des réservations')
                ->color('info'),

            Stat::make('Properties', Property::count())
                ->description('Nombre total des propriétés')
                ->color('warning'),
        ];
    }
}
