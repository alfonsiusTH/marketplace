<?php

namespace App\Http\Middleware;

use App\Models\Cart;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CartMiddleware
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
        
        // Cari cart berdasarkan user_id
        $cart = Cart::where('user_id', $currentUser)->first();
    
        if (!$cart) {
            return response()->json(['message' => 'Cart not found'], 404);
        }
    
        return $next($request);
    }
}
