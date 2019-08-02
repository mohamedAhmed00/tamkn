@extends('layout')
@section('content-admin')
    @php
        $page = "teacher";
    @endphp
    <div class="row">

        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('auth.home') }}">الرئيسية</a></li>
                    <li class="breadcrumb-item active" aria-current="page">كل المعلمين</li>
                </ol>
            </nav>
            <!-- DATA TABLE -->
            <div class="table-data__tool float-lg-right">
                <div class="table-data__tool-right">
                    <a href="{{ route('auth.teacher.create') }}"
                       class="au-btn au-btn-icon au-btn--green au-btn--small">
                        <i class="zmdi zmdi-plus"></i>اضافة
                    </a>
                </div>
            </div>


            <div class="table-responsive table-responsive-data2">

                <table class="table table-data2">
                    <thead>
                    <tr class="text-center">
                        <th># المعلم</th>
                        <th>االاسم</th>
                        <th>الصورة</th>
                        <th>الوظيفة</th>
                        <th>رقم الهاتف</th>
                        <th>العنوان</th>
                        <th>تاريخ الانشاء</th>
                        <th class="text-right pr-5">الاحداث</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($teachers as $teacher)
                        <tr class="tr-shadow text-center">
                            <td>
                                <a href="{{ route('auth.teacher.edit',$teacher->id) }}">{{ $loop->iteration }}</a>
                            </td>
                            <td>{{ $teacher->name }}</td>
                            <td class="account-item text-center"><img src="{{ asset($teacher->image )}}"
                                                                      class="image float-none" alt=""></td>
                            <td>{{ $teacher->job }}</td>
                            <td>{{ $teacher->phone_number }}</td>
                            <td>{{ $teacher->address }}</td>
                            <td><span class="status--process">{{ $teacher->created_at->diffForHumans() }}</span></td>

                            <td>
                                <div class="table-data-feature text-center">
                                    <a href="{{ route('auth.teacher.edit',$teacher->id) }}" class="item"
                                       data-toggle="tooltip" data-placement="top" title="تعديل">
                                        <i class="zmdi zmdi-edit"></i>
                                    </a>
                                    <a href="{{ route('auth.teacher.delete',$teacher->id) }}"
                                       class="item delete"
                                       data-toggle="tooltip" data-placement="top" title="حذف">
                                        <i class="zmdi zmdi-delete"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr class="spacer"></tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- END DATA TABLE -->
        </div>
    </div>

@endsection

@section('delete-script')
    <script>
        $(".delete").on("click", function () {
            return confirm("هل تريد حذف هذا العنصر ؟");
        });
    </script>
@endsection
