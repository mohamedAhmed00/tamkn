@extends('layout')
@section('content-admin')
    @php
        $page = "course";
        $languages = get_languages();
        $teachers = get_teachers();
        $categories = get_categories();
        $defaultLanguage = get_default_language();
    @endphp
    <div class="col-lg-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('auth.home') }}">الرئيسية</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ !empty($course)? ' تعديل المثاق ' : ' انشاء مثاق جديد ' }}</li>
            </ol>
        </nav>
        <div class="card">
            <div class="card-body">
                <form action="{{ !empty($course)? route('auth.course.update',$course->id) : route('auth.course.store') }}" method="post" novalidate="novalidate" enctype="multipart/form-data">
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
                                    <label for="name_{{ $language->key }}"  class="control-label mb-1">اسم المثاق باللغه : {{ $language->name }} </label>
                                    <input id="name_{{ $language->key }}" name="name_{{ $language->key }}" class="form-control" aria-required="true" autocomplete="none"
                                           aria-invalid="false" value="{{ (!empty($course) AND !empty($course->getCourseDescription->where('language_id',$language->id)->first()))? $course->getCourseDescription->where('language_id',$language->id)->first()->name : '' }}" type="text">
                                </div>
                                <div class="form-group">
                                    <label for="description_{{ $language->key }}"  class="control-label mb-1">وصف المثاق باللغه : {{ $language->name }} </label>
                                    <input id="description_{{ $language->key }}" name="description_{{ $language->key }}" class="form-control" aria-required="true" autocomplete="none"
                                           aria-invalid="false" value="{{ (!empty($course) AND !empty($course->getCourseDescription->where('language_id',$language->id)->first()))? $course->getCourseDescription->where('language_id',$language->id)->first()->description : '' }}" type="text">
                                </div>
                                <div class="form-group">
                                    <label for="content_{{ $language->key }}"  class="control-label mb-1">تعريف بالمثاق باللغه : {{ $language->name }} </label>
                                    <textarea name="content_{{ $language->key }}"  class="control-label mb-1 form-control" aria-required="true" autocomplete="none" aria-invalid="false">{{ (!empty($course) AND !empty($course->getCourseDescription->where('language_id',$language->id)->first()))? $course->getCourseDescription->where('language_id',$language->id)->first()->content : '' }}</textarea>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="form-group">
                        <label for="price" class="control-label mb-1">السعر</label>
                        <input id="price" name="price" class="form-control" aria-required="true" autocomplete="none"
                               aria-invalid="false" value="{{ empty(old('price'))? !empty($course)?$course->price:''  : old('price') }}" type="number">
                    </div>
                    <div class="form-group">
                        <label for="icon" class="control-label mb-1">الشعار</label>
                        <input id="icon" name="icon" class="form-control" aria-required="true" autocomplete="none"
                               aria-invalid="false" value="{{ empty(old('icon'))? !empty($course)?$course->icon:''  : old('icon') }}" type="text">
                    </div>
                    <div class="form-group">
                        <label for="success_grade" class="control-label mb-1">درجه النجاح</label>
                        <input id="success_grade" name="success_grade" class="form-control" aria-required="true" autocomplete="none"
                               aria-invalid="false" value="{{ empty(old('success_grade'))? !empty($course)?$course->success_grade:''  : old('success_grade') }}" type="number">
                    </div>
                    <div class="form-group">
                        <label for="teacher_id" class="control-label mb-1">ربطه بمعلم </label>
                        <select name="teacher_id" id="teacher_id" class="form-control-sm form-control">
                            <option>اختار </option>
                            @foreach($teachers as $teacher)
                                <option value="{{$teacher->id}}" {{ empty(old('teacher_id'))? (!empty($course) AND $course->teacher_id == $teacher->id)?'selected':''  : 'selected' }}>{{ $teacher->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="category_id" class="control-label mb-1">ربطه بقسم</label>
                        <select name="category_id" id="category_id" class="form-control-sm form-control">
                            <option>اختار </option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}" {{ empty(old('category_id'))? (!empty($course) AND $course->teacher_id == $category->id)?'selected':''  : 'selected' }}>{{ $category->getCategoryDescription->isEmpty()? '': $category->getCategoryDescription->where('language_id',$defaultLanguage->id)->first()->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="feature" class="control-label mb-1">مثاق مميز </label>
                        <select name="feature" id="feature" class="form-control-sm form-control">
                            <option>اختار </option>
                            <option value="0" {{ empty(old('feature'))? (!empty($course) AND $course->feature == '0')?'selected':''  : 'selected' }}>نعم</option>
                            <option value="1" {{ empty(old('feature'))? (!empty($course) AND $course->feature == '1')?'selected':''  : 'selected' }}>لا</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="new" class="control-label mb-1">مثاق جديد </label>
                        <select name="new" id="new" class="form-control-sm form-control">
                            <option>اختار</option>
                            <option value="0" {{ empty(old('new'))? (!empty($course) AND $course->new == '0')?'selected':''  : 'selected' }}>نعم</option>
                            <option value="1" {{ empty(old('new'))? (!empty($course) AND $course->new == '1')?'selected':''  : 'selected' }}>لا</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="certificate" class="control-label mb-1">حصول الطالب علي شهادة </label>
                        <select name="certificate" id="certificate" class="form-control-sm form-control">
                            <option>اختار</option>
                            <option value="0" {{ empty(old('certificate'))? (!empty($course) AND $course->certificate == '0')?'selected':''  : 'selected' }}>نعم</option>
                            <option value="1" {{ empty(old('certificate'))? (!empty($course) AND $course->certificate == '1')?'selected':''  : 'selected' }}>لا</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status" class="control-label mb-1">الحالة </label>
                        <select name="status" id="status" class="form-control-sm form-control">
                            <option>أختار الحالة</option>
                            <option value="0" {{ empty(old('status'))? (!empty($course) AND $course->status == '0')?'selected':''  : 'selected' }}>تعطيل</option>
                            <option value="1" {{ empty(old('status'))? (!empty($course) AND $course->status == '1')?'selected':''  : 'selected' }}>تفعيل</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="order" class="control-label mb-1">الترتيب</label>
                        <input id="order" name="order" class="form-control" aria-required="true" autocomplete="none"
                               aria-invalid="false" value="{{ empty(old('order'))? !empty($course)?$course->order:''  : old('order') }}" type="number">
                    </div>
                    <div class="form-group has-success">
                        <label for="image" class="control-label mb-1">صورة المثاق</label>
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

                    @if(!empty($course->image))
                        <img src="{{ asset($course->image )}}" style="width: 250px; height: 200px;" alt="">
                    @endif
                </form>
            </div>
        </div>
    </div>
@endsection
