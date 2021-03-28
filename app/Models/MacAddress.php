<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MacAddress extends Model
{
    use HasFactory;

    protected $table = 'mac_address';
    protected $guarded = [];

    public function contract()
    {
        return $this->belongsTo(Contract::class);
    }

    public function bitrate()
    {
        return $this->hasMany(Bitrate::class, 'mac_address_id', 'id');
    }

    public function interference()
    {
        return $this->hasMany(Interference::class, 'mac_address_id', 'id');
    }

    public function rss()
    {
        return $this->hasMany(Rss::class, 'mac_address_id', 'id');
    }
}
