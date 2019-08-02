<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">
    <title>سجل دخولك للاستمرار</title>
    <link href="{{ asset('admin/css/font-face.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/vendor/font-awesome-5/css/fontawesome-all.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet"
          media="all">
    <link href="{{ asset('admin/vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/vendor/animsition/animsition.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet"
          media="all">
    <link href="{{ asset('admin/vendor/wow/animate.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/vendor/css-hamburgers/hamburgers.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/vendor/slick/slick.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/vendor/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/css/theme.css') }}" rel="stylesheet" media="all">
</head>

<body class="animsition">
<div class="page-wrapper">
    <div class="page-content--bge5">
        <div class="container">
            <div class="login-wrap" style="max-width: 800px">
                <div class="login-content">
                    <div class="login-logo">
                        <a href="#">
                            <img src="{{ asset('admin/images/icon/logo.png')}}" alt="CoolAdmin">
                        </a>
                    </div>
                    <div class="login-form">
                        @if(session()->has('un_auth'))
                            <div class="card">
                                <div class="card-header">
                                    <strong class="card-title">خطأ</strong>
                                </div>
                                <div class="card-body">
                                    <div
                                        class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                                        <span class="badge badge-pill badge-danger">خطأ . العملية لم تكتمل </span>
                                        {{ session()->get('un_auth') }}
                                        <button type="button" class="close" data-dismiss="alert"
                                                aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <br>
                        @endif
                        @if ($errors->any())
                            <div class="card">
                                <div class="card-header">
                                    <strong class="card-title">حطأ</strong>
                                </div>
                                <div class="card-body">
                                    <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                                        <span class="badge badge-pill badge-danger">خطأ . العملية لم تكتمل </span>
                                        @foreach ($errors->all() as $error)

                                            {{ $error }}

                                        @endforeach
                                        <button type="button" class="close" data-dismiss="alert"
                                                aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <form action="{{ route('auth.login') }}" class="login-form" method="post">
                            @csrf
                            <div class="form-group">
                                <label>البريد الالكتروني</label>
                                <input
                                    class="au-input au-input--full {{ session()->has('un_auth') ?  "border-danger" : ''   }}"
                                    type="email" name="email" value="{{ old('email') }}" placeholder="البريد الالكتروني">
                            </div>
                            <div class="form-group">
                                <label>الرقم السري</label>
                                <input
                                    class="au-input au-input--full {{ session()->has('un_auth') ?  "border-danger" : ''   }}"
                                    type="password" name="password" placeholder="الرقم السري">
                            </div>
                            <div class="login-checkbox">
                                <label>
                                    <input type="checkbox" name="remember">تذكرني لاحقا
                                </label>
                                <label>
                                    <a href="#">استعادة رقم المرور</a>
                                </label>
                            </div>
                            <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">تسجيل الدخول</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script src="{{ asset('admin/vendor/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('admin/vendor/bootstrap-4.1/popper.min.js') }}"></script>
<script src="{{ asset('admin/vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>
<script src="{{ asset('admin/vendor/slick/slick.min.js') }}"></script>
<script src="{{ asset('admin/vendor/wow/wow.min.js') }}"></script>
<script src="{{ asset('admin/vendor/animsition/animsition.min.js') }}"></script>
<script src="{{ asset('admin/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
<script src="{{ asset('admin/vendor/counter-up/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('admin/vendor/counter-up/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('admin/vendor/circle-progress/circle-progress.min.js') }}"></script>
<script src="{{ asset('admin/vendor/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('admin/vendor/chartjs/Chart.bundle.min.js') }}"></script>
<script src="{{ asset('admin/vendor/select2/select2.min.js') }}"></script>
<script src="{{ asset('admin/js/main.js') }}"></script>
</body>
</html>
