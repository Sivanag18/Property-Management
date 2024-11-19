<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class updateController extends Controller
{
    function create(){

        return view('admin.update');
    }
}
