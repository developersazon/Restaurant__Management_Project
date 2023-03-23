<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Food;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){
        $food_items = Food::all();
        return view('frontend.home', compact('food_items'));
    }

}
