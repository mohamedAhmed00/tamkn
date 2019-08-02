@extends('layout')
@section('content-admin')
    @php
        $page = "rolePermission";
    @endphp
    <div class="col-lg-12">
        <div class="card">
            <div
                class="card-header">امنح صلاحيات ل  {{ $role->name }}</div>
            <div class="card-body">
                <form
                    action="{{ route('auth.rolePermission.update',$role->id) }}"
                    method="post" novalidate="novalidate" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col col-md-12">
                            <div class="form-check">
                                @foreach($permissions as $permission)
                                    <div class="checkbox">
                                        <label for="checkbox{{ $permission->id }}" class="form-check-label ">
                                            <input type="checkbox" id="checkbox{{ $permission->id }}"
                                                   {{ ($rolePermissions->where('slug', $permission->slug)->count() == 1)? 'checked' : '' }}
                                                   name="permission[]" value="{{$permission->id}}"
                                                   class="form-check-input">{{ $permission->name }}
                                        </label>
                                    </div>

                                @endforeach
                            </div>
                        </div>
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
