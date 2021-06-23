<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);
        if (!Auth::attempt($request->all())){
            return response()->json(['res'=>'Usuario no encontrado'],400);
        }
        $user=User::where('email',$request->email)->firstOrfail();
        $token=$user->createToken('auth_token')->plainTextToken;
        return response()->json(['token'=>$token],200);
    }
    public function logout(){

    }
    public function me(){

    }
}
