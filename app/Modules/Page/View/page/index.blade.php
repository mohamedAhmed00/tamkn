@extends('layout')
@section('content-admin')
    @php
        $page = "page";
        $defaultLanguage = get_default_language();
    @endphp
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('auth.home') }}">الرئيسية</a></li>
                    <li class="breadcrumb-item active" aria-current="page">كل الصفحات</li>
                </ol>
            </nav>
            @can('create', \App\Modules\Page\Model\Page::class)
                <div class="table-data__tool float-lg-right">
                    <div class="table-data__tool-right">
                        <a href="{{ route('auth.page.create') }}"
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
                        @can('update', \App\Modules\Page\Model\Page::class)
                            <th># الصفحة</th>
                        @endcan
                        <th>االاسم</th>
                        <th>الصورة</th>
                        <th>الترتيب</th>
                        <th>الحالة</th>
                        <th>تاريخ الانشاء</th>

                        @can('update', \App\Modules\Page\Model\Page::class)
                            <th class="text-right pr-5">الاحداث</th>
                        @elsecan('delete', \App\Modules\Page\Model\Page::class)
                            <th class="text-right pr-5">الاحداث</th>
                        @endcan
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($pages as $page)
                        <tr class="tr-shadow text-center">
                            @can('update', \App\Modules\Page\Model\Page::class)
                                <td>
                                    <a href="{{ route('auth.page.edit',$page->id) }}">{{ $loop->iteration }}</a>
                                </td>
                            @endcan
                            <td>{{ $page->getPageDescription->isEmpty()? '': $page->getPageDescription->where('language_id',$defaultLanguage->id)->first()->name }}</td>
                            <td class="account-item text-center"><img src="{{ asset($page->image )}}"
                                                                      class="image float-none" alt=""></td>
                            <td><span class="status--process">{{ $page->created_at->diffForHumans() }}</span></td>
                            <td><span class="status--process">{{ $page->order }}</span></td>
                            <td><span class="status--process">{{ $page->status }}</span></td>

                            @if (Auth::user()->can('update', $page) Or Auth::user()->can('delete', $page))
                                <td>
                                    <div class="table-data-feature text-center">
                                        @can('update', \App\Modules\Page\Model\Page::class)
                                            <a href="{{ route('auth.page.edit',$page->id) }}" class="item"
                                               data-toggle="tooltip" data-placement="top" title="تعديل">
                                                <i class="zmdi zmdi-edit"></i>
                                            </a>
                                        @endcan
                                        @can('delete', \App\Modules\Page\Model\Page::class)
                                            <a href="{{ route('auth.page.delete',$page->id) }}"
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
