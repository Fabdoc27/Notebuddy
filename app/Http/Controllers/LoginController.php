<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class LoginController extends Controller
{
    public function index(): View
    {
        return view('auth.login');
    }

    public function userLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
        ]);

        if (! auth()->attempt($request->only('email', 'password'), $request->input('remember'))) {
            return back()->with('error', 'Invalid Login Details');
        }

        return redirect()->route('dashboard')->with('success', 'Login Successful');
    }
}
