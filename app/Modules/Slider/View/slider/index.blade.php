@extends('layout')
@section('content-admin')
    @php
        $page = "slider";
        $defaultLanguage = get_default_language();
    @endphp
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('auth.home') }}">الرئيسية</a></li>
                    <li class="breadcrumb-item active" aria-current="slider">كل عدادات الصور</li>
                </ol>
            </nav>
            @can('create', \App\Modules\Slider\Model\Slider::class)
                <div class="table-data__tool float-lg-right">
                    <div class="table-data__tool-right">
                        <a href="{{ route('auth.slider.create') }}"
                           class="au-btn au-btn-icon au-btn--green au-btn--small">
                            <i class="zmdi zmdi-plus"></i>اضافة
                        </a>
                    </div>
                </div>
            @endcan


            <div class="table-responsive table-responsive-data2">

                <table class="table table-data2">
                    <thead>
                    <tr class="text-center">
                        @can('update', \App\Modules\Slider\Model\Slider::class)
                            <th># الصفحة</th>
                        @endcan
                        <th>االاسم</th>
                        <th>المفتاح</th>
                        <th>عرض العناصر</th>
                        <th>الحالة</th>
                        <th>تاريخ الانشاء</th>

                        @can('update', \App\Modules\Slider\Model\Slider::class)
                            <th class="text-right pr-5">الاحداث</th>
                        @elsecan('delete', \App\Modules\Slider\Model\Slider::class)
                            <th class="text-right pr-5">الاحداث</th>
                        @endcan
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($sliders as $slider)
                        <tr class="tr-shadow text-center">
                            @can('update', \App\Modules\Slider\Model\Slider::class)
                                <td>
                                    <a href="{{ route('auth.slider.edit',$slider->id) }}">{{ $loop->iteration }}</a>
                                </td>
                            @endcan
                            <td>{{ $slider->getSliderDescription->isEmpty()? '': $slider->getSliderDescription->where('language_id',$defaultLanguage->id)->first()->name }}</td>
                            <td>{{ $slider->key }}</td>
                            <td><a href="{{ route('auth.slider.item.index',$slider->id) }}">عرض العناصر</a></td>
                            <td><span class="status--process">{{ $slider->status }}</span></td>
                            <td><span class="status--process">{{ $slider->created_at->diffForHumans() }}</span></td>
                            @if (Auth::user()->can('update', $slider) Or Auth::user()->can('delete', $slider))
                                <td>
                                    <div class="table-data-feature text-center">
                                        @can('update', \App\Modules\Slider\Model\Slider::class)
                                            <a href="{{ route('auth.slider.edit',$slider->id) }}" class="item"
                                               data-toggle="tooltip" data-placement="top" title="تعديل">
                                                <i class="zmdi zmdi-edit"></i>
                                            </a>
                                        @endcan
                                        @can('delete', \App\Modules\Slider\Model\Slider::class)
                                            <a href="{{ route('auth.slider.delete',$slider->id) }}"
                                               class="item delete"
                                               data-toggle="tooltip" data-placement="top" title="حذف">
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

@section('delete-script')
    <script>
        $(".delete").on("click", function () {
            return confirm("هل تريد حذف هذا العنصر ؟");
        });
    </script>
@endsection
