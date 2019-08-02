@extends('layout')
@section('content-admin')
    @php
        $page = "user";
    @endphp
    <div class="row">
        <div class="col-md-12">
            <!-- DATA TABLE -->
            <h3 class="title-5 m-b-35">كل المستخدمين</h3>

            @can('create', \App\Modules\User\Model\User::class)
                <div class="table-data__tool float-lg-right">
                    <div class="table-data__tool-right">
                        <a href="{{ route('auth.user.create') }}" class="au-btn au-btn-icon au-btn--green au-btn--small">
                            <i class="zmdi zmdi-plus"></i> اضافة مستخدم جديد
                        </a>
                    </div>
                </div>
            @endcan
            <div class="table-responsive table-responsive-data2">

                <table class="table table-data2">
                    <thead>
                    <tr class="text-center">
                        @can('update', \App\Modules\User\Model\User::class)
                            <th># المستخدم</th>
                        @endcan
                        <th>الاسم</th>
                        <th>الصورة</th>
                        <th>اسم الحساب</th>
                        <th>البريد الالكتروني</th>
                        <th>السن</th>
                        <th>رقم الهاتف</th>
                        <th>تاريخ الانشاء</th>
                            @can('update', \App\Modules\User\Model\User::class)
                                <th class="text-right pr-5">الاحداث</th>
                            @elsecan('delete', \App\Modules\User\Model\User::class)
                                <th class="text-right pr-5">الاحداث</th>
                            @endcan                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr class="tr-shadow text-center">
                            @can('update', \App\Modules\User\Model\User::class)
                                <td><a href="{{ route('auth.user.edit',$user->id) }}">{{ $loop->iteration }}</a></td>
                            @endcan
                            <td>{{ $user->name }}</td>
                            <td class="account-item text-center"><img src="{{ asset($user->image )}}"
                                                                      class="image float-none" alt=""></td>
                            <td><span class="status--process">{{ $user->username }}</span></td>
                            <td><span class="status--process">{{ $user->email }}</span></td>
                            <td><span class="status--process">{{ $user->age }}</span></td>
                            <td><span class="status--process">{{ $user->phone_number }}</span></td>
                            <td><span class="status--process">{{ $user->created_at->diffForHumans() }}</span></td>

                            @if (Auth::user()->can('update', $user) Or Auth::user()->can('delete', $user))
                                <td>
                                    <div class="table-data-feature text-center">
                                        @can('update', \App\Modules\User\Model\User::class)
                                            <a href="{{ route('auth.user.edit',$user->id) }}" class="item"
                                               data-toggle="tooltip" data-placement="top" title="تعديل">
                                                <i class="zmdi zmdi-edit"></i>
                                            </a>
                                        @endcan
                                        @can('delete', \App\Modules\User\Model\User::class)
                                            <a href="{{ route('auth.user.delete',$user->id) }}" class="item delete"
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
            return confirm("هل تريد حقا حذف هذا العنصر ؟");
        });
    </script>
@endsection
