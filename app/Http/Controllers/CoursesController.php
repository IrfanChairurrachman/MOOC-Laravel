<?php

namespace App\Http\Controllers;

use App\Course;
use App\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $courses = Course::all();
        return view('index', compact('courses'));
        // Compact('courses') dapat diganti degan ['courses' => $courses]
    }

    public function adminindex()
    {
        $courses = Course::all();
        return view('admin.index', compact('courses'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    // Store for new Course
    public function store(Request $request)
    {
        // request validation
        $request->validate([
            'name' => 'required|max:128',
            'deskripsi' => 'required|max:255'
        ]);

        // assign request to course
        $course = new Course;
        $course->name = $request->name;
        $course->deskripsi = $request->deskripsi;
        
        // save to db
        $course->save();
        // return $request;

        return redirect('/admin')->with('status', 'Course Inserted!');
    }

    public function createlesson(Course $course)
    {
        //
        return view('admin.createlesson', compact('course'));
    }
    // Store handle for new lesson
    public function storelesson(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|max:128',
            'linkvid' => 'required|max:255'
        ]);
        $lesson = new Lesson;
        $lesson->name = $request->name;
        $lesson->course = $request->course;
        $lesson->linkvid = $request->linkvid;
        $lesson->save();
        return redirect('admin/')->with('status', 'Lesson Inserted!');
        // return $course;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
        // dd($course->id);
        // $courses = DB::table('courses')->where('id', $course->id)->get();
        $courses = Course::where('id', $course->id)->get();
        // $ulala = "halo";
        $lessons = Lesson::where('course', $course->id)->get();
        // dd($lessons);
        // return $courses;
        // dd($courses);
        return view('lessons', compact('lessons', 'courses'));
    }

    public function showlesson(Course $course, Lesson $lesson)
    {
        //
        $material = Lesson::where('id', $lesson->id)->get();
        return view('lesson', compact('material', 'course'));
        // return $lesson;
    }

    public function adminshow(Course $course)
    {
        //
        // $courses = DB::table('courses')->where('id', $course->id)->get();
        $courses = Course::where('id', $course->id)->get();
        $lessons = Lesson::where('course', $course->id)->get();
        return view('admin.lessons', compact('lessons', 'courses'));
    }

    public function showadminlesson(Course $course, Lesson $lesson)
    {
        //
        $material = Lesson::where('id', $lesson->id)->get();
        return view('lesson', compact('material', 'course'));
        // return $lesson;
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //
        return view('admin.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        //
        $request->validate([
            'name' => 'required|max:128',
            'deskripsi' => 'required|max:255'
        ]);

        Course::where('id', $course->id)->update([
            'name' => $request->name,
            'deskripsi' => $request->deskripsi
        ]);

        return redirect('/admin')->with('status', 'Course Updated!');
    }

    public function editlesson(Course $course, Lesson $lesson)
    {
        //
        // return $lesson;
        return view('admin.editlesson', compact('course', 'lesson'));
    }

    public function updatelesson(Request $request, Course $course, Lesson $lesson)
    {
        //
        $request->validate([
            'name' => 'required|max:128',
            'linkvid' => 'required|max:255'
        ]);

        Lesson::where('id', $lesson->id)->update([
            'name' => $request->name,
            'course' => $request->course,
            'linkvid' => $request->linkvid
        ]);
        // return $request;

        return redirect('/admin')->with('status', 'Lesson Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
        Course::destroy($course->id);
        return redirect('/admin')->with('status', 'Course Deleted!');
    }

    public function destroylesson(Course $course, Lesson $lesson)
    {
        //
        // return $lesson->id;
        Lesson::destroy($lesson->id);
        return redirect()->back()->with('status', 'Lesson Deleted!');
    }

}
