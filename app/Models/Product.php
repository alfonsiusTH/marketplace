<?php

namespace App\Models;

use App\Models\Seller;
use App\Models\CartItems;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, HasApiTokens;
    protected $table = 'product';

    protected $fillable = [
        'seller_id',
        'product_name',
        'product_price',
        'product_description',
        'product_image',
        'stock'
    ];

    public function seller(): BelongsTo {
        return $this->belongsTo(Seller::class, 'seller_id', 'id');
    }

    public function cartItems(): HasMany {
        return $this->hasMany(CartItems::class, 'product_id', 'id');
    }
}
