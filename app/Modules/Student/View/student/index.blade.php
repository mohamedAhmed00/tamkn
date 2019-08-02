@extends('layout')
@section('content-admin')
    @php
        $page = "student";
    @endphp
    <div class="row">
        <div class="col-md-12">
            <!-- DATA TABLE -->
            <h3 class="title-5 m-b-35">كل العملاء</h3>
            @can('create', \App\Modules\Student\Model\Student::class)
                <div class="table-data__tool float-lg-right">
                    <div class="table-data__tool-right">
                        <a href="{{ route('auth.student.create') }}" class="au-btn au-btn-icon au-btn--green au-btn--small">
                            <i class="zmdi zmdi-plus"></i> اضافة عميل
                        </a>
                    </div>
                </div>
            @endcan
            <div class="table-responsive table-responsive-data2">

                <table class="table table-data2">
                    <thead>
                    <tr class="text-center">
                        @can('update', \App\Modules\Student\Model\Student::class)
                            <th># العميل</th>
                        @endcan
                        <th>الاسم</th>
                        <th>الصورة</th>
                        <th>اسم الحساب</th>
                        <th>البريد الالكتروني</th>
                        <th>السن</th>
                        <th>رقم الجوال</th>
                        <th>تاريخ الانشاء</th>

                        @can('update', \App\Modules\Student\Model\Student::class)
                            <th class="text-right pr-5">الاحداث</th>
                        @elsecan('delete', \App\Modules\Student\Model\Student::class)
                            <th class="text-right pr-5">الاحداث</th>
                        @endcan
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($students as $student)
                        <tr class="tr-shadow text-center">
                            @can('update', \App\Modules\Student\Model\Student::class)
                                <td><a href="{{ route('auth.student.edit',$student->id) }}">{{ $loop->iteration }}</a></td>
                            @endcan
                            <td>{{ $student->name }}</td>
                            <td class="account-item text-center"><img src="{{ asset($student->image )}}"
                                                                      class="image float-none" alt=""></td>
                            <td><span class="status--process">{{ $student->username }}</span></td>
                            <td><span class="status--process">{{ $student->email }}</span></td>
                            <td><span class="status--process">{{ $student->age }}</span></td>
                            <td><span class="status--process">{{ $student->phone_number }}</span></td>
                            <td><span class="status--process">{{ $student->created_at->diffForHumans() }}</span></td>

                            @if (Auth::user()->can('update', $student) Or Auth::user()->can('delete', $student))
                                <td>
                                    <div class="table-data-feature text-center">
                                        @can('update', \App\Modules\Student\Model\Student::class)
                                            <a href="{{ route('auth.student.edit',$student->id) }}" class="item"
                                               data-toggle="tooltip" data-placement="top" title="تعديل">
                                                <i class="zmdi zmdi-edit"></i>
                                            </a>
                                        @endcan
                                        @can('delete', \App\Modules\Student\Model\Student::class)
                                                <a href="{{ route('auth.student.delete',$student->id) }}" class="item delete"
                                                   data-toggle="tooltip" data-placement="top" title="حذف">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </a>
                                        @endcan
                                    </div>
                                </td>
                            @endif
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
            return confirm("هل تريد حقا حذف هذا العميل");
        });
    </script>
@endsection
