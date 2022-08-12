<?php

namespace App\Http\Resources\Product;

use App\Http\Resources\Category\CategoryResource;
use App\Models\Product;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $products = Product::where('group_id', $this->group_id)->get();

        return [
            'id' => $this->id,
            'title' => $this->title,
            'number' => $this->number,
            'description' => $this->description,
            'content' => $this->content,
            'image_url' => $this->imageUrl,
            'old_price' => $this->old_price,
            'price' => $this->price,
            'discount' => $this->discount,
            'count' => $this->count,
            'is_published' => $this->is_published,
            'category' => new CategoryResource($this->category),
            'product_images' => ProductImageResource::collection($this->productImages),
            'group_products' => ProductMinResource::collection($products)
        ];
    }
}
