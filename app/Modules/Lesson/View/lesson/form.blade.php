@extends('layout')
@section('content-admin')
    @php
        $page = "lesson";
        $languages = get_languages();
        $defaultLanguage = get_default_language();
    @endphp
    <div class="col-lg-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('auth.home') }}">الرئيسية</a></li>
                <li class="breadcrumb-item"><a href="{{ route('auth.course.index') }}">{{ $part->Course->getCourseDescription->where('language_id',$defaultLanguage->id)->first()->name }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('auth.part.lesson.index',$part->id) }}">{{ $part->getPartDescription->where('language_id',$defaultLanguage->id)->first()->title }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ !empty($lesson)? ' تعديل الدرس '  : ' انشاء درس جديد ' }}</li>
            </ol>
        </nav>
        <div class="card">
            <div class="card-body">
                <form action="{{ !empty($lesson)? route('auth.part.lesson.update',[$lesson->id,$part->id]) : route('auth.part.lesson.store',$part->id) }}" method="post" novalidate="novalidate" enctype="multipart/form-data">
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
                                    <label for="name_{{ $language->key }}"  class="control-label mb-1">عنوان الدرس باللغه : {{ $language->name }} </label>
                                    <input id="name_{{ $language->key }}" name="name_{{ $language->key }}" class="form-control" aria-required="true" autocomplete="none"
                                           aria-invalid="false" value="{{ empty(old('name_'.$language->key))? (!empty($lesson) AND !empty($lesson->getLessonDescription->where('language_id',$language->id)->first()))? $lesson->getLessonDescription->where('language_id',$language->id)->first()->name : ''  : old('name_'.$language->key) }} " type="text">
                                </div>
                                <div class="form-group">
                                    <label for="content_{{ $language->key }}"  class="control-label mb-1">تعريف بالدرس باللغه : {{ $language->name }} </label>
                                    <textarea name="content_{{ $language->key }}"  class="control-label mb-1 form-control" aria-required="true" autocomplete="none" aria-invalid="false">{{ empty(old('content_'.$language->key))? (!empty($lesson) AND !empty($lesson->getLessonDescription->where('language_id',$language->id)->first()))? $lesson->getLessonDescription->where('language_id',$language->id)->first()->content : '' : old('content_'.$language->key) }}</textarea>
                                </div>
                                <div class="form-group has-success">
                                    <label for="sound_{{ $language->key }}" class="control-label mb-1">ملف الصوت المثاق باللغه : {{ $language->name }}</label>
                                    <input id="sound_{{ $language->key }}" name="sound_{{ $language->key }}" class="form-control"
                                           autocomplete="none" aria-required="true" aria-invalid="false" aria-describedby="sound_{{ $language->key }}" type="file">
                                </div>
                                <div class="form-group has-success">
                                    <label for="video_{{ $language->key }}" class="control-label mb-1">ملف الفديو المثاق باللغه : {{ $language->name }}</label>
                                    <input id="video_{{ $language->key }}" name="video_{{ $language->key }}" class="form-control"
                                           autocomplete="none" aria-required="true" aria-invalid="false" aria-describedby="video_{{ $language->key }}" type="file">
                                </div>

                                @if( !empty($lesson) AND !empty($lesson->getLessonDescription->where('language_id',$language->id)->first()->sound))
                                    <h3 class="h3 text-center">ملف الصوت</h3>
                                    <audio controls>
                                        <source src="{{ asset($lesson->getLessonDescription->where('language_id',$language->id)->first()->sound)}}">
                                        المتصفح قديم لا يمكن تشغيل ملف الصوت
                                    </audio>
                                @endif
                                @if(!empty($lesson) AND !empty($lesson->getLessonDescription->where('language_id',$language->id)->first()->video))
                                    <h3 class="h3 text-center">ملف الفديو</h3>
                                    <video class="form-control" controls>
                                        <source src="{{ asset($lesson->getLessonDescription->where('language_id',$language->id)->first()->video) }}" type="video/mp4">
                                        المتصفح قديم لا يمكن تشغيل ملف الفديو
                                    </video>

                                @endif
                            </div>

                        @endforeach
                    </div>

                    <div class="form-group">
                        <label for="status" class="control-label mb-1">الحالة </label>
                        <select name="status" id="status" class="form-control-sm form-control">
                            <option>أختار الحالة</option>
                            <option value="0" {{ empty(old('status'))? (!empty($lesson) AND $lesson->status == '0')?'selected':''  : 'selected' }}>تعطيل</option>
                            <option value="1" {{ empty(old('status'))? (!empty($lesson) AND $lesson->status == '1')?'selected':''  : 'selected' }}>تفعيل</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="order" class="control-label mb-1">الترتيب</label>
                        <input id="order" name="order" class="form-control" aria-required="true" autocomplete="none"
                               aria-invalid="false" value="{{ empty(old('order'))? !empty($lesson)?$lesson->order:''  : old('order') }}" type="number">
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
