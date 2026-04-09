@extends('adminlte::page')

@section('title', 'لوحة التحكم | الدورات')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="text-dark font-weight-bold">نظرة عامة على الدورات</h1>
        <a href="{{ route('courses.create') }}" class="btn btn-primary shadow-sm"
            style="border-radius: 50px; background-color: var(--primary-color); border: none;">
            <i class="fas fa-plus"></i> إضافة دورة جديدة
        </a>
    </div>
@stop

@section('content')
    {{-- صف الإحصائيات (Small Boxes) --}}
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box shadow-sm border-0" style="background: var(--glass-bg); border-radius: 15px;">
                <div class="inner">
                    <h3>{{ $courses->count() ?? 0 }}</h3>
                    <p class="font-weight-bold">إجمالي الدورات</p>
                </div>
                <div class="icon">
                    <i class="fas fa-graduation-cap" style="color: var(--primary-color); opacity: 0.3;"></i>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box shadow-sm border-0" style="background: var(--glass-bg); border-radius: 15px;">
                <div class="inner">
                    <h3>{{ $courses->where('created_at', '>=', now()->subDays(7))->count() }}</h3>
                    <p class="font-weight-bold">دورات أضيفت هذا الأسبوع</p>
                </div>
                <div class="icon">
                    <i class="fas fa-calendar-plus" style="color: var(--secondary-color); opacity: 0.3;"></i>
                </div>
            </div>
        </div>
    </div>

    {{-- جدول عرض الدورات الأحدث --}}
    <div class="card shadow-sm border-0" style="border-radius: 15px; overflow: hidden;">
        <div class="card-header border-0" style="background: var(--primary-color); color: white;">
            <h3 class="card-title float-right">آخر الدورات التدريبية</h3>
        </div>
        <div class="card-body p-0">
            <table class="table table-hover table-striped mb-0 text-right">
                <thead class="bg-light">
                    <tr>
                        <th style="width: 80px">ID</th>
                        <th>اسم الدورة التدريبية(عربي)</th>
                        <th>اسم الدورة التدريبية(انجليزي)</th>
                        <th>تاريخ الإضافة</th>
                        <th class="text-center">العمليات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($courses->take(10) as $course)
                        <tr>
                            <td class="font-weight-bold text-muted">#{{ $course->id }}</td>
                            <td>{{ $course->title_ar }}</td>
                            <td>{{ $course->title_en }}</td>
                            <td>{{ $course->created_at->format('Y-m-d') }}</td>
                            <td class="text-center">
                                <a href="{{ route('courses.edit', $course->id) }}"
                                    class="btn btn-sm btn-outline-primary px-3" style="border-radius: 20px;">
                                    <i class="fas fa-edit"></i> تعديل
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-4 text-muted">لا توجد دورات مسجلة حالياً.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    <style>
        :root {
            --primary-color: #1a1d20;
            /* لون داكن يتناسب مع ذوقك في التباين العالي */
            --secondary-color: #0056b3;
            --glass-bg: #ffffff;
        }

        /* تحسين شكل الـ Sidebar */
        .main-sidebar {
            background-color: #1a1d20 !important;
        }

        .nav-link.active {
            background-color: var(--secondary-color) !important;
            border-radius: 8px;
        }

        /* تظبيط الخطوط والاتجاهات */
        body {
            font-family: 'Cairo', sans-serif;
            background-color: #f4f6f9 !important;
        }

        .table th,
        .table td {
            vertical-align: middle !important;
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">
@stop
