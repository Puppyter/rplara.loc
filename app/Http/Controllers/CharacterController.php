<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCharacterRequest;
use App\Http\Requests\UpdateCharacterRequest;
use App\Models\Character;
use App\Services\CharacterService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use function GuzzleHttp\Promise\all;

class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreCharacterRequest $request, CharacterService $characterService)
    {
        $data = $request->all();
        $data['player_id'] = Auth::id();
        $data["race"] = 'cho-to';
        $data['avatar'] = $request->avatar->store('public');
        $character = $characterService->create($data);
        return redirect()->route('characters.show',['character'=>$character->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Character  $character
     * @return \Illuminate\Http\RedirectResponse
     */
    public function show(Request $request, CharacterService $characterService)
    {
        $character = $characterService->get($request->character);
        $character->avatar = Storage::url($character->avatar);
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Character  $character
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, CharacterService $characterService)
    {
        $character = $characterService->get($request->character);
        return response()->view('characterEdit', ['character'=>$character]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Character  $characterService
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateCharacterRequest $request, CharacterService $characterService)
    {
        $character = $characterService->get($request->character);
        if ($request->avatar != null) {
            $request->avatar = $request->avatar->store('public');
            Storage::delete($character->avatar);
        }
        $characterService->update($request->all());
        return redirect()->route('rooms.show',['room'=>$character->player->room->slug]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Character  $character
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request,CharacterService $characterService)
    {
        $character = $characterService->get($request->character);
        $room = $character->player->room->slug;
        Storage::delete($character->avatar);
        $characterService->delete($character->id);
        return redirect()->route('rooms.show',['room'=>$room]);
    }
}
