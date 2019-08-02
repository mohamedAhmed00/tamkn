@php
    $admin = auth()->user();
@endphp
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">
    <meta name="csrf-token" content="{{ csrf_token() }}" >
    <title>لوحه التحكم</title>
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
    <link href="{{ asset('admin/css/select.css') }}" rel="stylesheet" media="all">
    <style>
        img
        {
            height: 100%;
        }
        .breadcrumb .breadcrumb-item a
        {
            color: #63c76a !important;
        }
    </style>
</head>
<body class="animsition">
<div class="page-wrapper">
    <header class="header-mobile d-block d-lg-none">
        <div class="header-mobile__bar">
            <div class="container-fluid">
                <div class="header-mobile-inner">
                    <a class="logo" href="{{ url('auth/home') }}">
                        <img src="{{ asset('admin/images/icon/logo.png') }}" alt="لوحة القيادة"/>
                    </a>
                    <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                    </button>
                </div>
            </div>
        </div>
        <nav class="navbar-mobile">
            <div class="container-fluid">
{{--                <ul class="navbar-mobile__list list-unstyled">--}}
{{--                    <li>--}}
{{--                        <a href="{{ url('auth/home') }}">--}}
{{--                            <i class="fas fa-coffee"></i>Dashboard</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="{{ url('auth/category') }}">--}}
{{--                            <i class="fas fa-chart-bar"></i>Category</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="{{ url('auth/teacher') }}">--}}
{{--                            <i class="fas fa-user"></i>Teachers</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="{{ url('auth/students') }}">--}}
{{--                            <i class="fas fa-graduation-cap"></i>Students</a>--}}
{{--                    </li>--}}

