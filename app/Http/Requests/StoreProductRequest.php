<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name' => 'required|min:5|max:100',
            'image' => 'nullable',
            'description' => 'nullable',
            'n_product' => 'nullable',
            'prezzo' => 'required',
            'category_id' => 'nullable|exists:categories,id',
            'brand_id' => 'nullable|exists:brands,id',
            'texture_id' => 'nullable|exists:textures,id',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Il titolo è obbligatorio.',
            'name.min' => 'Il titolo deve essere lungo almeno :min caratteri.',
            'name.max' => 'Il titolo non può superare i :max caratteri.',
            'prezzo.required' => 'Il prezzo è obbligatorio',
        ];
    }
}
