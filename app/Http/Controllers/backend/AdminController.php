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
    public function adminUsers(){

        $data = User::simplepaginate(6);
        return view('admin.users', compact('data'));
    }

    public function adminDashboard(){
        $usertype  = Auth::user()->usertype;
        if($usertype == '1'){
            return view('admin.dashboard');
        }else{
          return view('frontend.home');
        }
    }

    public function deleteUsers($id){
        $id = User::find($id);
        $id->delete();
        return redirect()->back();
    }

}
