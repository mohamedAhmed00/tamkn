@extends('layout')
@section('content-admin')
    @php
        $page = "permission";
    @endphp
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">{{ !empty($permission)? 'تعديل الصلاحية' . $permission->name : ' انشاء صلاحية جديدة' }}</div>
            <div class="card-body">
                <form action="{{ !empty($permission)? route('auth.permission.update',$permission->id) : route('auth.permission.store') }}" method="post" novalidate="novalidate" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="control-label mb-1">اسم الصلاحية</label>
                        <input id="name" name="name" class="form-control" aria-required="true" autocomplete="none"
                               aria-invalid="false" value="{{ empty(old('name'))? !empty($permission)?$permission->name:''  : old('name') }}" type="text">
                    </div>

                    <div class="text-center">
                        <button id="payment-button" type="submit" class="btn btn-md btn-info ">
                            <i class="fa fa-lock fa-lg"></i>&nbsp;
                            <span id="payment-button-amount">حفظ</span>
                            <span id="payment-button-sending" style="display:none;">جاري الارسال</span>
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
