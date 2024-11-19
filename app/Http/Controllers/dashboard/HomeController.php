<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Message;
use App\Models\Property;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function  index(){
        $messages=Message::all();
        $users=User::all();
        $admins=Admin::all();
        $properties=Property::all();
        return view('admin.home',compact('messages','users','admins','properties'));

    }
}
