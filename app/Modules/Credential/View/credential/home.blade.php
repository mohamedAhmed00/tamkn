@extends('layout')
@section('content-admin')
    @php
        $page = "dashboard";
    @endphp
    <div class="row">
        <div class="col-md-12">
            <div class="overview-wrap">
                <h2 class="title-1">نظرة عامة</h2>
            </div>
        </div>
    </div>
    <div class="row m-t-25">
        <div class="col-sm-6 col-lg-3">
            <div class="overview-item overview-item--c1">
                <div class="overview__inner">
                    <div class="overview-box clearfix">
                        <div class="icon">
                            <i class="zmdi zmdi-account"></i>
                        </div>
                        <div class="text">
                            <h2>30</h2>
                            <span>مستخدمين النظام</span>
                        </div>
                    </div>
                    <div class="overview-chart">
                        <canvas id="widgetChart1"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="overview-item overview-item--c2">
                <div class="overview__inner">
                    <div class="overview-box clearfix">
                        <div class="icon">
                            <i class="zmdi zmdi-chart"></i>
                        </div>
                        <div class="text">
                            <h2>388</h2>
                            <span>عدد اقسام المثاقات</span>
                        </div>
                    </div>
                    <div class="overview-chart">
                        <canvas id="widgetChart2"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="overview-item overview-item--c3">
                <div class="overview__inner">
                    <div class="overview-box clearfix">
                        <div class="icon">
                            <i class="zmdi zmdi-developer-board"></i>
                        </div>
                        <div class="text">
                            <h2>40</h2>
                            <span>عدد المثاقات</span>
                        </div>
                    </div>
                    <div class="overview-chart">
                        <canvas id="widgetChart3"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="overview-item overview-item--c4">
                <div class="overview__inner">
                    <div class="overview-box clearfix">
                        <div class="icon">
                            <i class="zmdi zmdi-graduation-cap"></i>
                        </div>
                        <div class="text">
                            <h2>4000</h2>
                            <span>المعلمين</span>
                        </div>
                    </div>
                    <div class="overview-chart">
                        <canvas id="widgetChart4"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-9">
            <h2 class="title-1 m-b-25">أحدث الطلاب</h2>
            <div class="table-responsive table--no-card m-b-40">
                <table class="table table-borderless table-striped table-earning">
                    <thead>
                    <tr>
                        <th>رقم الطالب</th>
                        <th>الاسم </th>
                        <th>البريد الالكتروني </th>
                        <th class="text-right">تاريخ التسجيل</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>نادر احمد</td>
                        <td>engmohamedahmed00@gmail.com</td>
                        <td class="text-right">2 min ago</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>نادر احمد</td>
                        <td>engmohamedahmed00@gmail.com</td>
                        <td class="text-right">2 min ago</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>نادر احمد</td>
                        <td>engmohamedahmed00@gmail.com</td>
                        <td class="text-right">2 min ago</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>نادر احمد</td>
                        <td>engmohamedahmed00@gmail.com</td>
                        <td class="text-right">2 min ago</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>نادر احمد</td>
                        <td>engmohamedahmed00@gmail.com</td>
                        <td class="text-right">2 min ago</td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>نادر احمد</td>
                        <td>engmohamedahmed00@gmail.com</td>
                        <td class="text-right">2 min ago</td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>نادر احمد</td>
                        <td>engmohamedahmed00@gmail.com</td>
                        <td class="text-right">2 min ago</td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td>نادر احمد</td>
                        <td>engmohamedahmed00@gmail.com</td>
                        <td class="text-right">2 min ago</td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <td>نادر احمد</td>
                        <td>engmohamedahmed00@gmail.com</td>
                        <td class="text-right">2 min ago</td>
                    </tr>
                    <tr>
                        <td>10</td>
                        <td>نادر احمد</td>
                        <td>engmohamedahmed00@gmail.com</td>
                        <td class="text-right">2 min ago</td>
                    </tr>
                    <tr>
                        <td>11</td>
                        <td>نادر احمد</td>
                        <td>engmohamedahmed00@gmail.com</td>
                        <td class="text-right">2 min ago</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-lg-3">
            <h2 class="title-1 m-b-25">احدث المثاقات</h2>
            <div class="au-card au-card--bg-blue au-card-top-countries m-b-40">
                <div class="au-card-inner">
                    <div class="table-responsive">
                        <table class="table table-top-countries">
                            <tbody>
                            <tr>
                                <td>التاهيل النفسي</td>
                                <td class="text-right">2018-09-29 05:57</td>
                            </tr>
                            <tr>
                                <td>التاهيل النفسي</td>
                                <td class="text-right">2018-09-29 05:57</td>
                            </tr>
                            <tr>
                                <td>التاهيل النفسي</td>
                                <td class="text-right">2018-09-29 05:57</td>
                            </tr>
                            <tr>
                                <td>التاهيل النفسي</td>
                                <td class="text-right">2018-09-29 05:57</td>
                            </tr>
                            <tr>
                                <td>التاهيل النفسي</td>
                                <td class="text-right">2018-09-29 05:57</td>
                            </tr>
                            <tr>
                                <td>التاهيل النفسي</td>
                                <td class="text-right">2018-09-29 05:57</td>
                            </tr>
                            <tr>
                                <td>التاهيل النفسي</td>
                                <td class="text-right">2018-09-29 05:57</td>
                            </tr>
                            <tr>
                                <td>التاهيل النفسي</td>
                                <td class="text-right">2018-09-29 05:57</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

