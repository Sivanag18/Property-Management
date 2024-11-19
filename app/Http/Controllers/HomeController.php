<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    function  index(){
        $properties=Property::all();
        return view('frontend.home',compact('properties'));
    }

    function search(Request $request){
        $location=$request->location;
        $type=$request->type;
        $minimum=$request->minimum;
        $maximum=$request->maximum;
        $properties=DB::table('property')->where('address','like',"%".$location."%")
            ->Where('type','like','%'.$type.'%')
            ->whereBetween('price',[$minimum,$maximum])
            ->orderBy('created_at','desc')
            ->get();

        return view('frontend.search',compact('properties'));
    }
}
