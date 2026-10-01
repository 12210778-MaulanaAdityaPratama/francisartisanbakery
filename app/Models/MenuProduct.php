<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuProduct extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'category',
        'category_label',
        'description',
        'price',
        'badge_label',
        'is_available',
        'image',
        'specifications',
        'details',
        'keywords',
        'whatsapp_number',
        'is_active',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'price' => 'integer',
            'is_available' => 'boolean',
            'is_active' => 'boolean',
            'specifications' => 'array',
            'details' => 'array',
        ];
    }
}
