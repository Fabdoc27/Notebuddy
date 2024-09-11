<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('auth.profile-update', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProfileUpdateRequest $request, User $profile)
    {
        $validated = $request->validated();

        $profile->updateOrFail($validated);

        return to_route('dashboard')->with(['success' => 'Profile Updated Successfully.']);
    }
}
