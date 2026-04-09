@extends('adminlte::page')
@section('title', 'تعديل عنوان الدرس')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card shadow-lg border-0" style="border-radius: 20px;">
                    <div class="card-body p-4">
                        <h5 class="font-weight-bold mb-4 text-center">تعديل الدرس</h5>
                        <form action="{{ route('lessons.update', $lesson->id) }}" method="POST">
                            @csrf @method('PUT')
                            <div class="form-group mb-4">
                                <label class="text-muted small font-weight-bold">الدورة</label>
                                <select name="course_id" class="form-control"
                                    style="border-radius: 10px; background: #f8fafc;">
                                    @foreach ($courses as $course)
                                        <option value="{{ $course->id }}"
                                            {{ $lesson->course_id == $course->id ? 'selected' : '' }}>
                                            {{ $course->title_ar }}||{{ $course->title_en }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-4">
                                <label class="text-muted small font-weight-bold">العنوان الجديد(عربي)</label>
                                <input type="text" name="title_ar" class="form-control" value="{{ $lesson->title_ar }}"
                                    style="border-radius: 10px; background: #f8fafc;" required>
                            </div>
                            <div class="form-group mb-4">
                                <label class="text-muted small font-weight-bold">العنوان الجديد(انجليزي)</label>
                                <input type="text" name="title_en" class="form-control" value="{{ $lesson->title_en }}"
                                    style="border-radius: 10px; background: #f8fafc;" required>
                            </div>
                            <button type="submit" class="btn btn-success btn-block py-2 font-weight-bold"
                                style="border-radius: 12px;">تحديث</button>
                        </form>
                    </div>
                </div>
            </div>
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
