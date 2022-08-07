<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Product $product)
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

            if (isset($data['preview_image'])) {
                $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            }

            $product->update($data);

            if (isset($tags)) {
                $product->tags()->sync($tags);
            }

            if (isset($colors)) {
                $product->colors()->sync($colors);
            }

            Db::commit();
        } catch (\Exception $e) {
            Db::rollBack();
            abort(500);
        }
        return view('product.show', compact('product'));
    }

}
