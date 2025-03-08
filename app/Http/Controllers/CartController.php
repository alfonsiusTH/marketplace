<?php

namespace App\Http\Controllers;

use App\Http\Resources\CartResource;
use App\Models\Cart;
use App\Models\CartItems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cart = Cart::query()->where('user_id', Auth::id())->first();

        if ($cart) {
            return new CartResource($cart->loadMissing('user:id,name,email', 'cartItems:id,cart_id,product_id,quantity'));
        } else {
            return response()->json(['message' => 'Cart not found'], 404);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function addToCart(Request $request)
    {

        $cart = Cart::where('user_id', Auth::id())->first();
        
        if(!$cart) {
            $cart = Cart::create([
                'user_id' => Auth::id(),
            ]);
        }

        $cartItems = CartItems::where('cart_id', $cart->id)
        ->where('product_id', $request->product_id)
        ->first();

        if ($cartItems) {
            $cartItems->quantity += $request->quantity;
            $cartItems->save();
        } else {
            CartItems::create([
                'cart_id' => $cart->id,
                'product_id' => $request->product_id,
                'quantity' => $request->quantity
            ]);
        }

        return new CartResource($cart->loadMissing('user:id,name,email', 'cartItems:id,cart_id,product_id,quantity'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
