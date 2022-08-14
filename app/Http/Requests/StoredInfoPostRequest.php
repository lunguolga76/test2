<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class StoredInfoPostRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'hobbies' => 'string|min:3',
            'pets' => 'integer|min:0',
            'milk' => 'required|boolean',
            'wishes' => 'required|array',
            'email' => 'required|email'
        ];
    }
}
