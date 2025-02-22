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
        'quantity'
    ];
}
