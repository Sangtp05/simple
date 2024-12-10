<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'content',
        'image',
        'type'
    ];

    protected $casts = [
        'image' => 'string',
    ];

    // Thêm vào class Post
    public function getTypeColorAttribute()
    {
        return match ($this->type) {
            'post' => 'primary',
            'fashion' => 'success',
            'simple' => 'warning',
            default => 'secondary',
        };
    }
}
