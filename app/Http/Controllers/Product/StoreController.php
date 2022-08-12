<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreRequest;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        try {
            Db::beginTransaction();
            if (isset($data['tags'])) {
                $tags = $data['tags'];
                unset($data['tags']);
            }

            if (isset($data['colors'])) {
                $colors = $data['colors'];
                unset($data['colors']);
            }

            $product_images = $data['product_images'];
            unset($data['product_images']);

            $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);

            $product = Product::firstOrCreate([
                'number' => $data['number']
            ], $data);

            if (isset($tags)) {
                $product->tags()->attach($tags);
            }
            if (isset($colors)) {
                $product->colors()->attach($colors);
            }

            if (isset($product_images)) {
                foreach ($product_images as $image) {
                    $currentImages = ProductImage::where('product_id', $product->id)->get();

                    if (count($currentImages) > 3) continue;
                    $file_path = Storage::disk('public')->put('/images', $image);
                    ProductImage::create([
                        'file_path' => $file_path,
                        'product_id' => $product->id
                    ]);
                }
            }

            Db::commit();
        } catch (\Exception $e) {
            Db::rollBack();
            abort(500);
        }

        return redirect()->route('product.index');
    }
}
