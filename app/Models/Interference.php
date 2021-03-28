<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interference extends Model
{
    use HasFactory;

    public function macAddress()
    {
        return $this->belongsTo(MacAddress::class, 'mac_address_id', 'id');
    }
}
