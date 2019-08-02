@extends('layout')
@section('content-admin')
    @php
        $page = "lesson";
        $defaultLanguage = get_default_language();
    @endphp
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('auth.home') }}">الرئيسية</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('auth.course.index') }}">{{ $part->Course->getCourseDescription->where('language_id',$defaultLanguage->id)->first()->name }}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('auth.part.lesson.index',$part->id) }}">{{ $part->getPartDescription->where('language_id',$defaultLanguage->id)->first()->title }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">كل الدروس</li>
                </ol>
            </nav>
            @can('create', \App\Modules\Lesson\Model\Lesson::class)
                <div class="table-data__tool float-lg-right">
                    <div class="table-data__tool-right">
                        <a href="{{ route('auth.part.lesson.create',$part->id) }}"
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
                        @can('update', \App\Modules\Lesson\Model\Lesson::class)
                            <th># الدرس</th>
                        @endcan
                        <th>العنوان</th>
                        <th>عرض الوثائق</th>
                        <th>الترتيب</th>
                        <th>الحالة</th>
                        <th>تاريخ الانشاء</th>

                        @can('update', \App\Modules\Lesson\Model\Lesson::class)
                            <th class="text-right pr-5">الاحداث</th>
                        @elsecan('delete', \App\Modules\Lesson\Model\Lesson::class)
                            <th class="text-right pr-5">الاحداث</th>
                        @endcan
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($lessons as $lesson)
                        <tr class="tr-shadow text-center">
                            @can('update', \App\Modules\Lesson\Model\Lesson::class)
                                <td>
                                    <a href="{{ route('auth.part.lesson.edit',[$lesson->id,$part->id]) }}">{{ $loop->iteration }}</a>
                                </td>
                            @endcan
                            <td>{{ $lesson->getLessonDescription->isEmpty()? '': $lesson->getLessonDescription->where('language_id',$defaultLanguage->id)->first()->name }}</td>

                            <td>
                                <a href="{{ route('auth.lesson.document.index',$lesson->id) }}">عرض الوثائق</a>
                            </td>
                            <td><span class="status--process">{{ $lesson->order }}</span></td>
                            <td><span class="status--process">{{ ($lesson->status == 1)? 'مفعل' : "معطل" }}</span></td>
                                <td><span class="status--process">{{ $lesson->created_at->diffForHumans() }}</span></td>

                            @if (Auth::user()->can('update', $lesson) Or Auth::user()->can('delete', $lesson))
                                <td>
                                    <div class="table-data-feature text-center">
                                        @can('update', \App\Modules\Lesson\Model\Lesson::class)
                                            <a href="{{ route('auth.part.lesson.edit',[$lesson->id,$part->id]) }}" class="item"
                                               data-toggle="tooltip" data-placement="top" title="تعديل">
                                                <i class="zmdi zmdi-edit"></i>
                                            </a>
                                        @endcan
                                        @can('delete', \App\Modules\Lesson\Model\Lesson::class)
                                            <a href="{{ route('auth.part.lesson.delete',[$lesson->id,$part->id]) }}"
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
