<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.index');
    }

    public function edit()
    {
        return view('profile.edit');
    }

    public function update(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required',
        ]);

        if($validator->fails()){
            return redirect(route('profile.edit'))
            ->withErrors($validator)
            ->withInput();
        }


        // Update User Data
        $user = Auth::user();
        if( $request->name){
            $user->name = $request->name;
        }
        if( $request->email){
            $user->email = $request->email;
        }
        if( $request->password){
            $user->password = bcrypt($request->password);
        }
        $user->save();

        // Update Profile Image
        if( $request->file('image')){

            // Delete User Has Old Profile Image
            if( $user->profile_image){
                Storage::delete($user->profile_image->path);
                Image::where('imageable_id', $user->id)->delete();
            }

            // Upload New Profile image
            $file = $request->file('image');
            $filename = time().'_'.$file->getClientOriginalName();
            $dir = '/upload/'.$user->id;

            $path = $file->storeAs($dir, $filename);

            Image::create([
                'imageable_id' => $user->id,
                'imageable_type' => 'User',
                'path' => $path,
            ]);
        }

        return redirect(route('profile'));
    }
}
