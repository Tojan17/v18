<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class RelationController extends Controller
{
    function users(){
        $users = User::with('profile')->get();
        return view('relations.users',compact('users'));
    }


    function profile($id){
        $profile = Profile::with('user')->find($id);
        dd($profile->user->name);
    }

}
