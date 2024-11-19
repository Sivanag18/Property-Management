<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index(){

        $admins=Admin::all();
        return view('admin.admins',compact('admins'));
    }
    public  function search(Request $request){
       $search_box=$request->search_box;
        $admins = DB::table('admins')
            ->where('name', 'like', '%'.$search_box.'%')
            ->orWhere('id', 'like', '%'.$search_box.'%')
            ->orWhere('email', 'like', '%'.$search_box.'%')
            ->get();
        return view('admin.admins',compact('admins'));
    }
    public  function destroy($id){
      $admin=Admin::findorfail($id);
      $admin->delete();
      return redirect()->back();
    }
}
