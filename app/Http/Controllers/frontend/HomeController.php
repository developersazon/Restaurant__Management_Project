<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Food;
use App\Models\Chef;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){
        $food_items = Food::all();
        $chef_Items = Chef::all();
        $breakfast_menu = Food::where('category', 'breakfast')->get();
        $lunch_menu = Food::where('category', 'Lunch')->get();
        $dinner_menu = Food::where('category', 'Dinner')->get();
        return view('frontend.home', compact('food_items', 'chef_Items', 'breakfast_menu', 'lunch_menu', 'dinner_menu'));
    }

}
