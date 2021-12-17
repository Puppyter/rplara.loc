<?php

namespace App\Http\Controllers;

use App\Services\RoomService;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(RoomService $roomService, Request $request)
    {
        $room = $roomService->getRoom($request->get('slug') ?? 'admin');
        return response()->view('welcome',['room'=>$room]);
    }
}
