<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ChangePasswordUpdateRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class ChangePasswordController extends Controller
{
    public function edit()
    {
        return view('change_password.edit');
    }

    public function update(ChangePasswordUpdateRequest $request)
    {
        $user = Auth::user();
        $oldPassword = $request->old_password;
        $oldHashedPassword = $user->password;

        if(! Hash::check($oldPassword, $oldHashedPassword)) {
            throw ValidationException::withMessages([
                'old_password' => 'The old password is incorrect.'
            ]);
        }

        $user->update([
            'password' => bcrypt($request->new_password)
        ]);

        return to_route('profile.show')->with('success', 'Password is changed successfully.');
    }
}
