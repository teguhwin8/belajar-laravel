<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::orderBy('id', 'desc')->paginate(6);
        return view('course.index', compact('courses'));
    }

    public function show($slug)
    {
        $course = Course::where('slug', $slug)->first();
        if ($course == null) {
            abort(404);
        }
        return view('course.single', compact('course'));
    }

    public function join($id)
    {
        $user = Auth::user();
        $user->courses()->toggle([$id]);
        return redirect()->back();
    }
}
