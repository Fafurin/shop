<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tag\StoreRequest;
use App\Models\Tag;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $title = $data['title'];
        Tag::firstOrCreate([
            'title' => ucfirst($title)
        ]);

        return redirect()->route('tag.index');
    }
}
