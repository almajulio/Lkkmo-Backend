<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function login(Request $request){

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'name' => 'required'
        ]);

        $data = [
            'email' => $request->email,
            'name' => $request->name,
            'password' => $request->password,
        ];

        if(Auth::attempt($data)){
            return response()->json([
                'status' => 200,
                'message' => 'Login Successfully',
            ]);
        }else{
            return response()->json([
                'status' => 401,
                'message' => 'Login Failed',
            ]);
        }
       
    }

    public function register(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'name' => 'required'
        ]);
        
        User::create([
            'email' => $request->email,
            'name' => $request->name,
            'password' => bcrypt($request->password),
            'role_id' => 1
        ]);
    }

    public function logout(){
        Auth::logout();
        return response()->json([
            'status' => 200,
            'message' => 'Logout Successfully',
        ]);
    }
}
