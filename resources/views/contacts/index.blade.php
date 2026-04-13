@extends('adminlte::page')

@section('title', 'بيانات الاتصال')

@section('content_header')
    <h1>إدارة بيانات الاتصال</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">تعديل معلومات الاتصال</h3>
                    </div>

                    <form action="{{ route('contacts.update') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="phone_1">رقم الهاتف 1</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                            </div>
                                            <input type="text" name="phone_1" class="form-control"
                                                value="{{ $contact->phone_1 }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="phone_2">رقم الهاتف 2</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                            </div>
                                            <input type="text" name="phone_2" class="form-control"
                                                value="{{ $contact->phone_2 }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="phone_3">رقم الهاتف 3</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                            </div>
                                            <input type="text" name="phone_3" class="form-control"
                                                value="{{ $contact->phone_3 }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="email">البريد الإلكتروني</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                            </div>
                                            <input type="email" name="email" class="form-control"
                                                value="{{ $contact->email }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">حفظ التغييرات</button>
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
