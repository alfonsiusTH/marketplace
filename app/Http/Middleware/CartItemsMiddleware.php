<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Cart;
use App\Models\CartItems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CartItemsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $currentUser = Auth::id();

        $cart = Cart::where('user_id', $currentUser)->first();

        $cartItems = CartItems::where('cart_id', $cart->id)->get();

        if ($cartItems->isEmpty()) {
            return response()->json(['message' => 'Items not found in cart'], 404);
        }

        return $next($request);
    }
}
