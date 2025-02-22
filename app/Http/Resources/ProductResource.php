<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'seller_data' => $this->whenLoaded('seller'),
            'product_name' => $this->product_name,
            'product_price' => $this->product_price,
            'product_description' => $this->product_description,
            'product_image' => $this->product_image
        ];
    }
}
