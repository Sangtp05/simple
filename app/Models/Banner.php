<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = [
        'image',
        'url',
        'order'
    ];

    public static function getAllBanners()
    {
        return Banner::all();
    }
}
