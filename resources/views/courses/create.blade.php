@extends('adminlte::page')
@section('title', 'إضافة دورة')

@section('content')
    <div class="container-fluid pt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="custom-card">
                    <div class="custom-card-header">
                        <h3 class="m-0">إنشاء دورة جديدة</h3>
                        <p class="text-muted small">سجل عنوان الدورة التدريبية في النظام</p>
                    </div>

                    <form action="{{ route('courses.store') }}" method="POST">
                        @csrf
                        <div class="custom-card-body">
                            {{-- عربي --}}
                            <div class="form-group mb-4">
                                <label class="form-label">عنوان الدورة (عربي)</label>
                                <input type="text" name="title_ar" class="form-control custom-input"
                                    placeholder="مثلاً: برمجة Laravel" required>
                            </div>

                            {{-- إنجليزي --}}
                            <div class="form-group mb-4">
                                <label class="form-label">Course Title (English)</label>
                                <input type="text" name="title_en" class="form-control custom-input"
                                    placeholder="Example: Laravel Backend Architecture" required>
                            </div>
                        </div>

                        <div class="custom-card-footer">
                            <button type="submit" class="btn-primary-black">حفظ التغييرات</button>
                            <a href="{{ route('courses.index') }}" class="btn-link-muted">إلغاء الأمر</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <style>
        /* تحويل AdminLTE لنمط Minimalist */
        .content-wrapper {
            background-color: #ffffff !important;
        }

        /* خلفية بيضاء نقية */

        .custom-card {
            background: #fff;
            border: 1px solid #e1e4e8;
            /* حدود خفيفة تشبه GitHub */
            border-radius: 6px;
            box-shadow: none !important;
        }

        .custom-card-header {
            padding: 20px 24px;
            border-bottom: 1px solid #e1e4e8;
            background-color: #f6f8fa;
            /* تباين خفيف للرأس */
            border-radius: 6px 6px 0 0;
        }

        .custom-card-header h3 {
            font-size: 18px;
            font-weight: 600;
            color: #24292e;
        }

        .custom-card-body {
            padding: 24px;
        }

        .form-label {
            font-weight: 600;
            margin-bottom: 8px;
            display: block;
            color: #24292e;
        }

        /* حقل إدخال بستايل عالي التباين */
        .custom-input {
            border: 1px solid #d1d5da;
            border-radius: 6px;
            padding: 10px 12px;
            box-shadow: inset 0 1px 0 rgba(225, 228, 232, 0.2);
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .custom-input:focus {
            border-color: #0366d6;
            outline: none;
            box-shadow: 0 0 0 3px rgba(3, 102, 214, 0.3);
        }

        .custom-card-footer {
            padding: 16px 24px;
            background-color: #fff;
            border-top: 1px solid #e1e4e8;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        /* أزرار بستايل برمجيات GitHub/Vercel */
        .btn-primary-black {
            background-color: #24292e;
            color: #ffffff;
            border: 1px solid rgba(27, 31, 35, 0.15);
            border-radius: 6px;
            padding: 6px 16px;
            font-weight: 500;
            cursor: pointer;
        }

        .btn-primary-black:hover {
            background-color: #2c3238;
            text-decoration: none;
        }

        .btn-link-muted {
            color: #586069;
            font-size: 14px;
            text-decoration: none;
        }

        .btn-link-muted:hover {
            color: #0366d6;
            text-decoration: none;
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
