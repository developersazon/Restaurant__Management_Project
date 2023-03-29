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
        return view('frontend.home', compact('food_items', 'chef_Items'));
    }

}
