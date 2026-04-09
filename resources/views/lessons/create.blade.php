@extends('adminlte::page')
@section('title', 'إضافة درس جديد')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-8"> {{-- صغرنا العرض شوية عشان التركيز --}}

                <div class="mb-5 text-center">
                    <div class="icon-badge mb-3">
                        <i class="fas fa-feather-alt"></i>
                    </div>
                    <h3 class="font-weight-extrabold text-dark mb-2">إضافة <span class="text-indigo">عنوان درس</span></h3>
                    <p class="text-muted small px-4">أدخل عنواناً مختصراً وواضحاً واربطه بالدورة التدريبية المناسبة.</p>
                </div>

                <div class="modern-card shadow-2xl">
                    <form action="{{ route('lessons.store') }}" method="POST">
                        @csrf

                        <div class="card-body p-4 p-md-5">

                            <div class="form-group mb-4">
                                <label class="modern-label">الدورة المستهدفة</label>
                                <div class="input-wrapper">
                                    <span class="wrapper-icon"><i class="fas fa-graduation-cap"></i></span>
                                    <div class="select2-container-modern">
                                        <select name="course_id" class="form-control select2-courses" required>
                                            <option value="" disabled selected></option>
                                            @foreach ($courses as $course)
                                                <option value="{{ $course->id }}"
                                                    {{ request('course_id') == $course->id ? 'selected' : '' }}>
                                                    {{ $course->title_ar }}||{{ $course->title_en }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-0">
                                <label class="modern-label">عنوان الدرس(عربي)</label>
                                <div class="input-wrapper">
                                    <span class="wrapper-icon"><i class="fas fa-tag"></i></span>
                                    <input type="text" name="title_ar" class="modern-input" required autofocus>
                                </div>
                            </div>
                            <div class="form-group mb-0">
                                <label class="modern-label">عنوان الدرس(انجليزي)</label>
                                <div class="input-wrapper">
                                    <span class="wrapper-icon"><i class="fas fa-tag"></i></span>
                                    <input type="text" name="title_en" class="modern-input" required autofocus>
                                </div>
                            </div>

                        </div>

                        <div class="card-footer-modern">
                            <a href="{{ route('lessons.index') }}" class="btn-cancel">إلغاء</a>
                            <button type="submit" class="btn-save shadow-indigo">
                                <span>حفظ الدرس</span>
                                <i class="fas fa-arrow-left ml-2 mr-0"></i> {{-- أيقونة تدل على المتابعة --}}
                            </button>
                        </div>
                    </form>
                </div>

                <p class="text-center mt-4 text-muted small">
                    <i class="fas fa-magic mr-1"></i> سيتم ترتيب الدرس تلقائياً في نهاية الدورة.
                </p>

            </div>
        </div>
    </div>
@stop

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        :root {
            --indigo-600: #4f46e5;
            --indigo-700: #4338ca;
            --slate-50: #f8fafc;
            --slate-200: #e2e8f0;
            --slate-400: #94a3b8;
            --slate-700: #334155;
        }

        /* General UI Improvements */
        body {
            background-color: #f1f5f9 !important;
            font-family: 'Inter', 'Cairo', sans-serif;
        }

        .text-indigo {
            color: var(--indigo-600);
        }

        .font-weight-extrabold {
            font-weight: 800;
        }

        /* Icon Badge Header */
        .icon-badge {
            width: 60px;
            height: 60px;
            background: #fff;
            border-radius: 18px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: var(--indigo-600);
            font-size: 1.5rem;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
        }

        /* Modern Card */
        .modern-card {
            background: #fff;
            border-radius: 28px;
            border: none;
            overflow: hidden;
        }

        .shadow-2xl {
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.08);
        }

        /* Labels & Inputs */
        .modern-label {
            font-weight: 700;
            color: var(--slate-700);
            font-size: 0.85rem;
            margin-bottom: 10px;
            display: block;
            padding-right: 5px;
        }

        .input-wrapper {
            display: flex;
            align-items: center;
            background: var(--slate-50);
            border: 2px solid var(--slate-200);
            border-radius: 16px;
            transition: 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            padding: 2px;
        }

        .input-wrapper:focus-within {
            border-color: var(--indigo-600);
            background: #fff;
            box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.08);
        }

        .wrapper-icon {
            padding: 12px 18px;
            color: var(--slate-400);
            font-size: 1.1rem;
        }

        .modern-input {
            border: none;
            background: transparent;
            flex-grow: 1;
            padding: 12px 10px 12px 0;
            font-weight: 500;
            outline: none;
            color: var(--slate-700);
        }

        /* Select2 Customization - The Overhaul */
        .select2-container-modern {
            flex-grow: 1;
            position: relative;
        }

        .select2-container--default .select2-selection--single {
            border: none !important;
            background: transparent !important;
            height: 48px !important;
            display: flex;
            align-items: center;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            padding-right: 0 !important;
            font-weight: 500;
            color: var(--slate-700) !important;
        }

        .select2-container--default .select2-selection--single .select2-selection__placeholder {
            color: var(--slate-400) !important;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 48px !important;
            left: 12px !important;
            right: auto !important;
        }

        /* Dropdown Styling */
        .select2-dropdown {
            border: 2px solid var(--indigo-600) !important;
            border-radius: 16px !important;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1) !important;
            overflow: hidden;
            margin-top: 5px;
        }

        .select2-results__option--highlighted[aria-selected] {
            background-color: var(--indigo-600) !important;
        }

        /* Footer & Buttons */
        .card-footer-modern {
            background: var(--slate-50);
            padding: 25px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-top: 1px solid var(--slate-200);
        }

        .btn-save {
            background: var(--indigo-600);
            color: #fff;
            border: none;
            padding: 12px 35px;
            border-radius: 14px;
            font-weight: 700;
            transition: 0.3s;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .btn-save:hover {
            background: var(--indigo-700);
            transform: translateY(-2px);
        }

        .shadow-indigo {
            box-shadow: 0 10px 20px rgba(79, 70, 229, 0.25);
        }

        .btn-cancel {
            color: var(--slate-400);
            font-weight: 700;
            text-decoration: none;
            transition: 0.2s;
        }

        .btn-cancel:hover {
            color: var(--slate-700);
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

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2-courses').select2({
                placeholder: "اختر الدورة المرتبطة بالدرس...",
                allowClear: true,
                dir: "rtl"
            });
        });
    </script>
@stop
