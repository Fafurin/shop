<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreRequest;
use App\Models\Product;
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

            Db::commit();
        } catch (\Exception $e) {
            Db::rollBack();
            abort(500);
        }

        return redirect()->route('product.index');
    }
}
