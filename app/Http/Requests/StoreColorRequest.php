<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class StoreColorRequest extends FormRequest
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
            'name' => 'required|mix:2|max:50|unique:colors',
            'hex_value' => 'required|min:7|max:10'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Il nome è obbligatorio.',
            'name.min' => 'Il nome deve essere lungo almeno :min caratteri.',
            'name.max' => 'Il nome non può superare i :max caratteri.',
            'name.unique:categories' => 'Il nome esiste già',
            'hex_value.required' => 'Il nome è obbligatorio.',
            'hex_value.min' => 'Il nome deve essere lungo almeno :min caratteri.',
            'hex_value.max' => 'Il nome non può superare i :max caratteri.',
        ];
    }
}
