<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\CheckWordsCount;

class FormController extends Controller
{
    function form1()
    {
        return view('forms.form1');
    }

    //function form1_data(Request $request, $type, $age){
    function form1_data(Request $request)
    {
        //dd($_POST);
        // dd($request->all());
        // dd($request->except('_token'));
        // dd($request->only('_token', 'email'));

        $email = $request->email;
        $password = $request->password;

        return "Email : $email, <br> Password : $password";
    }




    function user()
    {
        return view('forms.user');
    }

    function user_data(Request $request)
    {

        $name = $request->name;
        $age = $request->age;

        return view('forms.user_data', compact('name', 'age'));
    }




    function form2()
    {
        return view('forms.form2');
    }

    function form2_data(Request $request)
    {

        // dd($request->except('_token'));

        $request->validate([
            'first_name' => 'required|min:4|max:20',
            'last_name' => 'required|min:4|max:20',
            'email' => 'required|ends_with:@gmail.com',
            'password' => 'required|confirmed',
        ]);
    }





    function form3()
    {
        return view('forms.form3');
    }

    function form3_data(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required',
            'dob' => 'required|before:-18 years',
            'gender' => 'required',
            'education_level' => 'required',
            'hobbies' => 'required',
            'bio' => ['required', new CheckWordsCount(15)],
        ], [
            "name.required"  => "حقل الاسم مطلوب",
            "email.required"  => "حقل البريد مطلوب",
            "dob.required"  => "حقل تاريخ الميلاد مطلوب",
            "gender.required"  => "حقل الجنس مطلوب",
            "education_level.required"  => "حقل التعليم مطلوب",
            "hobbies.required"  => "حقل الهوايات مطلوب",
            "bio.required"  => "حقل الوصف مطلوب",

        ]);
        dd($request->all());
    }
}
