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
            'name' => 'required|unique:colors',
            'hex_value' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Il nome è obbligatorio.',
            'name.unique:categories' => 'Il nome esiste già',
            'hex_value.required' => 'Il nome è obbligatorio.',
        ];
    }
}
