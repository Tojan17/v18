<?php

namespace App\Http\Controllers;

use App\Mail\ContactUsMail;
use App\Mail\TestMail;
use Illuminate\Http\Request;
use App\Rules\CheckWordsCount;
use Illuminate\Support\Facades\Mail;

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




    function form4()
    {
        return view('forms.form4');
    }

    function form4_data(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => ['required']
        ]);

        // 'mimes:png', 'max:100',  'image',
        $folderName = date('Y') . '/' . date('m') . '_' . date('M') . '_' . date('F');
        foreach ($request->file('image') as  $image) {
            // $ex = rand() . time() . $request->file('image')->getClientOriginalName();
            $ex = $image->getClientOriginalExtension();
            $image_name = rand() . time() . rand() . '_' . rand() . rand() . rand() . '_' . rand() . '.' . $ex;
            $image->move(public_path('images/' . $folderName), $image_name);

            dd($request->all());
        }
    }




    function contact()
    {
        return view('forms.contact');
    }

    function contact_data(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'subject' => 'required',
            'image' => 'nullable|image|mimes:png,jpg',
            'message' => 'required',

        ]);

        $data = $request->except('_token', 'image'); //اشياء ما بدي ياها تظهر

        if ($request->hasFile('image')) {
            $image_name = rand() . time() . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images'), $image_name);
            $data['image'] = $image_name; //في حال رفعت صورة خليها تساوي الكلام هادا
        }

        // Mail::to('admin@admin.com')->send(new TestMail());
        Mail::to('admin@admin.com')->send(new ContactUsMail($data));
    }
}
