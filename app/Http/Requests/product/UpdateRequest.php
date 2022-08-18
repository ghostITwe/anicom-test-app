<?php

namespace App\Http\Requests\product;

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
            'title' => 'sometimes',
            'description' => 'sometimes',
            'price' => 'sometimes|integer',
            'image' => 'sometimes|image|max:2048',
            'category_id' => 'sometimes|integer'
        ];
    }
}
