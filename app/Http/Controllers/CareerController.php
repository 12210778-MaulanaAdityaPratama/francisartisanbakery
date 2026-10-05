<?php

namespace App\Http\Controllers;

use App\Models\Career;
use Illuminate\Contracts\View\View;

class CareerController extends Controller
{
    public function index(): View
    {
        $careers = Career::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('title')
            ->get();

        return view('career', compact('careers'));
    }
}
