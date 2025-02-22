<?php

namespace App\Models;

use App\Models\User;
use App\Models\CartItems;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory, HasApiTokens;
    protected $table = 'cart';

    protected $fillable = [
        
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function cartItems(): HasMany {
        return $this->hasMany(CartItems::class, 'cart_id', 'id');
    }
}
