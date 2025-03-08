<?php

namespace App\Http\Controllers;

use App\Models\CartItems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CartItems $cartItems)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CartItems $cartItems)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CartItems $cartItems)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cartItems = CartItems::find($id);

        if ($cartItems->cart->user_id !== Auth::id()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $cartItems->delete();

        return response()->json(['message' => 'Cart item deleted successfully'], 200);
    }

    public function increaseQuantity($id) {
        $cartItems = CartItems::findOrFail($id);

        if ($cartItems->cart->user_id !== Auth::id()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $cartItems->quantity +=1;
        $cartItems->save();

        return response()->json(['message' => 'Quantity increased successfully',  'quantity' => $cartItems->quantity ?? 0], 200);
    }

    public function decreaseQuantity($id) {
        $cartItems = CartItems::findOrFail($id);

        if ($cartItems->cart->user_id !== Auth::id()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        if ($cartItems->quantity > 1) {
            $cartItems->quantity -= 1;
            $cartItems->save();
            return response()->json(['message' => 'Quantity decreased', 'quantity' => $cartItems->quantity]);
        } else {
            $cartItems->delete();
            return response()->json(['message' => 'Item removed from cart']);
        }
    }
}
