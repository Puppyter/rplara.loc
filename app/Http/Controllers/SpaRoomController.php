<?php

namespace App\Http\Controllers;

use App\Services\RoomService;
use App\Services\SpaRoomService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SpaRoomController extends Controller
{
    public function show(Request $request, SpaRoomService $roomService)
    {
        $data = $roomService->getData($request->room, Auth::id());

        return response()->view('room', ['room'=>$data['room'], 'player'=>$data['player'], 'character'=>$data['character'], 'metiers'=>$data['metiers']]);
    }
}
