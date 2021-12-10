<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCharacterRequest extends FormRequest
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
            'name' => 'string',
            'race' => 'string',
            'metier_name' => ['string','exists:metiers,name'],
            'strength' => 'integer',
            'dexterity' => 'integer',
            'constitution' => 'integer',
            'intellect' => 'integer',
            'wisdom' => 'integer',
            'charisma' => 'integer',
            'player_id' => ['string','exists:players,id'],
            'health' => 'integer',
        ];
    }
}
