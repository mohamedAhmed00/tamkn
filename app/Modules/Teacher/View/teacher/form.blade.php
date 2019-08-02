@extends('layout')
@section('content-admin')
    @php
        $page = "teacher";
    @endphp
    <div class="col-lg-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('auth.home') }}">الرئيسية</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ !empty($teacher)? ' تعديل المعلم ' . $teacher->name : ' انشاء معلم جديد ' }}</li>
            </ol>
        </nav>
        <div class="card">
            <div class="card-body">
                <form action="{{ !empty($teacher)? route('auth.teacher.update',$teacher->id) : route('auth.teacher.store') }}" method="post" novalidate="novalidate" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="control-label mb-1">اسم المعلم </label>
                        <input id="name" name="name" class="form-control" aria-required="true" autocomplete="none"
                               aria-invalid="false" value="{{ empty(old('name'))? !empty($teacher)?$teacher->name:''  : old('name') }}" type="text">
                    </div>
                    <div class="form-group">
                        <label for="job" class="control-label mb-1">الوظيفة </label>
                        <input id="job" name="job" class="form-control" aria-required="true" autocomplete="none"
                               aria-invalid="false" value="{{ empty(old('job'))? !empty($teacher)?$teacher->job:''  : old('job') }}" type="text">
                    </div>
                    <div class="form-group">
                        <label for="email" class="control-label mb-1">البريد الالكتروني </label>
                        <input id="email" name="email" class="form-control" aria-required="true" autocomplete="none"
                               aria-invalid="false" value="{{ empty(old('email'))? !empty($teacher)?$teacher->email:''  : old('email') }}" type="text">
                    </div>

                    <div class="form-group">
                        <label for="phone_number" class="control-label mb-1">رقم الجوال </label>
                        <input id="phone_number" name="phone_number" class="form-control" aria-required="true" autocomplete="none"
                               aria-invalid="false" value="{{ empty(old('phone_number'))? !empty($teacher)?$teacher->phone_number:''  : old('phone_number') }}" type="text">
                    </div>

                    <div class="form-group">
                        <label for="address" class="control-label mb-1">العنوان </label>
                        <input id="address" name="address" class="form-control" aria-required="true" autocomplete="none"
                               aria-invalid="false" value="{{ empty(old('address'))? !empty($teacher)?$teacher->address:''  : old('address') }}" type="text">
                    </div>
                    <div class="form-group">
                        <label for="facebook" class="control-label mb-1">الفيس بوك </label>
                        <input id="facebook" name="facebook" class="form-control" aria-required="true" autocomplete="none"
                               aria-invalid="false" value="{{ empty(old('facebook'))? !empty($teacher)?$teacher->facebook:''  : old('facebook') }}" type="text">
                    </div>
                    <div class="form-group">
                        <label for="twitter" class="control-label mb-1">تويتر </label>
                        <input id="twitter" name="twitter" class="form-control" aria-required="true" autocomplete="none"
                               aria-invalid="false" value="{{ empty(old('twitter'))? !empty($teacher)?$teacher->twitter:''  : old('twitter') }}" type="text">
                    </div>
                    <div class="form-group">
                        <label for="instagram" class="control-label mb-1">انستغرام </label>
                        <input id="instagram" name="instagram" class="form-control" aria-required="true" autocomplete="none"
                               aria-invalid="false" value="{{ empty(old('instagram'))? !empty($teacher)?$teacher->instagram:''  : old('instagram') }}" type="text">
                    </div>
                    <div class="form-group">
                        <label for="linkedin" class="control-label mb-1">لينكدان </label>
                        <input id="linkedin" name="linkedin" class="form-control" aria-required="true" autocomplete="none"
                               aria-invalid="false" value="{{ empty(old('linkedin'))? !empty($teacher)?$teacher->linkedin:''  : old('linkedin') }}" type="text">
                    </div>
                    <div class="form-group">
                        <label for="instagram" class="control-label mb-1">العنوان </label>
                        <input id="instagram" name="instagram" class="form-control" aria-required="true" autocomplete="none"
                               aria-invalid="false" value="{{ empty(old('instagram'))? !empty($teacher)?$teacher->instagram:''  : old('instagram') }}" type="text">
                    </div>

                    <div class="form-group">
                        <label for="order" class="control-label mb-1">الترتيب </label>
                        <input id="order" name="order" class="form-control" aria-required="true" autocomplete="none"
                               aria-invalid="false" value="{{ empty(old('order'))? !empty($teacher)?$teacher->order:'0'  : old('order') }}" type="text">
                    </div>
                    <div class="form-group">
                        <label for="status" class="control-label mb-1">الحالة </label>
                        <select name="status" id="status" class="form-control-sm form-control">
                            <option>أختار الحالة</option>
                            <option value="1" {{ empty(old('status'))? !empty($teacher)?'selected':''  : 'selected' }}>نشر</option>
                            <option value="0" {{ empty(old('status'))? !empty($teacher)?'selected':''  : 'selected' }}>معلق</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="cv_description" class="control-label my-2">وصف السيرة الذاتية </label>
                        <textarea name="cv_description"  id="cv_description">{{ empty(old('cv_description'))? !empty($teacher)?$teacher->cv_description:''  : old('cv_description') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="work_experience" class="control-label my-2">خبرات المعلم </label>
                        <textarea name="work_experience"  id="work_experience">{{ empty(old('work_experience'))? !empty($teacher)?$teacher->work_experience:''  : old('work_experience') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="study_description" class="control-label my-2">دراسات المعلم</label>
                        <textarea name="study_description"  id="study_description">{{ empty(old('study_description'))? !empty($teacher)?$teacher->study_description:''  : old('study_description') }}</textarea>
                    </div>
                    <div class="form-group has-success">
                        <label for="image" class="control-label mb-1">صورة المعلم</label>
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

                    @if(!empty($teacher->image))
                        <img src="{{ asset($teacher->image )}}" style="width: 250px; height: 200px;" alt="">
                    @endif
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.ckeditor.com/ckeditor5/12.2.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#cv_description' ) )
            .then( editor => {
                console.log( editor );
            } )
            .catch( error => {
                console.error( error );
            } );

        ClassicEditor
            .create( document.querySelector( '#work_experience' ) )
            .then( editor => {
                console.log( editor );
            } )
            .catch( error => {
                console.error( error );
            } );

        ClassicEditor
            .create( document.querySelector( '#study_description' ) )
            .then( editor => {
                console.log( editor );
            } )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection


