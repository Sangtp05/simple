<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    const TYPE_SIZE = 'Size';
    const TYPE_COLOR = 'Color';

    protected $fillable = ['name', 'value', 'product_id'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function scopeOfType($query, $type)
    {
        return $query->where('name', $type);
    }

    public function scopeForProducts($query, $productIds)
    {
        return $query->whereIn('product_id', $productIds);
    }

    public static function getUniqueValues($type, $productIds)
    {
        return static::ofType($type)
            ->forProducts($productIds)
            ->pluck('value')
            ->unique();
    }
}
