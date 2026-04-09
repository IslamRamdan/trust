@extends('adminlte::page')

@section('title', 'سجل الإنجازات التقني')

@section('content')
    <div class="container-fluid py-4">

        <div class="row mb-5">
            <div class="col-md-3">
                <div class="stat-glass-card shadow-sm">
                    <div class="stat-icon bg-indigo"><i class="fas fa-rocket"></i></div>
                    <div class="stat-content">
                        <span class="stat-title">إجمالي الانجازات</span>
                        <h3 class="stat-value">{{ $total }}</h3>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="stat-glass-card shadow-sm">
                    <div class="stat-icon bg-success"><i class="fas fa-check-double"></i></div>
                    <div class="stat-content">
                        <span class="stat-title">هذا الشهر</span>
                        <h3 class="stat-value">{{ $thisMonth }}</h3>
                    </div>
                </div>
            </div>

            <div class="col-md-6 d-flex align-items-center justify-content-end">
                <a href="{{ route('achievements.create') }}" class="btn-modern-primary">
                    <i class="fas fa-plus-circle mr-2"></i> إضافة إنجاز جديد
                </a>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-custom shadow-sm mb-4">
                <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
            </div>
        @endif

        <div class="row">
            @foreach ($achievements as $item)
                @php
                    $title = app()->getLocale() == 'ar' ? $item->title_ar : $item->title_en;
                    $desc = app()->getLocale() == 'ar' ? $item->description_ar : $item->description_en;
                @endphp

                <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                    <div class="modern-card shadow-sm h-100">

                        {{-- الصور --}}
                        <div class="card-image-box">
                            @if ($item->images && count($item->images))
                                <div id="carousel{{ $item->id }}" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        @foreach ($item->images as $key => $img)
                                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                                <img src="{{ asset('storage/' . $img) }}" class="d-block w-100">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @else
                                <div class="no-image-placeholder">
                                    <i class="fas fa-terminal"></i>
                                </div>
                            @endif

                            <span class="card-date">
                                {{ $item->created_at->format('d M') }}
                            </span>
                        </div>

                        {{-- المحتوى --}}
                        <div class="card-body px-3 pt-3 pb-0">
                            <h6 class="card-title-modern">{{ $title }}</h6>
                            <p class="card-text-modern">
                                {{ \Illuminate\Support\Str::limit($desc, 90) }}
                            </p>
                        </div>

                        {{-- الفوتر --}}
                        <div
                            class="card-footer-modern px-3 py-3 border-0 bg-transparent d-flex justify-content-between align-items-center">
                            <div class="action-btns">
                                <a href="{{ route('achievements.edit', $item->id) }}" class="btn-action edit"
                                    title="تعديل">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <form action="{{ route('achievements.destroy', $item->id) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn-action delete" onclick="return confirm('متأكد عايز تحذف الإنجاز؟')">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>

                            <span class="badge-tech">Task Done</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection

@section('css')
    <style>
        :root {
            --primary-indigo: #6366f1;
            --soft-gray: #f8fafc;
            --border-color: #eef2ff;
            --text-dark: #1e293b;
            --text-muted: #64748b;
        }

        .content-wrapper {
            background-color: var(--soft-gray) !important;
            font-family: 'Inter', 'Cairo', sans-serif;
        }

        /* Stats */
        .stat-glass-card {
            background: #fff;
            border-radius: 16px;
            padding: 15px 20px;
            display: flex;
            align-items: center;
            gap: 15px;
            border: 1px solid var(--border-color);
        }

        .stat-icon {
            width: 45px;
            height: 45px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
        }

        .bg-indigo {
            background: var(--primary-indigo);
        }

        .bg-success {
            background: #10b981;
        }

        .stat-title {
            font-size: 0.75rem;
            font-weight: 700;
            color: var(--text-muted);
        }

        .stat-value {
            font-weight: 800;
            color: var(--text-dark);
        }

        /* Button */
        .btn-modern-primary {
            background: var(--primary-indigo);
            color: #fff !important;
            padding: 12px 28px;
            border-radius: 12px;
            font-weight: 700;
            border: none;
        }

        /* Card */
        .modern-card {
            background: #fff;
            border-radius: 20px;
            border: 1px solid var(--border-color);
            overflow: hidden;
            transition: 0.3s;
        }

        .modern-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.06);
        }

        .card-image-box {
            height: 160px;
            overflow: hidden;
            position: relative;
        }

        .card-image-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .no-image-placeholder {
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #cbd5e1;
            font-size: 2rem;
        }

        .card-date {
            position: absolute;
            top: 10px;
            left: 10px;
            background: #fff;
            padding: 3px 10px;
            border-radius: 8px;
            font-size: 0.7rem;
        }

        .card-title-modern {
            font-weight: 800;
            font-size: 1rem;
            color: var(--text-dark);
        }

        .card-text-modern {
            font-size: 0.85rem;
            color: var(--text-muted);
        }

        /* Buttons */
        .btn-action {
            width: 34px;
            height: 34px;
            border-radius: 10px;
            background: #f1f5f9;
            border: none;
        }

        .btn-action.edit:hover {
            color: #3b82f6;
        }

        .btn-action.delete:hover {
            color: #ef4444;
        }

        .badge-tech {
            font-size: 0.7rem;
            color: #64748b;
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
@endsection
