<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Food;
use App\Models\Chef;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function index(){
        $food_items = Food::all();
        $chef_Items = Chef::all();
        $breakfast_menu = Food::where('category', 'breakfast')->get();
        $lunch_menu = Food::where('category', 'Lunch')->get();
        $dinner_menu = Food::where('category', 'Dinner')->get();
        return view('frontend.home', compact('food_items', 'chef_Items', 'breakfast_menu', 'lunch_menu', 'dinner_menu'));
    }

    public function addToCart(Request $request, $id) {
        $user_id = Auth::id();
        if($user_id){

            $user_id = Auth::id();
            $food_id = $id;
            $quantity = $request->quantity;

            $cart = new Cart();
            $cart->user_id = $user_id;
            $cart->food_id = $food_id;
            $cart->quantity = $quantity;
            $cart->save();

            return redirect()->back();

        }else{
            return redirect('/login');
        }
    }

}
