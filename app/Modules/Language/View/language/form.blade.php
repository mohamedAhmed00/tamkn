@extends('layout')
@section('content-admin')
    @php
        $page = "language";
    @endphp
    <div class="col-lg-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('auth.home') }}">الرئيسية</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ !empty($language)? ' تعديل اللغة ' . $language->name : ' انشاء لغة جديد ' }}</li>
            </ol>
        </nav>
        <div class="card">
            <div class="card-body">
                <form action="{{ !empty($language)? route('auth.language.update',$language->id) : route('auth.language.store') }}" method="post" novalidate="novalidate" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="control-label mb-1">اسم اللغة </label>
                        <input id="name" name="name" class="form-control" aria-required="true" autocomplete="none"
                               aria-invalid="false" value="{{ empty(old('name'))? !empty($language)?$language->name:''  : old('name') }}" type="text">
                    </div>
                    <div class="form-group">
                        <label for="key" class="control-label mb-1">الكود </label>
                        <input id="key" name="key" class="form-control" aria-required="true" autocomplete="none"
                               aria-invalid="false" value="{{ empty(old('key'))? !empty($language)?$language->key:''  : old('key') }}" type="text">
                    </div>
                    <div class="form-group">
                        <label for="dir" class="control-label mb-1">الحالة </label>
                        <select name="dir" id="dir" class="form-control-sm form-control">
                            <option>أختار الحالة</option>
                            <option value="ltr" {{ empty(old('dir'))? (!empty($language) AND $language->dir == 'ltr')?'selected':''  : 'selected' }}>يسار الي اليمين</option>
                            <option value="rtl" {{ empty(old('dir'))? (!empty($language) AND $language->dir == 'rtl')?'selected':''  : 'selected' }}>اليمين الي اليسار</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="default" class="control-label mb-1">لغه افتراضية </label>
                        <select name="default" id="default" class="form-control-sm form-control">
                            <option>أختار لغه افتراضية</option>
                            <option value="0" {{ empty(old('default'))? (!empty($language) AND $language->default == '0')?'selected':''  : 'selected' }}>غير افتراضية</option>
                            <option value="1" {{ empty(old('default'))? (!empty($language) AND $language->default == '1')?'selected':''  : 'selected' }}>الافتراضية</option>
                        </select>
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


