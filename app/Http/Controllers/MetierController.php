<?php

namespace App\Http\Controllers;

use App\Http\Requests\MetierStoreRequest;
use App\Services\MetierService;
use Illuminate\Http\Request;

class MetierController extends Controller
{
    public function create()
    {
        return response()->view('createClass');
    }
    public function store(MetierStoreRequest $request, MetierService $metierService)
    {
        $metierService->create($request->all());
        return redirect()->route('rooms.index');
    }
}
