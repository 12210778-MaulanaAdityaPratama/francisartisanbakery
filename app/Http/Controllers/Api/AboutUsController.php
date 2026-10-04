<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    /**
     * Display active about us content.
     */
    public function index()
    {
        $aboutUs = AboutUs::where('is_active', true)
            ->orderBy('sort_order', 'asc')
            ->first();

        if (!$aboutUs) {
            return response()->json([
                'success' => false,
                'message' => 'Konten tentang kami tidak ditemukan',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $aboutUs,
        ]);
    }
}