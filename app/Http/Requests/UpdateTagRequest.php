<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class UpdateTagRequest extends FormRequest
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
            'name' => ['required', Rule::unique('tags')->ignore($this->tag)]
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Il tag deve avere un nome!',
            'name.unique:projects' => 'Il Tag esiste già.',
            'name.min' => 'Il Tag deve essere lungo almeno 3 caratteri.',
            'name.max' => 'Il Tag non può essere più lungo di 20 caratteri.'
        ];
    }
}
