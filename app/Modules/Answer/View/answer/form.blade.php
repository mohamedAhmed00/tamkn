@extends('layout')
@section('content-admin')
    @php
        $page = "answer";
        $languages = get_languages();
        $teachers = get_teachers();
        $categories = get_categories();
        $defaultLanguage = get_default_language();
        $test = $question->Test;
        $part = $test->Part;
        $course =  $part->Course;
    @endphp
    <div class="col-lg-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('auth.home') }}">الرئيسية</a></li>
                <li class="breadcrumb-item"><a href="{{ route('auth.course.index') }}">{{ $course->getCourseDescription->where('language_id',$defaultLanguage->id)->first()->name }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('auth.course.part.index',$course->id) }}">{{ $part->getPartDescription->where('language_id',$defaultLanguage->id)->first()->title }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('auth.part.test.index',$test->id) }}">{{ $test->getTestDescription->where('language_id',$defaultLanguage->id)->first()->title }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('auth.test.question.index',$question->id) }}">{{ substr($question->getQuestionDescription->where('language_id',$defaultLanguage->id)->first()->question,0,50) }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ !empty($answer)? ' تعديل الاجابة '  : ' انشاء أجابة جديدة ' }}</li>
            </ol>
        </nav>
        <div class="card">
            <div class="card-body">
                <form action="{{ !empty($answer)? route('auth.question.answer.update',[$answer->id,$question->id]) : route('auth.question.answer.store',$question->id) }}" method="post" novalidate="novalidate" enctype="multianswer/form-data">
                    @csrf
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        @foreach($languages as $language)
                            <li class="nav-item">
                                <a class="nav-link {{ $loop->iteration == 1 ? 'active' : '' }}" id="{{ $language->key }}_tab" data-toggle="tab" href="#{{ $language->key }}" role="tab" aria-controls="{{ $language->key }}" aria-selected="true">{{ $language->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                    <div class="tab-content mt-3" id="myTabContent">
                        @foreach($languages as $language)
                            <div class="tab-pane fade {{ $loop->iteration == 1 ? ' show active ' : '' }}" id="{{ $language->key }}" role="tabpanel" aria-labelledby="{{ $language->key }}_tab">
                                <div class="form-group">
                                    <label for="answer_{{ $language->key }}"  class="control-label mb-1"> الاجابة باللغه : {{ $language->name }} </label>
                                    <input id="answer_{{ $language->key }}" name="answer_{{ $language->key }}" class="form-control" aria-required="true" autocomplete="none"
                                           aria-invalid="false" value="{{ (!empty($answer) AND !empty($answer->getAnswerDescription->where('language_id',$language->id)->first()))? $answer->getAnswerDescription->where('language_id',$language->id)->first()->answer : '' }}" type="text">
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="form-group">
                        <label for="status" class="control-label mb-1">صواب ؟ </label>
                        <select name="status" id="status" class="form-control-sm form-control">
                            <option>اختار واحدة ؟</option>
                            <option value="0" {{ empty(old('is_correct'))? (!empty($answer) AND $answer->is_correct == '0')?'selected':''  : 'selected' }}>خطاء</option>
                            <option value="1" {{ empty(old('is_correct'))? (!empty($answer) AND $answer->is_correct == '1')?'selected':''  : 'selected' }}>صواب</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="order" class="control-label mb-1">الترتيب</label>
                        <input id="order" name="order" class="form-control" aria-required="true" autocomplete="none"
                               aria-invalid="false" value="{{ empty(old('order'))? !empty($answer)?$answer->order:''  : old('order') }}" type="number">
                    </div>

                    <div class="text-center">
                        <button id="payment-button" type="submit" class="btn btn-md btn-info ">
                            <i class="fa fa-lock fa-lg"></i>&nbsp;
                            <span id="payment-button-amount">حفظ</span>
                            <span id="payment-button-sending" style="display:none;">جاري الأرسال</span>
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
