@extends('adminlte::page')
@section('title', 'تعديل الدورة')

@section('content')
    <div class="container-fluid pt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="edit-card">
                    <div class="edit-card-header">
                        <h3 class="m-0">تحديث بيانات الدورة</h3>
                        <code class="text-dark small">ID: #{{ $course->id }}</code>
                    </div>

                    <form action="{{ route('courses.update', $course->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="edit-card-body">

                            {{-- عربي --}}
                            <div class="form-group mb-4">
                                <label class="edit-label">عنوان الدورة (عربي)</label>
                                <input type="text" name="title_ar" class="form-control edit-input"
                                    value="{{ $course->title_ar }}" required>
                            </div>

                            {{-- إنجليزي --}}
                            <div class="form-group mb-4">
                                <label class="edit-label">Course Title (English)</label>
                                <input type="text" name="title_en" class="form-control edit-input"
                                    value="{{ $course->title_en }}" required>
                            </div>

                        </div>

                        <div class="edit-card-footer">
                            <button type="submit" class="btn-update">تحديث الآن</button>
                            <a href="{{ route('courses.index') }}" class="btn-cancel">إلغاء والعودة</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <style>
        /* تصفير خلفية AdminLTE لتصبح بيضاء صريحة */
        .content-wrapper {
            background-color: #fff !important;
        }

        .edit-card {
            background: #ffffff;
            border: 2px solid #000000;
            /* حدود سوداء قوية للتباين */
            border-radius: 0px;
            /* حواف حادة تعطي انطباع هندسي تقني */
            box-shadow: 8px 8px 0px #eeeeee;
            /* ظل مسطح هندسي */
        }

        .edit-card-header {
            padding: 20px;
            border-bottom: 2px solid #000000;
            background-color: #000000;
            color: #ffffff;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .edit-card-header h3 {
            font-size: 1.1rem;
            font-weight: 700;
        }

        .edit-card-body {
            padding: 30px 20px;
        }

        .edit-label {
            font-weight: 700;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 1px;
            margin-bottom: 10px;
            display: block;
        }

        .edit-input {
            border: 2px solid #000;
            border-radius: 0px;
            padding: 12px;
            font-weight: 500;
        }

        .edit-input:focus {
            border-color: #000;
            box-shadow: none;
            background-color: #f8f9fa;
        }

        .edit-card-footer {
            padding: 20px;
            border-top: 1px solid #eee;
            display: flex;
            gap: 15px;
        }

        /* أزرار أكشن حادة */
        .btn-update {
            background: #000;
            color: #fff;
            border: none;
            padding: 10px 25px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.2s;
        }

        .btn-update:hover {
            background: #333;
            transform: translateY(-2px);
        }

        .btn-cancel {
            color: #666;
            text-decoration: none;
            align-self: center;
            font-size: 0.9rem;
        }

        .btn-cancel:hover {
            color: #000;
            text-decoration: underline;
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
