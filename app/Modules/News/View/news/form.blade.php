@extends('layout')
@section('content-admin')
    @php
        $page = "news";
        $languages = get_languages();
    @endphp
    <div class="col-lg-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('auth.home') }}">الرئيسية</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ !empty($news)? ' تعديل الخبر ' : ' انشاء خبر جديد ' }}</li>
            </ol>
        </nav>
        <div class="card">
            <div class="card-body">
                <form action="{{ !empty($news)? route('auth.news.update',$news->id) : route('auth.news.store') }}" method="post" novalidate="novalidate" enctype="multipart/form-data">
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
                                    <label for="name_{{ $language->key }}"  class="control-label mb-1">عنوان الخبر باللغه : {{ $language->name }} </label>
                                    <input id="name_{{ $language->key }}" name="name_{{ $language->key }}" class="form-control" aria-required="true" autocomplete="none"
                                           aria-invalid="false" value="{{ (!empty($news) AND !empty($news->getNewsDescription->where('language_id',$language->id)->first()))? $news->getNewsDescription->where('language_id',$language->id)->first()->name : '' }}" type="text">
                                </div>
                                <div class="form-group">
                                    <label for="description_{{ $language->key }}"  class="control-label mb-1">وصف الخبر باللغه : {{ $language->name }} </label>
                                    <input id="description_{{ $language->key }}" name="description_{{ $language->key }}" class="form-control" aria-required="true" autocomplete="none"
                                           aria-invalid="false" value="{{ (!empty($news) AND !empty($news->getNewsDescription->where('language_id',$language->id)->first()))? $course->getNewsDescription->where('language_id',$language->id)->first()->description : '' }}" type="text">
                                </div>
                                <div class="form-group">
                                    <label for="content_{{ $language->key }}"  class="control-label mb-1">تعريف بالخبر باللغه : {{ $language->name }} </label>
                                    <textarea name="content_{{ $language->key }}"  class="control-label mb-1 form-control" aria-required="true" autocomplete="none" aria-invalid="false">{{ (!empty($news) AND !empty($news->getNewsDescription->where('language_id',$language->id)->first()))? $news->getNewsDescription->where('language_id',$language->id)->first()->content : '' }}</textarea>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="form-group">
                        <label for="status" class="control-label mb-1">خبر مميز </label>
                        <select name="status" id="status" class="form-control-sm form-control">
                            <option>أختار واحدة</option>
                            <option value="0" {{ empty(old('status'))? (!empty($news) AND $news->status == '0')?'selected':''  : 'selected' }}>تعطيل</option>
                            <option value="1" {{ empty(old('status'))? (!empty($news) AND $news->status == '1')?'selected':''  : 'selected' }}>تفعيل</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="featured" class="control-label mb-1">الحالة </label>
                        <select name="featured" id="featured" class="form-control-sm form-control">
                            <option>أختار الحالة</option>
                            <option value="0" {{ empty(old('featured'))? (!empty($news) AND $news->featured == '0')?'selected':''  : 'selected' }}>تعطيل</option>
                            <option value="1" {{ empty(old('featured'))? (!empty($news) AND $news->featured == '1')?'selected':''  : 'selected' }}>تفعيل</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="order" class="control-label mb-1">الترتيب</label>
                        <input id="order" name="order" class="form-control" aria-required="true" autocomplete="none"
                               aria-invalid="false" value="{{ empty(old('order'))? !empty($news)?$news->order:''  : old('order') }}" type="number">
                    </div>
                    <div class="form-group has-success">
                        <label for="image" class="control-label mb-1">صورة القسم</label>
                        <input id="image" name="image" class="form-control"
                               autocomplete="none" aria-required="true" aria-invalid="false" aria-describedby="image" type="file">
                    </div>
                    <div class="text-center">
                        <button id="payment-button" type="submit" class="btn btn-md btn-info ">
                            <i class="fa fa-lock fa-lg"></i>&nbsp;
                            <span id="payment-button-amount">حفظ</span>
                            <span id="payment-button-sending" style="display:none;">جاري الأرسال</span>
                        </button>
                    </div>
                    @if(!empty($news->image))
                        <img src="{{ asset($news->image )}}" style="width: 250px; height: 200px;" alt="">
                    @endif
                </form>
            </div>
        </div>
    </div>
@endsection
