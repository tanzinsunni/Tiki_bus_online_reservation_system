<?php

namespace App\Models;

use App\Models\Location;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

   

    public function startLocation()
    {
        return $this->belongsTo(Location::class, 'start_location_id')->select('id', 'name');
    }

    public function endLocation()
    {
        return $this->belongsTo(Location::class, 'end_location_id')->select('id', 'name');
    }
}
