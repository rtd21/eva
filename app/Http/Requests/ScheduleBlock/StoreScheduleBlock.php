<?php

namespace App\Http\Requests\ScheduleBlock;

use Illuminate\Foundation\Http\FormRequest;

class StoreScheduleBlock extends FormRequest
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
            'name' => 'required',
            'time' => 'required',
            'day' => 'required',
            'speaker_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'speaker_id.required' => 'Choose speaker!'
        ];
    }
}
