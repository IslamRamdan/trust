@extends('adminlte::page')
@section('title', 'تعديل الإنجاز')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="form-header mb-4">
                    <h1 class="display-5 font-weight-bold">تعديل <span class="text-indigo">البيانات</span></h1>
                    <p class="text-muted">قم بتحديث تفاصيل الإنجاز أو إضافة صور جديدة للأرشيف.</p>
                </div>

                <div class="modern-form-card shadow-lg">
                    <form action="{{ route('achievements.update', $achievement->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT') {{-- مهم جداً في عملية التحديث --}}

                        <div class="p-4 p-md-5">
                            <div class="form-group mb-4">
                                <label class="modern-label">عنوان الإنجاز (عربي)</label>
                                <div class="input-group-modern">
                                    <span class="input-icon"><i class="fas fa-edit"></i></span>
                                    <input type="text" name="title_ar" class="form-input-modern"
                                        value="{{ $achievement->title_ar }}" required>
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <label class="modern-label">Title (English)</label>
                                <div class="input-group-modern">
                                    <span class="input-icon"><i class="fas fa-edit"></i></span>
                                    <input type="text" name="title_en" class="form-input-modern"
                                        value="{{ $achievement->title_en }}" required>
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <label class="modern-label">الوصف (عربي)</label>
                                <div class="input-group-modern align-items-start">
                                    <span class="input-icon mt-3"><i class="fas fa-align-left"></i></span>
                                    <textarea name="description_ar" class="form-input-modern" rows="5" required>{{ $achievement->description_ar }}</textarea>
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <label class="modern-label">Description (English)</label>
                                <div class="input-group-modern align-items-start">
                                    <span class="input-icon mt-3"><i class="fas fa-align-left"></i></span>
                                    <textarea name="description_en" class="form-input-modern" rows="5" required>{{ $achievement->description_en }}</textarea>
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <label class="modern-label">الصور الحالية في السجل</label>
                                <div class="d-flex flex-wrap gap-3 p-3 bg-light rounded-20">
                                    @if ($achievement->images)
                                        @foreach ($achievement->images as $img)
                                            <div class="current-img-wrapper">
                                                <img src="{{ asset('storage/' . $img) }}"
                                                    class="preview-img-edit shadow-sm">
                                            </div>
                                        @endforeach
                                    @else
                                        <span class="text-muted small">لا توجد صور حالية</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <label class="modern-label">رفع صور جديدة (سيتم استبدال القديمة)</label>
                                <div class="upload-container-modern" id="drop-area">
                                    <input type="file" name="images[]" id="fileElem" multiple accept="image/*"
                                        class="d-none">
                                    <label for="fileElem" class="upload-placeholder">
                                        <div class="icon-circle mb-3"><i class="fas fa-images"></i></div>
                                        <span class="d-block font-weight-bold">اختر صوراً جديدة لتحديث المعرض</span>
                                    </label>
                                    <div id="gallery" class="mt-3 d-flex flex-wrap gap-2 justify-content-center"></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-footer-modern bg-light d-flex justify-content-between align-items-center p-4">
                            <a href="{{ route('achievements.index') }}" class="btn-cancel">تراجع</a>
                            <button type="submit" class="btn-update-modern">
                                <span>حفظ التعديلات</span>
                                <i class="fas fa-save ml-2"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <style>
        :root {
            --indigo-primary: #6366f1;
            --soft-gray: #f8fafc;
            --border-color: #e2e8f0;
        }

        body,
        .content-wrapper {
            background-color: #f1f5f9 !important;
            font-family: 'Cairo', sans-serif;
        }

        .text-indigo {
            color: var(--indigo-primary);
        }

        /* Card & Inputs */
        .modern-form-card {
            background: #fff;
            border-radius: 24px;
            border: none;
            overflow: hidden;
        }

        .modern-label {
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 10px;
            font-size: 0.95rem;
        }

        .input-group-modern {
            display: flex;
            background: var(--soft-gray);
            border: 2px solid var(--border-color);
            border-radius: 14px;
            transition: 0.3s;
        }

        .input-group-modern:focus-within {
            border-color: var(--indigo-primary);
            background: #fff;
        }

        .input-icon {
            padding: 12px 20px;
            color: #94a3b8;
        }

        .form-input-modern {
            border: none;
            background: transparent;
            width: 100%;
            padding: 12px 15px 12px 0;
            font-weight: 500;
        }

        .form-input-modern:focus {
            outline: none;
        }

        /* Images Styles */
        .preview-img-edit {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 12px;
            border: 3px solid #fff;
        }

        .rounded-20 {
            border-radius: 20px;
        }

        /* Upload Zone */
        .upload-container-modern {
            border: 2px dashed var(--border-color);
            border-radius: 20px;
            padding: 30px;
            text-align: center;
            background: var(--soft-gray);
            cursor: pointer;
        }

        .icon-circle {
            width: 50px;
            height: 50px;
            background: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
            color: var(--indigo-primary);
        }

        /* Buttons */
        .btn-update-modern {
            background: var(--indigo-primary);
            color: #fff;
            border: none;
            padding: 14px 40px;
            border-radius: 12px;
            font-weight: 800;
            box-shadow: 0 10px 20px rgba(99, 102, 241, 0.2);
            transition: 0.3s;
        }

        .btn-update-modern:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 25px rgba(99, 102, 241, 0.3);
        }

        .btn-cancel {
            color: #64748b;
            font-weight: 700;
            text-decoration: none;
        }

        .preview-img {
            width: 70px;
            height: 70px;
            object-fit: cover;
            border-radius: 10px;
            border: 2px solid var(--indigo-primary);
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
    <script>
        // معاينة الصور الجديدة المرفوعة
        document.getElementById("fileElem").addEventListener("change", function(e) {
            let gallery = document.getElementById("gallery");
            gallery.innerHTML = "";
            let files = e.target.files;
            for (let i = 0; i < files.length; i++) {
                let reader = new FileReader();
                reader.onload = function(event) {
                    let img = document.createElement("img");
                    img.src = event.target.result;
                    img.classList.add("preview-img");
                    gallery.appendChild(img);
                }
                reader.readAsDataURL(files[i]);
            }
        });
    </script>
@stop
