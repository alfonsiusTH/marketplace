<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Sanctum\HasApiTokens;

class CartItems extends Model
{
    use HasFactory, HasApiTokens;
    protected $table = 'cart_items';

    protected $fillable = [
        'cart_id',
        'product_id',
        'quantity'
    ];

    public function cart(): BelongsTo {
        return $this->belongsTo(Cart::class, 'cart_id', 'id');
    }

    public function product(): BelongsTo {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
