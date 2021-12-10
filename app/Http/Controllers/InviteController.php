<?php

namespace App\Http\Controllers;

use App\Http\Requests\InviteRequest;
use App\Http\Requests\PlayerstoreRequest;
use App\Http\Requests\PleaseInviteRequest;
use App\Services\InviteService;
use App\Services\PlayerService;
use App\Services\RoomService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InviteController extends Controller
{
    public function invite(InviteRequest $request, InviteService $inviteService, RoomService $roomService): \Illuminate\Http\RedirectResponse
    {
        $inviteService->sendInvite($request->room, $request->email);
        return redirect()->back()->with(['message'=>'Mail send']);
    }

    public function pleaseInvite(PleaseInviteRequest $request, InviteService $inviteService)
    {
        $status = $inviteService->sendPleaseInvite($request->room,Auth::id());
        return $status
            ? redirect()->route('rooms.index')->with(['message' => "Request send"])
            : redirect()->back()->withErrors(['message'=>"Can't send request"]);
    }

    public function accept(PlayerstoreRequest $request, PlayerService $playerService, InviteService $inviteService)
    {
        $player = $playerService->create($request->invite);
        $inviteService->destroy($request->invite);
        return $request->roomCreator
            ? redirect()->route('rooms.index')->with(['message' =>'You add player'])
            : redirect()->route('createCharacter.stepOne', ['room' => $player->room_slug, 'user' => $player->user_id, 'player' => $player->id]);

    }

    public function decline(Request $request, InviteService $inviteService)
    {
        $inviteService->destroy($request->invite);
        return redirect()->route('rooms.index')->withErrors(['message'=>'You decline invite']);
    }


}
