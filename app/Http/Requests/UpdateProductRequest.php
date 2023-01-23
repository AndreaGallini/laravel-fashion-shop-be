<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required','unique:products','min:5','max:100'],
            'image' => ['nullable'],
            'description'=>['nullable'],
            'n_product' => ['nullable'],
            'prezzo' => ['required']
        ];
    }
    public function messages(){
        return [
            'name.required' => 'Il titolo è obbligatorio.',
            'name.min' => 'Il titolo deve essere lungo almeno :min caratteri.',
            'name.max' => 'Il titolo non può superare i :max caratteri.',
            'name.unique:products' => 'Il titolo esiste già',
            'prezzo.required' => 'Il prezzo è obbligatorio',
        ];
    }
}
