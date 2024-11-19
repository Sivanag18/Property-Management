<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MsessageController extends Controller
{
    //
    public function index(){

        $messages=Message::all();
        return view('admin.message',compact('messages'));
    }
    public  function search(Request $request){
        $search_box=$request->search_box;
        $messages = DB::table('messages')
            ->where('name', 'like', '%'.$search_box.'%')
            ->orWhere('id', 'like', '%'.$search_box.'%')
            ->orWhere('email', 'like', '%'.$search_box.'%')
            ->orWhere('phone', 'like', '%'.$search_box.'%')
            ->get();
        return view('admin.message',compact('messages'));
    }

    public  function destroy($id){
        $message=Message::findorfail($id);
        $message->delete();
        return redirect()->back();
    }
}
