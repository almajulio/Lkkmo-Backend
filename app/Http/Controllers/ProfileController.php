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

   public function update(Request $request)
{
    // Validate request data
    $validator = Validator::make($request->all(), [
        'name' => 'nullable|string',
        'phone' => 'nullable|string',
        'alamat' => 'nullable|string',
        'password' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);
    if ($validator->fails()) {
        return response()->json($validator->errors(), 422);
    }
    // Find the authenticated user
    $user = User::find(auth()->user()->id);
    if (!$user) {
        return new PostResource('404', "User Tidak Ditemukan", $user);
    }

    // Prepare data with only provided fields
    $data = array_filter($request->only(['name', 'phone', 'alamat', 'password']), fn($value) => !is_null($value));

    // Hash the password if it's provided
    if (isset($data['password'])) {
        $data['password'] = bcrypt($data['password']);
    }

    // Handle file upload if an image is provided
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('images', 'public');
        $data['profile_photo_path'] = $imagePath;
    }

    // Update the user with filtered data
    $user->update($data);

    return new PostResource('200', "Berhasil Mengupdate Profile", $user);
}

}
