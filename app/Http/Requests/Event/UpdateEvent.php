<?php

namespace App\Http\Requests\Event;

use Illuminate\Validation\Rule;

class UpdateEvent extends StoreEvent
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
        return array_merge(parent::rules(), [
            'code' => 'required|unique:events,code,'.$this->route('event')
        ]);
    }
}
