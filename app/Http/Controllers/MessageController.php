<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MessageController extends Controller
{
    function  index(){
        return view('frontend.contact');
    }
    function  about(){
        return view('frontend.about');
    }
    function store(Request $request){
        $request->validate([
            'name'=>['required','string','max:255'],
            'email'=>['required','string','email','max:255'],
            'phone'=>['required','numeric','min:11'],
            'message'=>['required','string']
        ]);
        $message = Message::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message
        ]);
        return redirect()->back();

    }
    //
}
