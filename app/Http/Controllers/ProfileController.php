<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{

    public function show()
    {
        return view('profile.show');
    }

    public function edit()
    {
        return view('profile.edit');
    }

    public function update(ProfileUpdateRequest $request)
    {
        $user = auth()->user();

        if($request->hasFile('image')) {
            // delete old image
            if($user->image) {
                Storage::delete($user->image->path);
            }
            $user->image()->delete();

            // upload new image
            $path = $request->file('image')->store('upload/images');
            $user->image()->create(['path' => $path]);
            // Image::create([
            //     'path' => $path,
            //     'imageable' => auth()->id(),
            //     'imageable_type' => User::class
            // ]);
        }

        $user->update($request->only('name', 'email'));

        // session()->flash('success', 'A profile was updated successfully.');
        return to_route('profile.show')->with('success', 'A profile was updated successfully.'); // only work on laravel 9
        // return redirect()->to('profile.edit');
    }
}
