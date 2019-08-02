@extends('layout')
@section('content-admin')
    @php
        $page = "answer";
        $defaultLanguage = get_default_language();
        $test = $question->Test;
        $part = $test->Part;
        $course =  $part->Course;
    @endphp
    <style>
        .breadcrumb .breadcrumb-item a
        {
            color: #63c76a !important;
        }
    </style>
    <div class="row">
        <div class="col-md-12">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('auth.home') }}">الرئيسية</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('auth.course.index') }}">{{ $course->getCourseDescription->where('language_id',$defaultLanguage->id)->first()->name }}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('auth.course.part.index',$course->id) }}">{{ $part->getPartDescription->where('language_id',$defaultLanguage->id)->first()->title }}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('auth.part.test.index',$test->id) }}">{{ $test->getTestDescription->where('language_id',$defaultLanguage->id)->first()->title }}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('auth.test.question.index',$question->id) }}">{{ substr($question->getQuestionDescription->where('language_id',$defaultLanguage->id)->first()->question,0,50) }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">كل أجابات السؤال</li>
                </ol>
            </nav>
            @can('create', \App\Modules\Answer\Model\Answer::class)
                <div class="table-data__tool float-lg-right">
                    <div class="table-data__tool-right">
                        <a href="{{ route('auth.question.answer.create',$question->id) }}"
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
                        @can('update', \App\Modules\Answer\Model\Answer::class)
                            <th># الاختبار</th>
                        @endcan
                        <th>العنوان</th>
                        <th>صواب</th>
                        <th>الترتيب</th>
                        <th>تاريخ الانشاء</th>

                        @can('update', \App\Modules\Answer\Model\Answer::class)
                            <th class="text-right pr-5">الاحداث</th>
                        @elsecan('delete', \App\Modules\Answer\Model\Answer::class)
                            <th class="text-right pr-5">الاحداث</th>
                        @endcan
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($answers as $answer)
                        <tr class="tr-shadow text-center">
                            @can('update', \App\Modules\Answer\Model\Answer::class)
                                <td>
                                    <a href="{{ route('auth.question.answer.edit',[$answer->id,$question->id]) }}">{{ $loop->iteration }}</a>
                                </td>
                            @endcan
                            <td>{{ $answer->getAnswerDescription->isEmpty()? '': $answer->getAnswerDescription->where('language_id',$defaultLanguage->id)->first()->answer }}</td>


                            <td><span class="status--process">{{ $answer->order }}</span></td>
                            <td><span class="status--process">{{ ($answer->status == 1)? 'مفعل' : "معطل" }}</span></td>
                                <td><span class="status--process">{{ $answer->created_at->diffForHumans() }}</span></td>

                            @if (Auth::user()->can('update', $answer) Or Auth::user()->can('delete', $answer))
                                <td>
                                    <div class="table-data-feature text-center">
                                        @can('update', \App\Modules\Answer\Model\Answer::class)
                                            <a href="{{ route('auth.question.answer.edit',[$answer->id,$question->id]) }}" class="item"
                                               data-toggle="tooltip" data-placement="top" title="تعديل">
                                                <i class="zmdi zmdi-edit"></i>
                                            </a>
                                        @endcan
                                        @can('delete', \App\Modules\Answer\Model\Answer::class)
                                            <a href="{{ route('auth.question.answer.delete',[$answer->id,$question->id]) }}"
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
