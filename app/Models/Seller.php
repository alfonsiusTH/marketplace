<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Seller extends Model
{
    protected $table = 'seller';

    protected $fillable = [
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
