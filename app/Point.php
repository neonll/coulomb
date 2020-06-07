<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    protected $guarded = [];

    protected $dates = ['datetime'];

    public function session()
    {
        return $this->belongsTo('App\Session');
    }
}
