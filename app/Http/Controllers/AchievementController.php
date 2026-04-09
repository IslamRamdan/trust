<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AchievementController extends Controller
{
    // عرض قائمة الإنجازات
    public function index()
    {
        $achievements = Achievement::latest()->get();

        $total = Achievement::count();
        $thisMonth = Achievement::where('created_at', '>=', now()->subMonth())->count();

        return view('achievements.index', compact('achievements', 'total', 'thisMonth'));
    }

    // عرض صفحة إضافة إنجاز جديد
    public function create()
    {
        return view('achievements.create');
    }

    // تخزين الإنجاز الجديد في قاعدة البيانات
    public function store(Request $request)
    {
        // التحقق من البيانات: العنوان، الوصف، ومصفوفة الصور (حد أقصى 3)
        $request->validate([
            'title_en'       => 'required|string|max:255',
            'title_ar'       => 'required|string|max:255',
            'description_en' => 'required|string',
            'description_ar' => 'required|string',
            'images'      => 'required|array|min:1|max:3',
            'images.*'    => 'image|mimes:jpeg,png,jpg|max:2048' // حجم الصورة الأقصى 2MB
        ]);

        $imagePaths = [];

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                // تخزين الصورة في مجلد achievements داخل القرص العام (public)
                $path = $image->store('achievements', 'public');
                $imagePaths[] = $path;
            }
        }

        // إنشاء السجل في قاعدة البيانات
        Achievement::create([
            'title_en'       => $request->title_en,
            'title_ar'       => $request->title_ar,
            'description_en' => $request->description_en,
            'description_ar' => $request->description_ar,
            'images'      => $imagePaths // سيتم تحويلها تلقائياً لـ JSON بفضل الـ Cast في الموديل
        ]);

        return redirect()->route('achievements.index')->with('success', 'تم إضافة الإنجاز بنجاح!');
    }

    // حذف الإنجاز مع حذف صوره من السيرفر
    public function destroy(Achievement $achievement)
    {
        // حذف الملفات الفيزيائية من التخزين لتوفير المساحة
        if ($achievement->images) {
            foreach ($achievement->images as $path) {
                Storage::disk('public')->delete($path);
            }
        }

        $achievement->delete();

        return back()->with('success', 'تم حذف الإنجاز وكافة ملفاته.');
    }
    public function edit($id)
    {
        // بنجيب البيانات من الداتابيز أو بنطلع 404 لو مش موجود
        $achievement = Achievement::findOrFail($id);

        return view('achievements.edit', compact('achievement'));
    }

    /**
     * تحديث البيانات في الداتابيز
     */
    public function update(Request $request, $id)
    {
        $achievement = Achievement::findOrFail($id);

        $request->validate([
            'title_en' => 'required|string|max:255',
            'title_ar'     => 'required|string|max:255',
            'description_en' => 'required|string',
            'description_ar' => 'required|string',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // تحديث البيانات الأساسية
        $achievement->title_en = $request->title_en;
        $achievement->title_ar = $request->title_ar;
        $achievement->description_en = $request->description_en;
        $achievement->description_ar = $request->description_ar;

        // لو رفع صور جديدة، بنضيفها للقديمة أو بنستبدلها حسب رغبتك
        if ($request->hasFile('images')) {
            $paths = [];
            foreach ($request->file('images') as $image) {
                $paths[] = $image->store('achievements', 'public');
            }
            // هنا بنستبدل الصور القديمة بالجديدة (مثال)
            $achievement->images = $paths;
        }

        $achievement->save();

        return redirect()->route('achievements.index')->with('success', 'تم تحديث الإنجاز بنجاح!');
    }
}
