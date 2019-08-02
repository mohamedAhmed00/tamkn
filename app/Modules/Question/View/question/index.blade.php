@extends('layout')
@section('content-admin')
    @php
        $page = "question";
        $defaultLanguage = get_default_language();
        $part = $test->Part;
        $course = $part->Course;
    @endphp

    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('auth.home') }}">الرئيسية</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('auth.course.index') }}">{{ $course->getCourseDescription->where('language_id',$defaultLanguage->id)->first()->name }}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('auth.course.part.index',$course->id) }}">{{ $part->getPartDescription->where('language_id',$defaultLanguage->id)->first()->title }}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('auth.part.test.index',$test->id) }}">{{ $test->getTestDescription->where('language_id',$defaultLanguage->id)->first()->title }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">كل اسئلة الاختبار</li>
                </ol>
            </nav>
            @can('create', \App\Modules\Question\Model\Question::class)
                <div class="table-data__tool float-lg-right">
                    <div class="table-data__tool-right">
                        <a href="{{ route('auth.test.question.create',$test->id) }}"
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
                        @can('update', \App\Modules\Question\Model\Question::class)
                            <th># السؤال</th>
                        @endcan
                        <th>السؤال</th>
                        <th>عرض الاجابات</th>
                        <th>الترتيب</th>
                        <th>الحالة</th>
                        <th>تاريخ الانشاء</th>

                        @can('update', \App\Modules\Question\Model\Question::class)
                            <th class="text-right pr-5">الاحداث</th>
                        @elsecan('delete', \App\Modules\Question\Model\Question::class)
                            <th class="text-right pr-5">الاحداث</th>
                        @endcan
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($questions as $question)
                        <tr class="tr-shadow text-center">
                            @can('update', \App\Modules\Question\Model\Question::class)
                                <td>
                                    <a href="{{ route('auth.test.question.edit',[$question->id,$test->id]) }}">{{ $loop->iteration }}</a>
                                </td>
                            @endcan
                            <td>{{ $question->getQuestionDescription->isEmpty()? '': $question->getQuestionDescription->where('language_id',$defaultLanguage->id)->first()->question }}</td>

                            <td>
                                <a href="{{ route('auth.question.answer.index',$question->id) }}">عرض الاجابات</a>
                            </td>
                            <td><span class="status--process">{{ $question->order }}</span></td>
                            <td><span class="status--process">{{ ($question->status == 1)? 'مفعل' : "معطل" }}</span></td>
                                <td><span class="status--process">{{ $question->created_at->diffForHumans() }}</span></td>

                            @if (Auth::user()->can('update', $question) Or Auth::user()->can('delete', $question))
                                <td>
                                    <div class="table-data-feature text-center">
                                        @can('update', \App\Modules\Question\Model\Question::class)
                                            <a href="{{ route('auth.test.question.edit',[$question->id,$test->id]) }}" class="item"
                                               data-toggle="tooltip" data-placement="top" title="تعديل">
                                                <i class="zmdi zmdi-edit"></i>
                                            </a>
                                        @endcan
                                        @can('delete', \App\Modules\Question\Model\Question::class)
                                            <a href="{{ route('auth.test.question.delete',[$question->id,$test->id]) }}"
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
