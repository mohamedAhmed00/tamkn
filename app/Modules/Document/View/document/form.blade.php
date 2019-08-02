@extends('layout')
@section('content-admin')
    @php
        $page = "document";
        $languages = get_languages();
        $defaultLanguage = get_default_language();
        $part = $lesson->Part;
        $course =  $part->Course;
    @endphp
    <div class="col-lg-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('auth.home') }}">الرئيسية</a></li>
                <li class="breadcrumb-item"><a href="{{ route('auth.course.index') }}">{{ $course->getCourseDescription->where('language_id',$defaultLanguage->id)->first()->name }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('auth.course.part.index',$course->id) }}">{{ $part->getPartDescription->where('language_id',$defaultLanguage->id)->first()->title }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('auth.part.lesson.index',$part->id) }}">{{ $lesson->getLessonDescription->where('language_id',$defaultLanguage->id)->first()->name }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ !empty($document)? ' تعديل الوثيقة ' : ' انشاء وثيقة جديدة ' }}</li>
            </ol>
        </nav>
        <div class="card">
            <div class="card-body">
                <form action="{{ !empty($document)? route('auth.lesson.document.update',[$document->id,$lesson->id]) : route('auth.lesson.document.store',$lesson->id) }}" method="post" novalidate="novalidate" enctype="multipart/form-data">
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
                                    <label for="title_{{ $language->key }}"  class="control-label mb-1">عنوان الوثيقة باللغه : {{ $language->name }} </label>
                                    <input id="title_{{ $language->key }}" name="title_{{ $language->key }}" class="form-control" aria-required="true" autocomplete="none"
                                           aria-invalid="false" value="{{ empty(old('title_'.$language->key))? (!empty($document) AND !empty($document->getDocumentDescription->where('language_id',$language->id)->first()))? $document->getDocumentDescription->where('language_id',$language->id)->first()->title : ''  : old('title_'.$language->key) }} " type="text">
                                </div>
                                <div class="form-group has-success">
                                    <label for="file_{{ $language->key }}" class="control-label mb-1">ملف الوثيقة  باللغه : {{ $language->name }}</label>
                                    <input id="file_{{ $language->key }}" name="file_{{ $language->key }}" class="form-control"
                                           autocomplete="none" aria-required="true" aria-invalid="false" aria-describedby="file_{{ $language->key }}" type="file">
                                </div>
                            </div>

                        @endforeach
                    </div>

                    <div class="form-group">
                        <label for="status" class="control-label mb-1">الحالة </label>
                        <select name="status" id="status" class="form-control-sm form-control">
                            <option>أختار الحالة</option>
                            <option value="0" {{ empty(old('status'))? (!empty($document) AND $document->status == '0')?'selected':''  : 'selected' }}>تعطيل</option>
                            <option value="1" {{ empty(old('status'))? (!empty($document) AND $document->status == '1')?'selected':''  : 'selected' }}>تفعيل</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="order" class="control-label mb-1">الترتيب</label>
                        <input id="order" name="order" class="form-control" aria-required="true" autocomplete="none"
                               aria-invalid="false" value="{{ empty(old('order'))? !empty($document)?$document->order:''  : old('order') }}" type="number">
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
