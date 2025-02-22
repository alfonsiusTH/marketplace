<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    protected $table = 'product';

    protected $fillable = [
        'product_name',
        'product_price',
        'product_description',
        'product_image',
    ];

    public function seller(): BelongsTo {
        return $this->belongsTo(Seller::class, 'seller_id', 'id');
    }

    public function cartItems(): HasMany {
        return $this->hasMany(CartItems::class, 'product_id', 'id');
    }
}
