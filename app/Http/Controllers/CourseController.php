<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $courses = Course::all();
        // $courses = Course::orderBy('id','desc')->paginate(10);

        $col = 'id';
        $type = 'asc';

        if ($request->has('column')) {
            $col = $request->column;
            if (!in_array($col, ['id', 'name', 'price', 'created_at'])) {
                $col = 'id';
            }
            $type = $request->type;
        }

        if ($request->has('q') && !empty($request->q)) {
            $courses = Course::orderBy($col, $type)
                ->where('name', 'like', '%' . $request->q . '%')
                ->orWhere('price', 'like', '%' . $request->q . '%')
                ->simplepaginate(10);
        } else {
            $courses = Course::orderBy($col, $type)->simplepaginate(10);
        }



        return view('courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //1. validation
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg',
            'content' => 'required',
            'price' => 'required|numeric',
            'hours' => 'required|numeric',
        ]);

        //2. upload files
        $img_name = time() . rand() . $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('images'), $img_name);

        //3. store in data base
        //1. Using Model Object
        // $course = new Course();
        // $course->name    = $request->name;
        // $course->image   = $img_name;
        // $course->content = $request->content;
        // $course->price   = $request->price;
        // $course->hours   = $request->hours;
        // $course->save();

        //2. Using Model Method
        // Course::create([
        //     'name' => $request->name,
        //     'image' => $request->image,
        //     'content' => $request->content,
        //     'price' => $request->price,
        //     'hours' => $request->hours,

        // ]);
        $data = $request->except('_token');
        $data['image'] = $img_name;
        Course::create($data);



        //4. redirect to another route
        return redirect()
            ->route('courses.index')
            ->with('msg', 'Course Create Successfully!')
            ->with('type', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //    $course = Course::find($id);
        //    if(!$course){
        //     abort(404);
        //    }

        $course = Course::findOrFail($id);
        return view('courses.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //1. validation
        $request->validate([
            'name' => 'required',
            'image' => 'nullable|image|mimes:png,jpg,jpeg',
            'content' => 'required',
            'price' => 'required|numeric',
            'hours' => 'required|numeric',
        ]);

        $course = Course::findOrFail($id);

        //3. store in data base
        $data = $request->except('_token');

        if ($request->hasFile('image')) {
            File::delete(public_path('images/'.$course->image));
            //2. upload files
            $img_name = time() . rand() . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images'), $img_name);
            $data['image'] = $img_name;
        }

        $course->update($data);



        //4. redirect to another route
        return redirect()
            ->route('courses.index')
            ->with('msg', 'Course Updated Successfully!')
            ->with('type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Course::destroy($id);

        return redirect()
            ->route('courses.index')
            ->with('msg', 'Course Archived!')
            ->with('type', 'danger');
    }

    function trash()
    {
        // $courses = Course::latest('id')->paginate(10);

        $courses = Course::onlyTrashed()->latest('deleted_at')->paginate(10);
        return view('courses.trash', compact('courses'));
    }

    function restore($id)
    {
        $course = Course::onlyTrashed()->find($id)->restore();

        // return redirect()->back();

        return redirect()
            ->route('courses.index')
            ->with('msg', 'Restored Successfully!')
            ->with('type', 'success');
    }

    function forcedelete($id)
    {
        $course = Course::onlyTrashed()->find($id);
        File::delete(public_path('images/'.$course->image));
        $course->forcedelete();

        // return redirect()->back();
        return redirect()
            ->route('courses.index')
            ->with('msg', 'Deleted for ever!')
            ->with('type', 'danger');
    }
}
