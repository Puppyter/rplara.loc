<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PleaseInviteRequest extends FormRequest
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
            'room' => ['string', 'exists:rooms,slug'],
        ];
    }

    public function all($keys = null)
    {
        $data = parent::all($keys);
        $data['room'] = $this->route('room');
        return $data;
    }
}
