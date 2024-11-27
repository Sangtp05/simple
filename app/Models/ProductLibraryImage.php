<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductLibraryImage extends Model
{
    protected $fillable = [
        'product_id',
        'image',
        'content',
        'is_active',
        'order'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public static function getAllProductLibraryImages()
    {
        return ProductLibraryImage::all();
    }
} 