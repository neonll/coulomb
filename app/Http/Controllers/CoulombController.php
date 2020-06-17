<?php

namespace App\Http\Controllers;

use App\Coulomb;
use Illuminate\Http\Request;

class CoulombController extends Controller
{
    public function getData()
    {
        return Coulomb::getData();
    }
}
