<?php

namespace App\Http\Requests\MultipleChoice;

use Illuminate\Foundation\Http\FormRequest;

class StoreMultipleChoice extends FormRequest
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
            'question' => 'required',
            'choice' => 'required',
            'choice.*' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'choice.*.required' => 'A choice could not be empty!',
        ];
    }
}
