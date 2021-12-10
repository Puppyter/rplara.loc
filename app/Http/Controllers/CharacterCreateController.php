<?php

namespace App\Http\Controllers;

use App\Http\Requests\StepThreeStoreRequest;
use App\Models\Character;
use App\Services\CharacterService;
use App\Services\MetierService;
use Illuminate\Http\Request;

class CharacterCreateController extends Controller
{
    public function stepOne(Request $request,CharacterService $characterService,MetierService $metierService)
    {
        $characterService->checkCharacterInPlayer($request->player);
        $metiers = $metierService->getAllNames();
        return response()->view('characterCreateStepOne',['player'=>$request->player, 'metiers' => $metiers]);
    }

    public function stepTwo(Request $request, CharacterService $characterService)
    {
        session()->put($request->all());
        return response()->view('characterCreateStepTwo', ['player'=>$request->player]);
    }

    public function stepThree(StepThreeStoreRequest $request, CharacterService $characterService)
    {
        $level = $characterService->getRoomStartLevel($request->player);
        $characterService->checkAttributes($request->validated());
        $hp = $characterService->generateHP($request->constitution, $level);
        return response()->view('characterCreateStepThree', ['player'=>$request->player,'metier'=>session('metier'), 'name' => session('name'), 'hp' => $hp, 'attributes' => $request->validated()]);
    }
}
