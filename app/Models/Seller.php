<?php

namespace App\Models;

use App\Models\User;
use App\Models\Product;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Seller extends Model
{
    use HasFactory, HasApiTokens;
    
    protected $table = 'seller';

    protected $fillable = [
        'user_id',
        'description',
        'shop_name',
        'telephone',
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function products(): HasMany {
        return $this->hasMany(Product::class, 'seller_id', 'id');
    }
}
