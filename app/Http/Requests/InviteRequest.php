<?php

namespace App\Http\Requests;

use App\Models\Room;
use App\Services\RoomService;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class InviteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        /** @var RoomService $roomService */
        $roomService = app(RoomService::class);
        $roomModel = $roomService->getRoom($this->route('room'));
        return Gate::allows('createInvite', $roomModel);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['string','required'],
            'room' => ['string', 'exists:rooms,slug']
        ];
    }

    public function all($keys = null)
    {
        $data = parent::all($keys);
        $data['room'] = $this->route('room');
        return $data;
    }
}
