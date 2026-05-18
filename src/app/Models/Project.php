<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'image_url',
        'tech_stack',
        'project_url',
        'github_url',
        'status',
        'progress',
        'start_date',
        'end_date',
        'is_featured'
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'is_featured' => 'boolean',
        'progress' => 'integer'
    ];

    public function getStatusBadgeAttribute()
    {
        return match($this->status) {
            'planning' => 'warning',
            'development' => 'info',
            'completed' => 'success',
            'on_hold' => 'danger',
            default => 'secondary'
        };
    }

    public function getStatusTextAttribute()
    {
        return match($this->status) {
            'planning' => 'Perencanaan',
            'development' => 'Pengembangan',
            'completed' => 'Selesai',
            'on_hold' => 'Ditunda',
            default => $this->status
        };
    }

    public function getTechStackArrayAttribute()
    {
        return array_map('trim', explode(',', $this->tech_stack));
    }
}
