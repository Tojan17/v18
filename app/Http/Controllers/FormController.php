<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    function form1(){
        return view('forms.form1');
    }

    //function form1_data(Request $request, $type, $age){
    function form1_data(Request $request){
        //dd($_POST);
        // dd($request->all());
        // dd($request->except('_token'));
        // dd($request->only('_token', 'email'));

        $email = $request->email;
        $password = $request->password;

        return "Email : $email, <br> Password : $password";
    }




    function user(){
        return view('forms.user');

    }

    function user_data(Request $request){

        $name = $request->name;
        $age = $request->age;

        return view('forms.user_data', compact('name', 'age'));
    }




    function form2(){
        return view('forms.form2');

    }

    function form2_data(Request $request){

       // dd($request->except('_token'));

        $request->validate([
            'first_name' => 'required|min:4|max:20',
            'last_name' => 'required|min:4|max:20',
            'email' => 'required|ends_with:@gmail.com',
            'password' => 'required|confirmed',
        ]);

    }

}
