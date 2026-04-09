@extends('adminlte::page')
@section('title', 'إضافة إنجاز جديد')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="form-header mb-4">
                    <h1 class="display-5 font-weight-bold">توثيق <span class="text-indigo">مهمة جديدة</span></h1>
                    <p class="text-muted">أضف تفاصيل إنجازك الأخير وارفقه بالصور لتوثيق الأرشيف التقني.</p>
                </div>

                <div class="modern-form-card shadow-lg">
                    <form action="{{ route('achievements.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="p-4 p-md-5">
                            <div class="form-group mb-4">
                                <label class="modern-label">عنوان الإنجاز (عربي)</label>
                                <div class="input-group-modern">
                                    <span class="input-icon"><i class="fas fa-tag"></i></span>
                                    <input type="text" name="title_ar" class="form-input-modern" required>
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <label class="modern-label">Title (English)</label>
                                <div class="input-group-modern">
                                    <span class="input-icon"><i class="fas fa-tag"></i></span>
                                    <input type="text" name="title_en" class="form-input-modern" required>
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <label class="modern-label">الوصف (عربي)</label>
                                <div class="input-group-modern">
                                    <span class="input-icon mt-3"><i class="fas fa-align-left"></i></span>
                                    <textarea name="description_ar" class="form-input-modern" rows="4" required></textarea>
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <label class="modern-label">Description (English)</label>
                                <div class="input-group-modern">
                                    <span class="input-icon mt-3"><i class="fas fa-align-left"></i></span>
                                    <textarea name="description_en" class="form-input-modern" rows="4" required></textarea>
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <label class="modern-label">الصور التوضيحية</label>
                                <div class="upload-container-modern" id="drop-area">
                                    <input type="file" name="images[]" id="fileElem" multiple accept="image/*"
                                        class="d-none" required>
                                    <label for="fileElem" class="upload-placeholder">
                                        <div class="icon-circle mb-3"><i class="fas fa-cloud-upload-alt"></i></div>
                                        <span class="d-block font-weight-bold">اسحب الصور هنا أو اضغط للاختيار</span>
                                        <small class="text-muted">يمكنك اختيار حتى 3 صور (PNG, JPG)</small>
                                    </label>
                                    <div id="gallery" class="mt-3 d-flex flex-wrap gap-2"></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-footer-modern bg-light d-flex justify-content-between align-items-center p-4">
                            <a href="{{ route('achievements.index') }}" class="btn-cancel">إلغاء وتراجع</a>
                            <button type="submit" class="btn-submit-modern">
                                <span>حفظ ونشر الإنجاز</span>
                                <i class="fas fa-check-circle ml-2"></i>
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
        /* الإعدادات العامة */
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

        /* Modern Card */
        .modern-form-card {
            background: #fff;
            border-radius: 24px;
            border: none;
            overflow: hidden;
        }

        /* Labels & Inputs */
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
            box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.1);
        }

        .input-icon {
            padding: 12px 20px;
            color: #94a3b8;
            font-size: 1.1rem;
        }

        .form-input-modern {
            border: none;
            background: transparent;
            width: 100%;
            padding: 12px 15px 12px 0;
            font-weight: 500;
            color: #334155;
        }

        .form-input-modern:focus {
            outline: none;
        }

        /* Upload Zone */
        .upload-container-modern {
            border: 2px dashed var(--border-color);
            border-radius: 20px;
            padding: 40px;
            text-align: center;
            background: var(--soft-gray);
            transition: 0.3s;
            cursor: pointer;
        }

        .upload-container-modern:hover {
            border-color: var(--indigo-primary);
            background: #fdfdfd;
        }

        .icon-circle {
            width: 60px;
            height: 60px;
            background: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
            font-size: 1.5rem;
            color: var(--indigo-primary);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        }

        /* Buttons */
        .btn-submit-modern {
            background: var(--indigo-primary);
            color: #fff;
            border: none;
            padding: 14px 35px;
            border-radius: 12px;
            font-weight: 800;
            box-shadow: 0 10px 20px rgba(99, 102, 241, 0.3);
            transition: 0.3s;
        }

        .btn-submit-modern:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 25px rgba(99, 102, 241, 0.4);
        }

        .btn-cancel {
            color: #64748b;
            font-weight: 700;
            text-decoration: none;
            transition: 0.2s;
        }

        .btn-cancel:hover {
            color: #1e293b;
        }

        /* Image Preview */
        .preview-img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 10px;
            border: 2px solid #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
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
        // كود بسيط لعرض الصور فور اختيارها
        let fileElem = document.getElementById("fileElem");
        let gallery = document.getElementById("gallery");

        fileElem.addEventListener("change", function(e) {
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
