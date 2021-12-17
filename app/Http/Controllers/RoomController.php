<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoomRequest;
use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use App\Models\Room;
use App\Services\PlayerService;
use App\Services\RoomService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoomController extends Controller
{
    private $roomService;

    public function __construct(RoomService $roomService)
    {
        $this->roomService = $roomService;
    }

    public function index()
    {
        return response()->view('rooms',['rooms' => $this->roomService->allRooms()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('roomCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreRoomRequest $request, PlayerService $playerService)
    {
        $room = $this->roomService->create($request->name,Auth::id());
        $playerService->createMaster($room->slug);
        return redirect()->route('rooms.show',['room'=>$room->slug]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(RoomRequest $request)
    {
        $valideted = $request->validated();
        $room = $this->roomService->getRoom($valideted['room']);
        $player = $this->roomService->getPlayer($request->room,Auth::id());
        if ($player==null)
        {
            return response()->view('pleaseInvite',['room'=>$room, 'user'=>$room->user]);
        }
        return response()->view('room', ['room'=>$room, 'player'=>$player]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(RoomRequest $request)
    {
        $room = $this->roomService->getRoom($request->room);
        return response()->view('roomEdit', $room);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateRoomRequest $request)
    {
        $data = [
            'name' =>$request->name,
            'next_game' => $request->next_game,
            'slug' => $request->slug
        ];
        $status = $this->roomService->update($data);

        if ($status !== null) {
            return redirect()->route('rooms.show', ['room' => $status]);
        }
        return redirect()->back()->withErrors(['message' => "Can't update room"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        return $this->roomService->delete($request->slug)
            ?redirect()->route('rooms.index')
            :redirect()->back()->withErrors(['message' => "Can't delete room"]);
    }
}