{{--                    <li>--}}
{{--                        <a href="{{ url('auth/setting') }}">--}}
{{--                            <i class="fas fa-cogs"></i>Settings</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="{{ url('auth/group') }}">--}}
{{--                            <i class="fas fa-group"></i>User Groups</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="{{ url('auth/user') }}">--}}
{{--                            <i class="fas fa-user-circle"></i>System Users</a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
            </div>
        </nav>
    </header>
    <aside class="menu-sidebar d-none d-lg-block">
        <div class="logo">
            <a href="{{ url('auth/home') }}">
                <img src="{{ asset('admin/images/icon/logo.png') }}" alt="لوحة القيادة"/>
            </a>
        </div>
        <div class="menu-sidebar__content js-scrollbar1">
            <nav class="navbar-sidebar">
                <ul class="list-unstyled navbar__list">
                    <li class="{{ ($page == "dashboard")? 'active' : '' }}">
                        <a href="{{ url('auth/home') }}">
                            <i class="fas fa-coffee"></i>لوحة القيادة</a>
                    </li>
                    <li class="{{ ($page == "language")? 'active' : '' }}">
                        <a href="{{ url('auth/language') }}"><i class="fas fa-language"></i>اللغات</a>
                    </li>
                    <li class="{{ ($page == "category")? 'active' : '' }} has-sub">
                        <a class="js-arrow" href="#">
                            <i class="fas fa-plus"></i>ادارة المثاقات</a>
                        <ul class="list-unstyled navbar__sub-list js-sub-list" style="display: none;">
                            <li class="{{ ($page == "teacher")? 'active' : '' }}">
                                <a href="{{ url('auth/teacher') }}"><i class="fas fa-graduation-cap"></i>المعلمين</a>
                            </li>
                            @can('view', \App\Modules\Category\Model\Category::class)
                                <li class="{{ ($page == "category")? 'active' : '' }}">
                                    <a href="{{ url('auth/category') }}"><i class="fas fa-chart-bar"></i>الاقسام</a>
                                </li>
                            @endcan
                            @can('view', \App\Modules\Course\Model\Course::class)
                                <li class="{{ ($page == "course")? 'active' : '' }}">
                                    <a href="{{ url('auth/course') }}"><i class="fas fa-caret-square-o-left"></i>المثاقات</a>
                                </li>
                            @endcan
                            <li class="{{ ($page == "client")? 'active' : '' }}">
                                <a href="{{ url('auth/client') }}"><i class="fas fa-user-times"></i>الطلاب</a>
                            </li>
                            @can('view', \App\Modules\Student\Model\Student::class)
                                <li class="{{ ($page == "student")? 'active' : '' }}">
                                    <a href="{{ url('auth/student') }}"><i class="fas fa-user-times"></i>الطلاب</a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                    @can('view', \App\Modules\News\Model\News::class)
                        <li class="{{ ($page == "news")? 'active' : '' }}">
                            <a href="{{ url('auth/news') }}"><i class="fas fa-newspaper"></i>الاخبار</a>
                        </li>
                    @endcan
                    @can('view', \App\Modules\Page\Model\Page::class)
                        <li class="{{ ($page == "page")? 'active' : '' }}">
                            <a href="{{ url('auth/page') }}"><i class="fas fa-book"></i>الصفحات</a>
                        </li>
                    @endcan

                    @can('view', \App\Modules\Slider\Model\Slider::class)
                        <li class="{{ ($page == "slider")? 'active' : '' }}">
                            <a href="{{ url('auth/slider') }}"><i class="fas fa-images"></i>عداد الصور</a>
                        </li>
                    @endcan

                    @can('view', \App\Modules\Setting\Model\Setting::class)
                        <li class="{{ ($page == "setting")? 'active' : '' }}">
                            <a href="{{ url('auth/setting') }}"><i class="fas fa-cogs"></i>الاعدادات</a>
                        </li>
                    @endcan

                    <li class="{{ ($page == "role")? 'active' : '' }}">
                        <a href="{{ url('auth/role') }}"><i class="fas fa-group"></i>المجموعات</a>
                    </li>

                    <li class="{{ ($page == "permission")? 'active' : '' }}">
                        <a href="{{ url('auth/permission') }}"><i class="fas fa-certificate"></i>الصلاحيات</a>
                    </li>

                    @can('view', \App\Modules\RolePermission\Model\RolePermission::class)
                        <li class="{{ ($page == "role_permission")? 'active' : '' }}">
                            <a href="{{ url('auth/role_permission') }}"><i class="fas fa-magic"></i>منح الصلاحيات</a>
                        </li>
                    @endcan
                    @can('view', \App\Modules\User\Model\User::class)
                        <li class="{{ ($page == "user")? 'active' : '' }}">
                            <a href="{{ url('auth/user') }}"><i class="fas fa-user-circle"></i>مديرين النظام</a>
                        </li>
                    @endcan

                </ul>
            </nav>
        </div>
    </aside>
    <div class="page-container">
        <header class="header-desktop">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="header-wrap float-right">
                        <div class="header-button">
                            <div class="noti-wrap">
                                @yield('cart-script')
                                <div class="noti__item js-item-menu">
                                    <i class="zmdi zmdi-comment-more"></i>
                                    <span class="quantity">1</span>
                                    <div class="mess-dropdown js-dropdown">
                                        <div class="mess__title">
                                            <p>لديك عدد 3 رسالة</p>
                                        </div>
                                        <div class="mess__item">
                                            <div class="image img-cir img-40">
                                                <img src="{{ asset('admin/images/icon/avatar-06.jpg') }}"
                                                     alt="Michelle Moreno"/>
                                            </div>
                                            <div class="content">
                                                <h6>نادر احمد</h6>
                                                <p>استفسار</p>
                                                <span class="time">منذ 3 دقيقه</span>
                                            </div>
                                        </div>
                                        <div class="mess__item">
                                            <div class="image img-cir img-40">
                                                <img src="{{ asset('admin/images/icon/avatar-04.jpg') }}"
                                                     alt="Diane Myers"/>
                                            </div>
                                            <div class="content">
                                                <h6>نادر احمد</h6>
                                                <p>استفسار</p>
                                                <span class="time">منذ 3 دقيقه</span>
                                            </div>
                                        </div>
                                        <div class="mess__footer">
                                            <a href="#">اظهار الكل</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="noti__item js-item-menu">
                                    <i class="zmdi zmdi-alert-polygon"></i>
                                    <span class="quantity">1</span>
                                    <div class="email-dropdown js-dropdown">
                                        <div class="email__title">
                                            <p>لديك 3 منتجات علي وشك الانتهاء</p>
                                        </div>
                                        <div class="email__item">
                                            <div class="image img-cir img-40">
                                                <img src="{{ asset('admin/images/icon/avatar-06.jpg') }}"
                                                     alt="Cynthia Harvey"/>
                                            </div>
                                            <div class="content">
                                                <p>المنتج الاول</p>
                                                <span>متبقي عدد ( 20 ) </span>
                                            </div>
                                        </div>
                                        <div class="email__item">
                                            <div class="image img-cir img-40">
                                                <img src="{{ asset('admin/images/icon/avatar-04.jpg') }}"
                                                     alt="Cynthia Harvey"/>
                                            </div>
                                            <div class="content">
                                                <p>المنتج الاول</p>
                                                <span>متبقي عدد ( 20 ) </span>
                                            </div>
                                        </div>
                                        <div class="email__item">
                                            <div class="image img-cir img-40">
                                                <img src="{{ asset('admin/images/icon/avatar-05.jpg') }}"
                                                     alt="Cynthia Harvey"/>
                                            </div>
                                            <div class="content">
                                                <p>المنتج الاول</p>
                                                <span>متبقي عدد ( 20 ) </span>
                                            </div>
                                        </div>
                                        <div class="email__footer">
                                            <a href="#">عرض كل المنتجات</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="noti__item js-item-menu">
                                    <i class="zmdi zmdi-notifications"></i>
                                    <span class="quantity">3</span>
                                    <div class="notifi-dropdown js-dropdown">
                                        <div class="notifi__title">
                                            <p>لديك عدد ( 4 ) عمال علي وشك انتهاء شهاداتهم</p>
                                        </div>
                                        <div class="notifi__item">
                                            <div class="bg-c1 img-cir img-40">
                                                <i class="zmdi zmdi-email-open"></i>
                                            </div>
                                            <div class="content">
                                                <p>نادر احمد </p>
                                                <p> شهاداته الصحية علي وشك الانتهاء </p>
                                            </div>
                                        </div>
                                        <div class="notifi__item">
                                            <div class="bg-c1 img-cir img-40">
                                                <i class="zmdi zmdi-email-open"></i>
                                            </div>
                                            <div class="content">
                                                <p>نادر احمد </p>
                                                <p> شهاداته الصحية علي وشك الانتهاء </p>
                                            </div>
                                        </div>
                                        <div class="notifi__item">
                                            <div class="bg-c1 img-cir img-40">
                                                <i class="zmdi zmdi-email-open"></i>
                                            </div>
                                            <div class="content">
                                                <p>نادر احمد </p>
                                                <p> شهاداته الصحية علي وشك الانتهاء </p>
                                            </div>
                                        </div>
                                        <div class="notifi__footer">
                                            <a href="#">عرض الكل</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="account-wrap">
                                <div class="account-item clearfix js-item-menu">
                                    <div class="image">
                                        <img src="{{ asset( $admin->image ) }}" alt="{{ $admin->name }}"/>
                                    </div>
                                    <div class="content">
                                        <a class="js-acc-btn" href="#">{{ $admin->name }}</a>
                                    </div>
                                    <div class="account-dropdown js-dropdown">
                                        <div class="info clearfix">
                                            <div class="image">
                                                <a>
                                                    <img src="{{ asset( $admin->image ) }}" alt="{{ $admin->name }}"/>
                                                </a>
                                            </div>
                                            <div class="content">
                                                <h5 class="name">
                                                    <a>{{ $admin->name }}</a>
                                                </h5>
                                                <span class="email">{{ $admin->email }}</span>
                                            </div>
                                        </div>
                                        <div class="account-dropdown__body">
                                            <div class="account-dropdown__item">
                                                <a href="{{ route('auth.user.profile') }}">
                                                    <i class="zmdi zmdi-account"></i>الحساب</a>
                                            </div>
                                            <div class="account-dropdown__item">
                                                <a href="{{ route('auth.setting.index') }}">
                                                    <i class="zmdi zmdi-settings"></i>الاعدادات</a>
                                            </div>
                                        </div>
                                        <div class="account-dropdown__footer">
                                            <a href="{{ route('auth.logout') }}">
                                                <i class="zmdi zmdi-power"></i>تسجيل الخروج</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <div class="card">
                                        <div class="card-header">
                                            <strong class="card-title">الناتج</strong>
                                        </div>
                                        <div class="card-body">
                                            <div
                                                class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                                                <span class="badge badge-pill badge-danger">اخطاء</span>
                                                {{ $error }}
                                                <button type="button" class="close" data-dismiss="alert"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            @if(session()->has('successful'))
                                <div class="card">
                                    <div class="card-header">
                                        <strong class="card-title">الناتج</strong>
                                    </div>
                                    <div class="card-body">
                                        <div
                                            class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                            <span class="badge badge-pill badge-success">تم بنجاح</span>
                                            {{ session()->get('successful') }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>

                    @yield('content-admin')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="copyright">
                                <p>حقوق الملكيه محفوظة لعام {{ date("Y") }} برمجه و تطوير <a
                                        href="http://nevdia.com">شركه نيفديا</a>.</p>
                            </div>
                        </div>
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
<script src="{{ asset('admin/js/selectize.min.js') }}"></script>
<script src="{{ asset('admin/js/main.js') }}"></script>
<script src="{{ asset('admin/js/notify.min.js') }}"></script>


@php
    \request()->session()->forget('successful');
@endphp

@yield('script')
@yield('delete-script')
@yield('add_to_table')

</body>
</html>
