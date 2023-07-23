<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TarjetaController extends Controller
{
    public function index()
    {
        return view('tarjetas.index');
    }
}
