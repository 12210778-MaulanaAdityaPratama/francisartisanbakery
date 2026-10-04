<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hamper extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
        'image',
        'images',
        'contents',
        'specifications',
        'badge_label',
        'is_available',
        'is_active',
        'whatsapp_number',
        'sort_order',
        'keywords',
    ];

    protected function casts(): array
    {
        return [
            'price' => 'integer',
            'images' => 'array',
            'contents' => 'array',
            'specifications' => 'array',
            'is_available' => 'boolean',
            'is_active' => 'boolean',
        ];
    }
}