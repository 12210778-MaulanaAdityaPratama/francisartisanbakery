<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BreadCare;
use Illuminate\Http\Request;

class BreadCareController extends Controller
{
    /**
     * Display a listing of active bread care tips.
     */
    public function index(Request $request)
    {
        $query = BreadCare::where('is_active', true);

        // Filter by category if provided
        if ($request->has('category')) {
            $query->where('category', $request->category);
        }

        $breadCares = $query->orderBy('sort_order', 'asc')
            ->get([
                'id',
                'title',
                'category',
                'icon',
                'description',
                'image',
            ]);

        // Group by category
        $grouped = $breadCares->groupBy('category');

        return response()->json([
            'success' => true,
            'data' => $breadCares,
            'grouped' => $grouped,
            'categories' => [
                'Storage' => 'Penyimpanan',
                'Reheating' => 'Memanaskan Kembali',
                'Freezing' => 'Pembekuan',
                'Serving' => 'Penyajian',
                'Freshness' => 'Menjaga Kesegaran',
                'General' => 'Umum',
            ],
        ]);
    }

    /**
     * Display the specified bread care tip.
     */
    public function show($id)
    {
        $breadCare = BreadCare::where('id', $id)
            ->where('is_active', true)
            ->first();

        if (!$breadCare) {
            return response()->json([
                'success' => false,
                'message' => 'Tips tidak ditemukan',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $breadCare,
        ]);
    }
}