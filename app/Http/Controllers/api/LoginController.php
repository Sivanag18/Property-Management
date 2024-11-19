<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //
    public function  login(Request $request){
        $user=User::where('email',$request->email)->first();
        if(!Hash::check($request->password,$user->password)){
            return "can't login";
        }
        $token =$user->createToken($user->name);
        return  response()->json(['token'=>$token->plainTextToken,'user'=>$user]);
    }
}
