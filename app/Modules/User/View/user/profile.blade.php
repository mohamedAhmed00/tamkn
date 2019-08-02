@extends('layout')
@section('content-admin')
    @php
        $page = "user";
    @endphp
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">تعديل ملفك الشخصي</div>
            <div class="card-body">
                <form action="{{ route('auth.user.profile',$user->id)}} " method="post" novalidate="novalidate" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="control-label mb-1">اسم المستخدم</label>
                        <input id="name" name="name" class="form-control" aria-required="true" autocomplete="none"
                               aria-invalid="false" value="{{ empty(old('name'))? !empty($user)?$user->name:''  : old('name') }}" type="text">
                    </div>
                    <div class="form-group">
                        <label for="username" class="control-label mb-1">اسم الحساب ( لابد ان لا يتكرر )</label>
                        <input id="username" name="username" class="form-control" aria-required="true" autocomplete="none"
                               aria-invalid="false" value="{{ empty(old('username'))? !empty($user)?$user->username:''  : old('username') }}" type="text">
                    </div>
                    <div class="form-group">
                        <label for="email" class="control-label mb-1">البريد الالكتروني ( لابد ان لا يتكرر )</label>
                        <input id="email" name="email" class="form-control" aria-required="true" autocomplete="none"
                               aria-invalid="false" value="{{ empty(old('email'))? !empty($user)?$user->email:''  : old('email') }}" type="email">
                    </div>
                    <div class="form-group">
                        <label for="phone_number" class="control-label mb-1">رقم الهاتف ( لابد ان لا يتكرر )</label>
                        <input id="phone_number" name="phone_number" class="form-control" aria-required="true" autocomplete="none"
                               aria-invalid="false" value="{{ empty(old('phone_number'))? !empty($user)?$user->phone_number:''  : old('phone_number') }}" type="number">
                    </div>
                    <div class="form-group">
                        <label for="password" class="control-label mb-1">الرقم السري </label>
                        <input id="password" name="password" class="form-control" aria-required="true" autocomplete="none"
                               aria-invalid="false" type="password">
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation" class="control-label mb-1">تاكيد الرقم السري </label>
                        <input id="password_confirmation" name="password_confirmation" class="form-control" aria-required="true" autocomplete="none"
                               aria-invalid="false" type="password">
                    </div>
                    <div class="form-group">
                        <label for="age" class="control-label mb-1">السن </label>
                        <input id="age" name="age" class="form-control" aria-required="true" autocomplete="none"
                               aria-invalid="false" value="{{ empty(old('age'))? !empty($user)?$user->age:''  : old('age') }}" type="number">
                    </div>


                    <div class="form-group has-success">
                        <label for="image" class="control-label mb-1">صورة المستخدم</label>
                        <input id="image" name="image" class="form-control"
                               autocomplete="none" aria-required="true" aria-invalid="false" aria-describedby="image" type="file">
                    </div>
                    <div class="text-center">
                        <button id="payment-button" type="submit" class="btn btn-md btn-info ">
                            <i class="fa fa-lock fa-lg"></i>&nbsp;
                            <span id="payment-button-amount">احفظ</span>
                            <span id="payment-button-sending" style="display:none;">جاري الأرسال</span>
                        </button>
                    </div>
                    @if(!empty($user->image))
                        <img src="{{ asset($user->image )}}" style="width: 250px; height: 200px;" alt="">
                    @endif
                </form>
            </div>
        </div>
    </div>
@endsection
