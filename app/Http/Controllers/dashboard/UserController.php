<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(){

        $users=User::all();
        return view('admin.users',compact('users'));
    }
    public  function search(Request $request){
        $search_box=$request->search_box;
        $users = DB::table('users')
            ->where('name', 'like', '%'.$search_box.'%')
            ->orWhere('id', 'like', '%'.$search_box.'%')
            ->orWhere('email', 'like', '%'.$search_box.'%')
            ->orWhere('phone', 'like', '%'.$search_box.'%')
            ->get();
        return view('admin.users',compact('users'));
    }

    public  function destroy($id){
        $admin=User::findorfail($id);
        $admin->delete();
        return redirect()->back();
    }
}
