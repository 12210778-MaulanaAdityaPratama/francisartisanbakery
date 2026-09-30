<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CareController extends Controller
{
    public function index()
    {
        return view('care');
    }
}
