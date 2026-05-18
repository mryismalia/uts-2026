<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $table = 'profiles';

    protected $fillable = [
        'full_name',
        'title',
        'bio',
        'short_bio',
        'email',
        'phone',
        'address',
        'profile_image',
        'github_url',
        'linkedin_url',
        'twitter_url',
        'experience',
        'education',
        'social_links',
        'is_active'
    ];

    protected $casts = [
        'social_links' => 'array',
        'is_active' => 'boolean'
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
