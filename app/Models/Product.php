<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug', 'subtitle', 'description', 'heritage_narrative',
        'price', 'original_price', 'category_id', 'region', 'heat_level',
        'cook_time', 'key_ingredients', 'image', 'is_featured', 'is_active',
    ];

    protected $casts = [
        'key_ingredients' => 'array',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function getFormattedPriceAttribute(): string
    {
        return 'Rp ' . number_format($this->price, 0, ',', '.');
    }

    public function getFormattedOriginalPriceAttribute(): ?string
    {
        if (!$this->original_price) return null;
        return 'Rp ' . number_format($this->original_price, 0, ',', '.');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
