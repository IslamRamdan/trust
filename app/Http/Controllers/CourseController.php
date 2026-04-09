<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = \App\Models\Course::all();
        return view('courses.index', compact('courses'));
    }

    public function create()
    {
        return view('courses.create'); // صفحة الإضافة
    }

    public function store(Request $request)
    {
        $request->validate([
            'title_en' => 'required|max:255',
            'title_ar' => 'required|max:255'
        ]);
        \App\Models\Course::create($request->all());
        return redirect()->route('courses.index')->with('success', 'تمت الإضافة بنجاح');
    }

    public function edit($id)
    {
        $course = \App\Models\Course::findOrFail($id);
        return view('courses.edit', compact('course')); // صفحة التعديل
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title_en' => 'required|max:255',
            'title_ar' => 'required|max:255',
        ]);
        $course = \App\Models\Course::findOrFail($id);
        $course->update($request->all());
        return redirect()->route('courses.index')->with('success', 'تم التحديث بنجاح');
    }

    // لحذف الدورة
    public function destroy(Course $course)
    {
        $course->delete();
        return back();
    }
}
