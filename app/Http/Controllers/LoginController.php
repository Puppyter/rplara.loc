<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        if (Auth::attempt($request->validated(), true))
        {
            $request->session()->regenerate();
            return redirect()->intended(route('users.show',['user' => Auth::id()]));
        }
        return back()->withErrors(['email' => 'Account with this email not found']);
    }

    public function logout()
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        return redirect()->route('users.index');
    }
}
