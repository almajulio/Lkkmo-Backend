<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function index()
    {
        $user = User::find(auth()->user()->id);
        return new PostResource('200', "Berhasil mengambil data profile", $user);
    }

    public function update(Request $request){
        $user = User::find(auth()->user()->id);
        if(!$user){
            return new PostResource('404', "User Tidak Ditemukan", $user);
        }

        if($user->id != auth()->user()->id){
            return new PostResource('401', "Anda Tidak Memiliki Akses");
        }
        $user->update($request->all());
        return new PostResource('200', "Berhasil Mengupdate Profile", $user);
    }
}
