@extends('layout')
@section('content-admin')
    @php
        $page = "user";
    @endphp
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">{{ !empty($user)? 'تعديل المستحدم ' . $user->name : 'انشاء مستخدم جديد' }}</div>
            <div class="card-body">
                <form action="{{ !empty($user)? route('auth.user.update',$user->id) : route('auth.user.store') }}" method="post" novalidate="novalidate" enctype="multipart/form-data">
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

                    <div class=" form-group">
                        <div class="col">
                            <label for="role_id" class=" form-control-label">اختار مجموعه المستخدم</label>
                        </div>
                        <div class="col-12">
                            <select name="role_id" id="role_id" class="form-control-md form-control">
                                <option value="0">اختار مجموعة</option>
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}" {{ (!empty(old('role_id')) AND old('role_id') == $role->id) ? 'selected' : (!empty($user) and $user->role_id == $role->id)?'selected':''  }}>{{ $role->name }}</option>
                                @endforeach

                            </select>
                        </div>
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
