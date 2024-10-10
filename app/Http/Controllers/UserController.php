<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return new PostResource('200', "Berhasil mengambil data user", $users);
    }

    public function store(){
        $validator = Validator::make(request()->all(), [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);
        if($validator->fails()){
            return new PostResource('400', "Gagal Menambahkan User", $validator->errors());
        }
        $user = User::create(request()->all());
        return new PostResource('200', "Berhasil Menambahkan User", $user);
    }

    public function update($id){
        $user = User::find($id);
        if(!$user){
            return new PostResource('404', "User Tidak Ditemukan", $user);
        }
        $user->update(request()->all());
        return new PostResource('200', "Berhasil Mengupdate User", $user);
    }

    public function destroy($id){
        $user = User::find($id);
        if(!$user){
            return new PostResource('404', "User Tidak Ditemukan", $user);
        }
        $user->delete();
        return new PostResource('200', "Berhasil Menghapus User", $user);
    }
}
