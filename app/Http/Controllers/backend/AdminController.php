<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Food;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Session;

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

        $users_Data = User::simplepaginate(4);
        return view('admin.users', compact('users_Data'));
    }

    public function adminfoodItems(){
        $food_Items = food::all();
        return view('admin.fooditems', compact('food_Items'));
    }

    public function adminfoodMenu(){
        return view('admin.addfood');
    }

    public function admin_add_food_items(Request $request){
        $request->validate([
            'title' => 'required',
            'price' => 'required | numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:150',
            'description' => 'required',

        ]);

        $food_data = new Food();
        $food_data->title = $request->title;
        $food_data->price = $request->price;
        $imageName = time(). "restaurant.". $request->file('image')->getClientOriginalExtension();
        $food_data->image = $request->file('image')->storeAs('uploads'.$imageName);
        $food_data->description = $request->description;

        // dd($food_data);
        $food_data->save();
        Session::flash('msg', 'Your Data Send Successfully');
        return redirect('/fooditems');

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
