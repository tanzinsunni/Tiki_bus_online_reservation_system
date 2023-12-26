<?php

namespace App\Models;

use App\Models\Trip;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }

    public function tripsFrom()
    {
        return $this->hasMany(Trip::class, 'start_location_id');
    }

    public function tripsTo()
    {
        return $this->hasMany(Trip::class, 'end_location_id');
    }
}
