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

    // Accessor untuk experience - ubah JSON ke array
    public function getExperienceArrayAttribute()
    {
        if (empty($this->experience)) {
            return [];
        }

        $data = json_decode($this->experience, true);
        return is_array($data) ? $data : [];
    }

    // Accessor untuk education - ubah JSON ke array
    public function getEducationArrayAttribute()
    {
        if (empty($this->education)) {
            return [];
        }

        $data = json_decode($this->education, true);
        return is_array($data) ? $data : [];
    }
}
