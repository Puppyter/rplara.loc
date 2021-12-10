<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StepThreeStoreRequest extends FormRequest
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
            'strength' => ['integer', 'max:15', 'min:8'],
            'dexterity' => ['integer', 'max:15', 'min:8'],
            'constitution' => ['integer', 'max:15', 'min:8'],
            'intellect' => ['integer', 'max:15', 'min:8'],
            'wisdom' => ['integer', 'max:15', 'min:8'],
            'charisma' => ['integer', 'max:15', 'min:8'],
        ];
    }
}
