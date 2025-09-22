<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Booking;
class Property extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'price_per_night'];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
