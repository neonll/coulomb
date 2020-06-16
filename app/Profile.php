<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];

    protected $casts = [
        'data' => 'json'
    ];

    public function scopeCharge($query)
    {
        return $query->where('type', 'charge');
    }
}
