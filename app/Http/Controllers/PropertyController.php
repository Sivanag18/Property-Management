<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Property;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PropertyController extends Controller
{
    function index(){
        return view('frontend.property_post');
    }

    function store(Request $request){

        $request->validate([
            'property_name' => 'required|string|max:50',
            'address' => 'required|string|max:100',
            'price' => 'required|numeric|min:0|max:9999999999',
            'type' => 'required|string',
            'offer' => 'required|string',
            'description' => 'required|string|max:1000',
            'bedroom' => 'required|integer|min:0|max:99',
            'bathroom' => 'required|integer|min:0|max:99',
            'balcony' => 'nullable|integer|min:0|max:99',
            'image_01' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'image_02' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $user_id = Auth::user()->id;

        $imageNames = [];
        foreach (['image_01', 'image_02'] as $key) {
            if ($request->hasFile($key)) {
                $image = $request->file($key);
                $extension = $image->getClientOriginalExtension();
                $name = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME) . $user_id . '.' . $extension;

                $latestProperty = Property::latest()->first();
                $property_id = $latestProperty ? $latestProperty->id + 1 : 1;

                $image->move(public_path("attachments/$user_id/$property_id"), $name);
                $imageNames[$key] = $name;
            } else {
                $imageNames[$key] = null;
            }
        }

        Property::create([
            'user_id' => $user_id,
            'user_name' => Auth::user()->name,
            'property_name' => $request->property_name,
            'address' => $request->address,
            'price' => $request->price,
            'type' => $request->type,
            'offer' => $request->offer,
            'description' => $request->description,
            'bedroom' => $request->bedroom,
            'bathroom' => $request->bathroom,
            'balcony' => $request->balcony,
            'image_01' => $imageNames['image_01'],
            'image_02' => $imageNames['image_02'],
        ]);

        return redirect()->back()->with('success', 'Property posted successfully!');
    }

 
    function all_listings(){
        $properties = Property::all();
        return view('frontend.listings', compact('properties'));
    }

    function all_listings_property_admin(){
        $properties = Property::all();
        return view('admin.listings', compact('properties'));
    }

    function view_property($id){
        $property = Property::findOrFail($id);
        $user = User::findOrFail($property->user_id);
        return view('frontend.view_property', compact('property', 'user'));
    }

    public function search(Request $request){
        $search_box = $request->search_box;
        $properties = Property::where('property_name', 'like', '%' . $search_box . '%')
            ->orWhere('address', 'like', '%' . $search_box . '%')
            ->get();
        return view('admin.listings', compact('properties'));
    }

    public function destroy($id){
        $property = Property::findOrFail($id);
        
       
        $user_id = $property->user_id;
        $property_id = $property->id;
        $propertyFolder = public_path("attachments/$user_id/$property_id");
        
        if (is_dir($propertyFolder)) {
            array_map('unlink', glob("$propertyFolder/*"));
            rmdir($propertyFolder);
        }

        $property->delete();
        return redirect()->back()->with('success', 'Property deleted successfully!');
    }

 
    function admin_view_property($id){
        $property = Property::findOrFail($id);
        $user = User::findOrFail($property->user_id);
        return view('admin.view_property', compact('property', 'user'));
    }
}
