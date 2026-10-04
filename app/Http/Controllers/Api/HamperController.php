<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Hamper;
use Illuminate\Http\Request;

class HamperController extends Controller
{
    /**
     * Display a listing of active hampers.
     */
    public function index()
    {
        $hampers = Hamper::where('is_active', true)
            ->orderBy('sort_order', 'asc')
            ->get([
                'id',
                'name',
                'slug',
                'description',
                'price',
                'image',
                'badge_label',
                'is_available',
                'specifications',
            ]);

        return response()->json([
            'success' => true,
            'data' => $hampers,
        ]);
    }

    /**
     * Display the specified hamper by slug.
     */
    public function show($slug)
    {
        $hamper = Hamper::where('slug', $slug)
            ->where('is_active', true)
            ->first();

        if (!$hamper) {
            return response()->json([
                'success' => false,
                'message' => 'Hamper tidak ditemukan',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $hamper,
        ]);
    }
}