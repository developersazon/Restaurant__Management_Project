<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use session;

class AdminController extends Controller
{
    //
    public function adminDashboard(){
        $usertype  = Auth::user()->usertype;
        if($usertype == '1'){
            return view('admin.dashboard');
        }else{
          return view('frontend.home');
        }
    }

    public function adminUsers(){

        $data = User::simplepaginate(4);
        return view('admin.users', compact('data'));
    }

    public function adminfoodItems(){
        return view('admin.fooditems');
    }

    public function adminfoodMenu(){
        return view('admin.addfood');
    }

    public function admin_add_food_items(Request $request){
        $request->validate([
            'title' => 'required',
            'price' => 'required | numeric',
            'image' => 'mimes:jpeg,jpg,png,gif|required|max:150',
            'description' => 'required',

        ]);
        
    }

    public function deleteUsers($id){
        $delete_id = User::find($id);
        $delete_id->delete();
        return redirect()->back();
    }


    // Admin logout form Dashboard
    public function adminLogout(Request $request){
        Auth::logout();
        return redirect('/home');
    }

}
