<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->view('login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('registration');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreUserRequest $request, UserService $user)
    {
        $createStatus = $user->create($request->validated());
        if ($createStatus === false)
        {
            return redirect()->back()->withErrors(['message' => "Can't to create user"]);
        }
        return redirect()->route('users.show',['user'=>$createStatus]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, UserService $userService)
    {
        $user = $userService->getUserInformation($request->user);
        $invites = $userService->getUserInvites($request->user);
        return response()->view('userPage',['user' =>$user['user'], 'rooms'=>$user['rooms']]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, UserService $user)
    {
        $user = $user->getUserInformation($request->user);
        return response()->view('userEdit', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, UserService $user)
    {
        $updateStatus = $user->update($request->user, $request->all());
        if ($updateStatus === false)
        {
            return redirect()->back()->withErrors(['message' => "Can't to update user"]);
        }
        return redirect()->route('users.show', ['user'=>$updateStatus]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserService $user)
    {
        //
    }
}
