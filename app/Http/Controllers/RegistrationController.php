<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

class RegistrationController extends Controller
{
    public function index(): View
    {
        return view('auth.registration');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => [
                'required', 'confirmed',
                Password::min(6)->numbers()->symbols()->mixedCase(),
            ],
        ]);

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        auth()->attempt($request->only('email', 'password'));

        return redirect()->route('dashboard')->with('success', 'Registration Successful');
    }
}
