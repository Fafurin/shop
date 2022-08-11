<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|string',
            'number' => 'required|string',
            'description' => 'nullable',
            'content' => 'nullable',
            'preview_image' => 'nullable',
            'old_price' => 'required|numeric',
            'price' => 'required|numeric',
            'discount' => 'required|numeric',
            'count' => 'required|integer',
            'is_published' => 'nullable',
            'category_id' => 'required|integer|exists:categories,id',
            'group_id' => 'required|integer|exists:groups,id',
            'tags' => 'nullable|array',
            'colors' => 'nullable|array',
        ];
    }
}
