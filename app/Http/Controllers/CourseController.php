<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Course::destroy($id);
        return redirect()->route('courses.index');

    }
}
