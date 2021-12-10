<?php

namespace App\Http\Controllers;

use App\Services\RoomService;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(RoomService $roomService)
    {
        $room = $roomService->getRoom('admin');
        return response()->view('welcome',['room'=>$room]);
    }
}
