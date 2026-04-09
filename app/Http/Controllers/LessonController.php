<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Course;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    /**
     * عرض كافة الدروس مرتبة حسب الدورة
     */
    public function index()
    {
        // نجلب الدروس مع بيانات الدورات المرتبطة بها لتقليل استعلامات القاعدة (Eager Loading)
        $lessons = Lesson::with('course')->orderBy('course_id')->get();
        return view('lessons.index', compact('lessons'));
    }

    /**
     * عرض صفحة إضافة درس جديد
     */
    public function create()
    {
        $courses = Course::all();
        return view('lessons.create', compact('courses'));
    }

    /**
     * تخزين درس جديد (عنوان فقط)
     */
    public function store(Request $request)
    {
        $request->validate([
            'title_en' => 'required|string|max:255',
            'title_ar' => 'required|string|max:255',
            'course_id' => 'required|exists:courses,id',
        ]);

        Lesson::create($request->all());

        return redirect()->route('lessons.index')->with('success', 'تم إضافة عنوان الدرس بنجاح!');
    }

    /**
     * عرض صفحة التعديل
     */
    public function edit(Lesson $lesson)
    {
        $courses = Course::all();
        return view('lessons.edit', compact('lesson', 'courses'));
    }

    /**
     * تحديث عنوان الدرس
     */
    public function update(Request $request, Lesson $lesson)
    {
        $request->validate([
            'title_en' => 'required|string|max:255',
            'title_ar' => 'required|string|max:255',
            'course_id' => 'required|exists:courses,id',
        ]);

        $lesson->update($request->all());

        return redirect()->route('lessons.index')->with('success', 'تم تحديث العنوان بنجاح!');
    }

    /**
     * حذف الدرس
     */
    public function destroy(Lesson $lesson)
    {
        $lesson->delete();
        return redirect()->route('lessons.index')->with('success', 'تم حذف الدرس من السجل.');
    }
}
