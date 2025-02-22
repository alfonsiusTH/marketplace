<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CartItems extends Model
{
    protected $table = 'cart_items';

    protected $fillable = [
        'quantity'
    ];
}
