@extends('adminlte::page')
@section('title', 'قائمة الدورات')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="font-weight-bold" style="letter-spacing: -1px;">الدورات المسجلة</h1>
            <p class="text-muted small">إجمالي الدورات المتاحة في النظام حالياً: {{ $courses->count() }}</p>
        </div>
        <a href="{{ route('courses.create') }}" class="btn-create-new">
            إضافة دورة جديدة <i class="fas fa-plus ml-2"></i>
        </a>
    </div>
@stop

@section('content')
    <div class="custom-table-card">
        <div class="table-responsive">
            <table class="table custom-table text-right">
                <thead>
                    <tr>
                        <th class="id-col">#</th>
                        <th>اسم الدورة التدريبية (عربي)</th>
                        <th>اسم الدورة التدريبية(انجليزي)</th>
                        <th class="actions-col text-center">التحكم</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($courses as $course)
                        <tr>
                            <td class="id-cell">{{ $course->id }}</td>
                            <td class="title-cell">{{ $course->title_ar }}</td>
                            <td class="title-cell">{{ $course->title_en }}</td>
                            <td class="text-center">
                                <div class="action-wrapper">
                                    <a href="{{ route('courses.edit', $course->id) }}" class="action-link edit-link">
                                        <i class="fas fa-pencil-alt"></i> تعديل
                                    </a>

                                    <form action="{{ route('courses.destroy', $course->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="action-link delete-link"
                                            onclick="return confirm('هل أنت متأكد من الحذف؟')">
                                            <i class="fas fa-trash"></i> حذف
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
@stop

@section('css')
    <style>
        /* تهيئة الخلفية العامة */
        .content-wrapper {
            background-color: #ffffff !important;
        }

        /* ستايل الكارد الأساسي */
        .custom-table-card {
            border: 1px solid #e1e4e8;
            border-radius: 8px;
            overflow: hidden;
        }

        /* ستايل الجدول */
        .custom-table {
            margin-bottom: 0;
            border-collapse: separate;
            border-spacing: 0;
        }

        .custom-table thead th {
            background-color: #f6f8fa;
            color: #24292e;
            font-weight: 600;
            border-bottom: 1px solid #e1e4e8;
            padding: 15px;
        }

        .custom-table tbody td {
            padding: 16px;
            vertical-align: middle;
            border-bottom: 1px solid #f1f1f1;
            color: #24292e;
        }

        .id-cell {
            color: #6a737d;
            font-family: monospace;
            font-size: 0.9rem;
        }

        .title-cell {
            font-weight: 500;
            font-size: 1rem;
        }

        /* الأكشن (الإجراءات) */
        .action-wrapper {
            display: flex;
            justify-content: center;
            gap: 12px;
        }

        .action-link {
            font-size: 0.85rem;
            font-weight: 500;
            padding: 6px 12px;
            border-radius: 4px;
            transition: 0.2s;
            text-decoration: none !important;
            border: 1px solid transparent;
        }

        .edit-link {
            color: #0366d6;
            background: #f1f8ff;
            border-color: rgba(3, 102, 214, 0.1);
        }

        .edit-link:hover {
            background: #0366d6;
            color: #fff;
        }

        .delete-link {
            color: #cb2431;
            background: #fff5f5;
            border-color: rgba(203, 36, 49, 0.1);
            cursor: pointer;
        }

        .delete-link:hover {
            background: #cb2431;
            color: #fff;
        }

        /* زر الإضافة العلوي */
        .btn-create-new {
            background-color: #24292e;
            color: #fff;
            padding: 10px 20px;
            border-radius: 6px;
            font-weight: 600;
            border: 1px solid rgba(27, 31, 35, 0.15);
            transition: 0.3s;
            text-decoration: none !important;
        }

        .btn-create-new:hover {
            background-color: #1b1f23;
            color: #fff;
            transform: translateY(-1px);
        }

        /* تحسينات الـ RTL */
        .text-right {
            text-align: right !important;
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
