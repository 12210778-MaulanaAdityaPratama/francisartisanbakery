<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StoreLocation extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'area',
        'type_label',
        'address',
        'operating_hours',
        'phone',
        'whatsapp_number',
        'maps_url',
        'latitude',
        'longitude',
        'facilities',
        'keywords',
        'image',
        'is_flagship',
        'is_active',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'latitude' => 'float',
            'longitude' => 'float',
            'facilities' => 'array',
            'is_flagship' => 'boolean',
            'is_active' => 'boolean',
        ];
    }
}
