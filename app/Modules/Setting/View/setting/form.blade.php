@extends('layout')
@section('content-admin')
    @php
        $page = "setting";
    @endphp
    <div class="col-lg-12">
        <div class="card">
            <div
                class="card-header">{{ !empty($setting)? 'تعديل  : ' . $setting->name : 'انشاء جديد' }}</div>
            <div class="card-body">
                <form
                    action="{{ !empty($setting)? route('auth.setting.update',$setting->id) : route('auth.setting.store') }}"
                    method="post" novalidate="novalidate" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="key" class="control-label mb-1">الاسم</label>
                        <input id="key" name="key" class="form-control" aria-required="true" autocomplete="none"
                               aria-invalid="false"
                               {{ !empty($setting)? 'disabled':'' }}  value="{{ empty(old('key'))? !empty($setting)?$setting->key:''  : old('key') }}"
                               type="text">
                    </div>

                    <div class="form-group has-success">
                        <label for="image" class="control-label mb-1">اختار النوع</label>
                        <div>
                            <label for="text">نص</label>
                            <input type="radio" id="text" class="select_type"
                                   {{ (!empty($setting) AND  $setting->type == "text" )? 'checked' : ''  }} name="type"
                                   value="text"/>
                            أو
                            <label for="image">صورة</label>
                            <input type="radio" id="image" class="select_type"
                                   {{ (!empty($setting) AND  $setting->type == "image" )? 'checked' : ''  }} name="type"
                                   value="image"/>
                        </div>

                    </div>

                    <input type="hidden" name="setting_type" value="{{ (!empty($setting)) ? ($setting->type =="image")? 'image' : 'text' : ''  }}" id="setting_type">
                    <div
                        class='col-md-12 text select_type_item {{ (!empty($setting) AND  $setting->type == "text" )? '' : 'd-none'  }}'>
                        <div class='form-group'>
                            <label>القيمة</label>
                            <input class="form-control"
                                   value="{{ empty(old('value'))? (!empty($setting) AND $setting->type == 'text')? $setting->value:''  : old('value') }}"
                                   id="Value" name="value" type="text" placeholder="القيمة"/>
                        </div>
                    </div>
                    <div
                        class='form-group image select_type_item {{ (!empty($setting) AND  $setting->type == "image" )? '' : 'd-none'  }} '>
                        <div class="col-xs-6">
                            <label>ارفع صورة</label>
                            <input id="image" name="value" class="form-control"
                                   autocomplete="none" aria-required="true" aria-invalid="false"
                                   aria-describedby="image" type="file">
                        </div>
                        @if(!empty($setting->value) AND $setting->type == "image")
                            <br>
                            <div class="col">
                                <img class="member-online img-rounded" style="width: 100px;height: 100px;"
                                     src="{{ empty(old('value'))? isset($setting)?asset($setting->value):''  : old('value') }}"
                                     alt="Setting Image">
                            </div>
                        @endif
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
@section('script')
    <script>
        $('.select_type').on('change', function (e) {
            $('.select_type_item').addClass('d-none');
            let selector = $(this).val();
            $('.' + selector).removeClass('d-none');
            $("#setting_type").val(selector);
        });
    </script>
@endsection
