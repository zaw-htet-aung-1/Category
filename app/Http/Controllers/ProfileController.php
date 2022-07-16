<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('profile.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = auth()->user();

        if($request->hasFile('image')) {
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
        return to_route('profile.edit')->with('success', 'A profile was updated successfully.'); // only work on laravel 9
        // return redirect()->to('profile.edit');
    }
}
