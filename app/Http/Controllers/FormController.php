<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    function form1(){
        return view('forms.form1');
    }

    // function form1_data(Request $request){

    //     $email = $request->email;
    //     $password = $request->password;

    //     return view('forms.form1', compact('name', 'age'));

    // }
}
