<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BreadCare extends Model
{
    protected $fillable = [
        'title',
        'category',
        'icon',
        'description',
        'content',
        'tips',
        'image',
        'is_active',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'tips' => 'array',
            'is_active' => 'boolean',
        ];
    }
}