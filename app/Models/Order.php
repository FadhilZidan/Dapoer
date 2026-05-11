<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'reference', 'full_name', 'street_address', 'city',
        'postal_code', 'payment_method', 'subtotal', 'tax', 'shipping', 'total', 'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function getFormattedTotalAttribute(): string
    {
        return 'Rp ' . number_format($this->total, 0, ',', '.');
    }

    public static function generateReference(): string
    {
        return 'DN-' . strtoupper(substr(md5(uniqid()), 0, 8));
    }
}
