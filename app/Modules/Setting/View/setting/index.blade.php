@extends('layout')
@section('content-admin')
    @php
        $page = "setting";
    @endphp
    <div class="row">
        <div class="col-md-12">
            <!-- DATA TABLE -->
            <h3 class="title-5 m-b-35">كل الاعدادات</h3>
            @can('create', \App\Modules\Setting\Model\Setting::class)
                <div class="table-data__tool float-lg-right">
                    <div class="table-data__tool-right">
                        <a href="{{ route('auth.setting.create') }}" class="au-btn au-btn-icon au-btn--green au-btn--small">
                            <i class="zmdi zmdi-plus"></i> اضافة جديد
                        </a>
                    </div>
                </div>            @endcan
            <div class="table-responsive table-responsive-data2">

                <table class="table table-data2">
                    <thead>
                    <tr class="text-center">
                        @can('update', \App\Modules\Setting\Model\Setting::class)
                            <th># ضبط</th>
                        @endcan
                        <th>الاسم</th>
                        <th>القيمه</th>
                        <th>تاريخ الانشاء</th>
                        @can('update', \App\Modules\Setting\Model\Setting::class)
                            <th class="text-right pr-5">الاحداث</th>
                        @elsecan('delete', \App\Modules\Setting\Model\Setting::class)
                            <th class="text-right pr-5">الاحداث</th>
                        @endcan
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($settings as $setting)
                        <tr class="tr-shadow text-center">
                            @can('update', \App\Modules\Setting\Model\Setting::class)
                                <td><a href="{{ route('auth.setting.edit',$setting->id) }}">{{ $loop->iteration }}</a></td>
                            @endcan
                            <td>{{ $setting->key }}</td>
                            <td class="account-item text-center">
                                @if($setting->type == "image")
                                    <img src="{{ asset($setting->value)}}" class="image float-none" alt="">
                                @else
                                    {{ $setting->value }}
                                @endif
                            </td>
                            <td><span class="status--process">{{ $setting->created_at->diffForHumans() }}</span></td>
                            @if (Auth::user()->can('update', $setting) Or Auth::user()->can('delete', $setting))
                                <td>
                                    <div class="table-data-feature text-center">
                                        @can('update', \App\Modules\Setting\Model\Setting::class)
                                            <a href="{{ route('auth.setting.edit',$setting->id) }}" class="item" data-toggle="tooltip" data-placement="top" title="تعديل">
                                                <i class="zmdi zmdi-edit"></i>
                                            </a>
                                        @endcan
                                        @can('delete', \App\Modules\Setting\Model\Setting::class)
                                                <a href="{{ route('auth.setting.delete',$setting->id) }}" class="item delete" data-toggle="tooltip" data-placement="top" title="حذف">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </a>
                                        @endcan
                                    </div>
                                </td>
                            @endif
                        </tr>
                        <tr class="spacer"></tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- END DATA TABLE -->
        </div>
    </div>

@endsection

@section('script')
    <script>
        $(".delete").on("click", function(){
            return confirm("هل تريد حقا حذف هذا العنصر ؟");
        });
    </script>
@endsection
