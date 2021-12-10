<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use function Symfony\Component\Translation\t;

class MetierStoreRequest extends FormRequest
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
            "strength" => ['string', 'required'],
            "dexterity" => ['string', 'required'],
            "constitution" => ['string', 'required'],
            "intellect" => ['string', 'required'],
            "wisdom" => ['string', 'required'],
            "charisma" => ['string', 'required'],
            'name' => ['string', 'required'],
        ];
    }
}
