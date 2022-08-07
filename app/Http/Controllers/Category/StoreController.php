<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreRequest;
use App\Models\Category;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $title = $data['title'];
        Category::firstOrCreate([
            'title' => ucfirst($title)
        ]);

        return redirect()->route('category.index');
    }
}
