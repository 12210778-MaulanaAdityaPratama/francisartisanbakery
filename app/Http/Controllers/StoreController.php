<?php

namespace App\Http\Controllers;

use App\Models\StoreLocation;

class StoreController extends Controller
{
    public function index()
    {
        $stores = StoreLocation::query()
            ->where('is_active', true)
            ->orderByDesc('is_flagship')
            ->orderBy('sort_order')
            ->get();

        $areas = $stores->countBy('area')->sortKeys();
        $storesData = $stores->mapWithKeys(fn (StoreLocation $store): array => [
            $store->slug => [
                'id' => $store->slug,
                'name' => $store->name,
                'type' => $store->type_label,
                'area' => $store->area,
                'address' => $store->address,
                'coords' => [$store->latitude, $store->longitude],
                'hours' => $store->operating_hours,
                'wa' => $store->phone,
                'mapsUrl' => $store->maps_url,
                'isFlagship' => $store->is_flagship,
            ],
        ])->all();

        return view('store', compact('stores', 'areas', 'storesData'));
    }
}
