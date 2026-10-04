<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    protected $table = 'about_us';

    protected $fillable = [
        'title',
        'subtitle',
        'content',
        'image',
        'values',
        'team_members',
        'milestones',
        'contact_email',
        'contact_phone',
        'address',
        'is_active',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'values' => 'array',
            'team_members' => 'array',
            'milestones' => 'array',
            'is_active' => 'boolean',
        ];
    }
}