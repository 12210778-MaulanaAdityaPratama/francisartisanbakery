<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($slug)
    {
        // Following SRP, data retrieval should ideally be in a service/repository.
        // For frontend UI demonstration, we'll pass the slug to the view.
        return view('product.show', compact('slug'));
    }
}
