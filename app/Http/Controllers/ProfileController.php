<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use Illuminate\Http\Request;
use App\Models\User;
use Validator;

class ProfileController extends Controller
{
    public function index()
    {
        $user = User::find(auth()->user()->id);
        return new PostResource('200', "Berhasil mengambil data profile", $user);
    }

    public function update(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'nullable',
            'phone' => 'nullable',
            'alamat' => 'nullable',
            'password' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = User::find(auth()->user()->id);
        if(!$user){
            return new PostResource('404', "User Tidak Ditemukan", $user);
        }

         // Initialize data array with request inputs
        $data = $request->all();

        // Handle file upload if an image is provided
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('images', 'public');
            $data['profile_photo_path'] = $image; // Add image path to data
        }

        dd($data);
        // Update the user with the prepared data
        $user->update($data);
        return new PostResource('200', "Berhasil Mengupdate Profile", $user);
    }
}
