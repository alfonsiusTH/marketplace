<?php

namespace App\Http\Controllers;

use App\Http\Resources\SellerResource;
use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SellerController extends Controller
{
    private function validateSeller(Request $request)
    {
        $validated = $request->validate([
            'shop_name' => 'required|string|max:20',
            'description' => 'required|string',
            'telephone' => 'required|string|max:15'
        ]);

        return $validated;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $currentUser = Auth::user();
        $sellers = Seller::query()->where('user_id', $currentUser->id)->get();
        return SellerResource::collection($sellers->loadMissing(['user:id,name,email,telephone']));
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
        $validated = $this->validateSeller($request);

        $sellers = Auth::user()->seller()->create($validated);

        return new SellerResource($sellers->loadMissing(['user:id,name,email,telephone']));
    }

    /**
     * Display the specified resource.
     */
    public function show(Seller $seller)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Seller $seller)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Seller $seller)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Seller $seller)
    {
        //
    }
}
