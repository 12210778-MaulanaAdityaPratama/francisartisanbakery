<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HampersController extends Controller
{
    public function index()
    {
        return view('hampers');
    }
}
