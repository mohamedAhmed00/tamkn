@extends('layout')
@section('content-admin')
    @php
        $page = "course";
        $defaultLanguage = get_default_language();
    @endphp
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('auth.home') }}">الرئيسية</a></li>
                    <li class="breadcrumb-item active" aria-current="page">كل المثاقات</li>
                </ol>
            </nav>

            @can('create', \App\Modules\Course\Model\Course::class)
                <div class="table-data__tool float-lg-right">
                    <div class="table-data__tool-right">
                        <a href="{{ route('auth.course.create') }}"
                           class="au-btn au-btn-icon au-btn--green au-btn--small">
                            <i class="zmdi zmdi-plus"></i>اضافة
                        </a>
                    </div>
                </div>
            @endcan


            <div class="table-responsive table-responsive-data2">

                <table class="table table-data2">
                    <thead>
                    <tr class="text-center">
                        @can('update', \App\Modules\Course\Model\Course::class)
                            <th># القسم</th>
                        @endcan
                        <th>االاسم</th>
                        <th>الصورة</th>
                        <th>أجزاء المثاق</th>
                        <th>الترتيب</th>
                        <th>الحالة</th>
                        <th>تاريخ الانشاء</th>

                        @can('update', \App\Modules\Course\Model\Course::class)
                            <th class="text-right pr-5">الاحداث</th>
                        @elsecan('delete', \App\Modules\Course\Model\Course::class)
                            <th class="text-right pr-5">الاحداث</th>
                        @endcan
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($courses as $course)
                        <tr class="tr-shadow text-center">
                            @can('update', \App\Modules\Course\Model\Course::class)
                                <td>
                                    <a href="{{ route('auth.course.edit',$course->id) }}">{{ $loop->iteration }}</a>
                                </td>
                            @endcan
                            <td>{{ $course->getCourseDescription->isEmpty()? '': $course->getCourseDescription->where('language_id',$defaultLanguage->id)->first()->name }}</td>
                            <td class="account-item text-center">
                                <img src="{{ asset($course->image )}}" class="image float-none" alt="">
                            </td>
                            <td>
                                <a href="{{ route('auth.course.part.index',$course->id) }}">عرض الاجزاء</a>
                            </td>
                            <td><span class="status--process">{{ $course->order }}</span></td>
                            <td><span class="status--process">{{ ($course->status == 1)? 'مفعل' : "معطل" }}</span></td>
                                <td><span class="status--process">{{ $course->created_at->diffForHumans() }}</span></td>

                            @if (Auth::user()->can('update', $course) Or Auth::user()->can('delete', $course))
                                <td>
                                    <div class="table-data-feature text-center">
                                        @can('update', \App\Modules\Course\Model\Course::class)
                                            <a href="{{ route('auth.course.edit',$course->id) }}" class="item"
                                               data-toggle="tooltip" data-placement="top" title="تعديل">
                                                <i class="zmdi zmdi-edit"></i>
                                            </a>
                                        @endcan
                                        @can('delete', \App\Modules\Course\Model\Course::class)
                                            <a href="{{ route('auth.course.delete',$course->id) }}"
                                               class="item delete"
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
            return confirm("هل تريد حذف هذا العنصر ؟");
        });
    </script>
@endsection
