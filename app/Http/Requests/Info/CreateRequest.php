<?php

namespace App\Http\Requests\Info;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'author' => ['required', 'string'],
            'tel' => ['required', 'string', 'min:6', 'max:20'],
            'email' => ['required', 'email:rfc,dns', 'min:5', 'max:30'],    
            'url' => ['required', 'url', 'min:5'],
            'description' => ['nullable', 'string']
        ];
    }
}
