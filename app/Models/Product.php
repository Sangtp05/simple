<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Product extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'category_id',
        'description',
        'content',
        'price',
        'sale_price',
        'sku',
        'is_active',
        'is_featured'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function attributes(): HasMany
    {
        return $this->hasMany(ProductAttribute::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class);
    }

    public function primaryImage()
    {
        return $this->hasOne(ProductImage::class)->where('is_primary', true);
    }

    public static function getFeaturedProducts()
    {
        return Product::where('is_featured', true)
            ->with(['images' => function($query) {
                $query->where('is_primary', true);
            }])
            ->get();
    }

    protected function categoryChildName(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->category->name,
        );
    }

    protected function categoryChildSlug(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->category->slug,
        );
    }

    protected function categoryParentName(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->category->parent->name ?? null,
        );
    }

    protected function categoryParentSlug(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->category->parent->slug ?? null,
        );
    }
}
