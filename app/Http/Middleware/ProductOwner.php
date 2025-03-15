<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Seller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ProductOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!Auth::check()) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $currentUser = Auth::id();

        $sellers = Seller::where('user_id', $currentUser)->first();

        $product = Product::where('seller_id', $sellers->id)->first();

        if($request->product_id != $product->id) {
            return response()->json(['message' => 'You are not the owner of this product'], 401);
        }

        return $next($request);
    }
}
