<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    function all_listings_api(){

        $properties=Property::all();
        return response()->json($properties);
    }
}
