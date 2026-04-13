<?php

use App\Http\Controllers\AchievementController;
use App\Http\Controllers\ContactDetailController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\ProfileController;
use App\Models\Course;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $contactDetails = \App\Models\ContactDetail::first();
    $courses = Course::orderBy('created_at', 'desc')->take(3)->get();
    $achievements = \App\Models\Achievement::orderBy('created_at', 'desc')->take(3)->get();

    return view('welcome', compact('courses', 'achievements', 'contactDetails'));
});

Route::get('/dashboard', function () {
    // جلب كافة الدورات لتمكين العدادات والجدول من العمل
    $courses = Course::orderBy('created_at', 'desc')->get();

    return view('dashboard', compact('courses'));
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::resource('courses', CourseController::class);
    Route::resource('achievements', AchievementController::class);
    Route::resource('lessons', LessonController::class);
    Route::get('contacts', [ContactDetailController::class, 'index'])->name('contacts.index');
    Route::post('contacts/update', [ContactDetailController::class, 'update'])->name('contacts.update');
});

require __DIR__ . '/auth.php';
