<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SellerResource extends JsonResource
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
            'user_data' => $this->whenLoaded('user'),
            'shop_name' => $this->shop_name,
            'description' => $this->description,
            'telephone' => $this->telephone
        ];
    }
}
