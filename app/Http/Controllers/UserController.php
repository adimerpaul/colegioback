<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
    public function register(Request $request){
        $request->validate([
            'email'=>'required',
            'name'=>'required',
            'password'=>'required',
        ]);
//        if (!Auth::attempt($request->all())){
//            return response()->json(['res'=>'Usuario no encontrado'],400);
//        }
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=> Hash::make($request->pasword),
        ]);
        $user=User::where('email',$request->email)->firstOrfail();
        $token=$user->createToken('auth_token')->plainTextToken;
        return response()->json(['token'=>$token],200);
    }
    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();
        return response()->json(['res'=>'usuario salido exitosamente'],200);
    }
    public function me(Request $request){
        return $request->user();
    }
}
