@extends('layout')
@section('content-admin')
    @php
        $page = "part";
        $defaultLanguage = get_default_language();

    @endphp
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('auth.home') }}">الرئيسية</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('auth.course.index') }}">{{ $course->getCourseDescription->where('language_id',$defaultLanguage->id)->first()->name }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">كل الاجزاء</li>
                </ol>
            </nav>

            @can('create', \App\Modules\Part\Model\Part::class)
                <div class="table-data__tool float-lg-right">
                    <div class="table-data__tool-right">
                        <a href="{{ route('auth.course.part.create',$course->id) }}"
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
                        @can('update', \App\Modules\Part\Model\Part::class)
                            <th># القسم</th>
                        @endcan
                        <th>االاسم</th>
                        <th>دروس الجزء</th>
                        <th>اختبارات الجزء</th>
                        <th>الترتيب</th>
                        <th>الحالة</th>
                        <th>تاريخ الانشاء</th>

                        @can('update', \App\Modules\Part\Model\Part::class)
                            <th class="text-right pr-5">الاحداث</th>
                        @elsecan('delete', \App\Modules\Part\Model\Part::class)
                            <th class="text-right pr-5">الاحداث</th>
                        @endcan
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($parts as $part)
                        <tr class="tr-shadow text-center">
                            @can('update', \App\Modules\Part\Model\Part::class)
                                <td>
                                    <a href="{{ route('auth.course.part.edit',[$part->id,$course->id]) }}">{{ $loop->iteration }}</a>
                                </td>
                            @endcan
                            <td>{{ $part->getPartDescription->isEmpty()? '': $part->getPartDescription->where('language_id',$defaultLanguage->id)->first()->title }}</td>

                            <td>
                                <a href="{{ route('auth.part.lesson.index',[$part->id]) }}">عرض الدروس</a>
                            </td>
                            <td>
                                <a href="{{ route('auth.part.test.index',[$part->id]) }}">عرض الاختبارات</a>
                            </td>
                            <td><span class="status--process">{{ $part->order }}</span></td>
                            <td><span class="status--process">{{ ($part->status == 1)? 'مفعل' : "معطل" }}</span></td>
                                <td><span class="status--process">{{ $part->created_at->diffForHumans() }}</span></td>

                            @if (Auth::user()->can('update', $part) Or Auth::user()->can('delete', $part))
                                <td>
                                    <div class="table-data-feature text-center">
                                        @can('update', \App\Modules\Part\Model\Part::class)
                                            <a href="{{ route('auth.course.part.edit',[$part->id,$course->id]) }}" class="item"
                                               data-toggle="tooltip" data-placement="top" title="تعديل">
                                                <i class="zmdi zmdi-edit"></i>
                                            </a>
                                        @endcan
                                        @can('delete', \App\Modules\Part\Model\Part::class)
                                            <a href="{{ route('auth.course.part.delete',[$part->id,$course->id]) }}"
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
