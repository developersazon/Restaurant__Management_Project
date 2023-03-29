<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Chef;
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

    // all food menu add and items start here
    public function adminfoodItems(){
        $food_Items = Food::all();
        return view('admin.fooditems', compact('food_Items'));
    }

    public function addfoodMenu(){
        return view('admin.addfood');
    }

    public function admin_add_food_items(Request $request){
        $request->validate([
            'title' => 'required',
            'price' => 'required | numeric',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif,svg',
            'description' => 'required',

        ]);

        $food_data = new Food();
        $food_data->title = $request->title;
        $food_data->price = $request->price;
        //
        $imageName = time(). "restaurant." .$request->file('image')->getClientOriginalExtension();
        $food_data->image =$imageName;
        $request->file('image')->move(public_path('images'), $imageName);
        //
        $food_data->description = $request->description;

        $food_data->save();
        Session::flash('msg', 'New Food Items added Successfully');
        return redirect()->back();

    }
     // all food menu add and items end here


    //  add chefs users start here
    public function addChefUser(){
        return view('admin.addchef');
    }

    public function addNewChefs(Request $request){
        $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif,svg',
            'description' => 'required',

        ]);

        $chef_data = new Chef();
        $chef_data->name = $request->name;
        $chef_data->designation = $request->designation;
        //
        $imageName = time(). "restaurant." .$request->file('image')->getClientOriginalExtension();
        $chef_data->image =$imageName;
        $request->file('image')->move(public_path('images'), $imageName);
        //
        $chef_data->description = $request->description;

        // dd($food_data);
        $chef_data->save();
        Session::flash('msg', 'New Chef Information added Successfully');
        return redirect()->back();

    }
    //  end chefs users end here

    // food items view and edit section start here
    public function editFoodItems($id){
        $edit_data = Food::find($id);
        return view('admin.update_foodItems', compact('edit_data'));

    }

    public function update_FoodItems(Request $request, $id){
        $request->validate([
            'title' => 'required',
            'price' => 'required | numeric',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif,svg',
            'description' => 'required',

        ]);

        $food_data = Food::find($id);
        $food_data->title = $request->title;
        $food_data->price = $request->price;
                //
                $imageName = time(). "restaurant." .$request->file('image')->getClientOriginalExtension();
                $food_data->image =$imageName;
                $request->file('image')->move(public_path('images'), $imageName);
                //
        $food_data->description = $request->description;

        // dd($food_data);
        $food_data->save();
        Session::flash('msg', 'Your Food Menu data is Successfully Updated !');
        return redirect()->back();
    }
    // food items view and edit section end here

    // all chefs users data start here
    public function allChefUsers(){
        $chefs_data = Chef::all();
        return view('admin.chefUsers', compact('chefs_data'));
    }
    // all chefs users data end here

    // edit chef users data form view start here
    public function editChefsUser($id) {
        $edit_ChefData = Chef::find($id);
        return view('admin.edit_ChefUsers', compact('edit_ChefData'));
    }
    // edit chef users data form view end here

    //edit chef users data for update start here
    public function updateChefsUser(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif,svg',
            'description' => 'required',

        ]);

        $chef_data = Chef::find($id);
        $chef_data->name = $request->name;
        $chef_data->designation = $request->designation;
        //
        $imageName = time(). "restaurant." .$request->file('image')->getClientOriginalExtension();
        $chef_data->image =$imageName;
        $request->file('image')->move(public_path('images'), $imageName);
        //
        $chef_data->description = $request->description;

        // dd($food_data);
        $chef_data->save();
        Session::flash('msg', 'Chefs data Successfully Updated');
        return redirect()->back();
    }
    // edit chef users data for update end here


    // delete functions all start here
    public function deleteUsers($id){
        $delete_id = User::find($id);
        $delete_id->delete();
        return redirect()->back();
    }

    public function deleteFoodItems($id){
        $delete_foodItems = Food::find($id);
        $delete_foodItems->delete();
        return redirect()->back();
    }
    // delete function all end here

    // Admin logout form Dashboard
    public function adminLogout(Request $request){
        Auth::logout();
        return redirect('/home');
    }

}
