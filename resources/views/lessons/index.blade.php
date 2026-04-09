@extends('adminlte::page')
@section('title', 'إدارة الدروس')

@section('content')
    <div class="container-fluid py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="font-weight-bold mb-1">فهرس الدروس</h2>
                <p class="text-muted small">إدارة جميع عناوين الدروس وتصنيفاتها حسب الدورات.</p>
            </div>
            <a href="{{ route('lessons.create') }}" class="btn btn-primary px-4 shadow-sm"
                style="border-radius: 12px; font-weight: 700;">
                <i class="fas fa-plus-circle mr-1"></i> إضافة درس جديد
            </a>
        </div>

        <div class="card border-0 shadow-sm" style="border-radius: 20px; overflow: hidden;">
            <div class="card-body p-0">
                <table class="table table-hover mb-0 custom-table">
                    <thead>
                        <tr>
                            <th class="px-4 py-3 text-muted small text-uppercase font-weight-bold">عنوان الدرس</th>
                            <th class="py-3 text-muted small text-uppercase font-weight-bold">الدورة التدريبية(عربي)</th>
                            <th class="py-3 text-muted small text-uppercase font-weight-bold">الدورة التدريبية(انجليزي)</th>
                            <th class="py-3 text-center text-muted small text-uppercase font-weight-bold">الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lessons as $lesson)
                            <tr>
                                <td class="px-4 align-middle">
                                    <div class="d-flex align-items-center">
                                        <div class="icon-shape mr-3">
                                            <i class="fas fa-book-open text-primary small"></i>
                                        </div>
                                        <span class="font-weight-bold text-dark">{{ $lesson->title_ar }}</span>
                                    </div>
                                </td>
                                <td class="px-4 align-middle">
                                    <div class="d-flex align-items-center">
                                        <div class="icon-shape mr-3">
                                            <i class="fas fa-book-open text-primary small"></i>
                                        </div>
                                        <span class="font-weight-bold text-dark">{{ $lesson->title_en }}</span>
                                    </div>
                                </td>

                                <td class="align-middle">
                                    <span class="course-badge">
                                        <i class="fas fa-graduation-cap mr-1"></i>
                                        {{ $lesson->course->title_ar ?? 'غير مرتبط' }} ||
                                        {{ $lesson->course->title_en ?? 'Unlinked' }}
                                    </span>
                                </td>

                                <td class="text-center align-middle">
                                    <div class="btn-group-custom">
                                        <a href="{{ route('lessons.edit', $lesson->id) }}" class="action-btn edit-btn"
                                            title="تعديل">
                                            <i class="fas fa-pen"></i>
                                        </a>

                                        <form action="{{ route('lessons.destroy', $lesson->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="action-btn delete-btn"
                                                onclick="return confirm('هل أنت متأكد من حذف هذا الدرس؟')" title="حذف">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop

@section('css')
    <style>
        /* Table Styles */
        .custom-table thead {
            background-color: #f8fafc;
            border-bottom: 1px solid #e2e8f0;
        }

        .custom-table td {
            padding: 1.2rem 0.75rem;
            vertical-align: middle;
        }

        /* Course Badge */
        .course-badge {
            background-color: rgba(79, 70, 229, 0.1);
            color: #4f46e5;
            padding: 6px 12px;
            border-radius: 8px;
            font-size: 0.85rem;
            font-weight: 700;
            border: 1px solid rgba(79, 70, 229, 0.2);
        }

        /* Icon Shape */
        .icon-shape {
            width: 35px;
            height: 35px;
            background: #f1f5f9;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Action Buttons */
        .btn-group-custom {
            display: flex;
            justify-content: center;
            gap: 8px;
        }

        .action-btn {
            width: 35px;
            height: 35px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: 0.3s;
            border: 1px solid #e2e8f0;
            background: #fff;
        }

        .edit-btn {
            color: #4f46e5;
        }

        .edit-btn:hover {
            background: #4f46e5;
            color: #fff;
            border-color: #4f46e5;
        }

        .delete-btn {
            color: #ef4444;
        }

        .delete-btn:hover {
            background: #ef4444;
            color: #fff;
            border-color: #ef4444;
        }

        /* General Font */
        body {
            font-family: 'Cairo', sans-serif;
            background-color: #f1f5f9 !important;
        }
    </style>
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
