<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Models\Seller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    private function validatedProduct(Request $request)
    {
        $validated = $request->validate([
            'product_name' => 'required|string|max:20',
            'product_price' => 'required|integer',
            'product_description' => 'required|string',
            'product_image' => 'image|nullable',
            'stock' => 'required|boolean'
        ]);

        return $validated;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::all();
        return ProductResource::collection($product->loadMissing('seller:id,shop_name,telephone'));

        // return view('product', $product);
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
        $validated = $this->validatedProduct($request);

        if (isset($validated['product_image'])) {
            $imageName = $this->generateRandomString();
            $extension = $validated['product_image']->extension();
            $image = $imageName . '.' . $extension;

            $validated['product_image']->storeAs('/images', $image, 'public');
            $validated['product_image'] = $image;
        }

        $sellers = Seller::where('id', Auth::user()->id)->first();
        // dd($sellers);
        $validated['seller_id'] = $sellers->id;
        // dd($validated);
        $product = Product::create($validated);

        return new ProductResource($product->loadMissing('seller:id,shop_name,telephone'));
    }

    /**
     * Display the specified resource.
     */
    public function showDetail($id)
    {
        $product = Product::findOrFail($id);
        return new ProductResource($product->loadMissing('seller:id,shop_name,telephone'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $this->validatedProduct($request);

        $sellers = Seller::where('id', Auth::user()->id)->first();

        $validated['seller_id'] = $sellers->id;

        $product = Product::findOrFail($id);

        if ($request->hasFile('product_image')) {
            Storage::disk('public')->delete("images/" . $product->product_image);

            $imageName = $this->generateRandomString();
            $extension = $validated['product_image']->extension();
            $image = $imageName . '.' . $extension;

            $validated['product_image']->storeAs('/images', $image, 'public');
            $validated['product_image'] = $image;   
        }

        $product->update($validated);

        return new ProductResource($product->loadMissing('seller:id,shop_name,telephone'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if (isset($product->product_image)) {
            Storage::disk('public')->delete("images/" . $product->product_image);
            $deletedImage = ['product_image ' => null];
            $product->update($deletedImage);
        }
        $product->delete();

        return new ProductResource($product->loadMissing('seller:id,shop_name,telephone'));
    }

    private function generateRandomString($length = 30)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomString;
    }
}
