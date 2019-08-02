@extends('layout')
@section('content-admin')
    @php
        $page = "role";
    @endphp
    <div class="row">
        <div class="col-md-12">
            <!-- DATA TABLE -->
            <h3 class="title-5 m-b-35">مجموعات المستخدمين</h3>
            <div class="table-data__tool float-lg-right">
                <div class="table-data__tool-right">
                    <a href="{{ route('auth.role.create') }}" class="au-btn au-btn-icon au-btn--green au-btn--small">
                        <i class="zmdi zmdi-plus"></i>انشاء مجموعة
                    </a>
                </div>
            </div>
            <div class="table-responsive table-responsive-data2">

                <table class="table table-data2">
                    <thead>
                    <tr class="text-center">
                        <th># المجموعة</th>
                        <th>الاسم</th>
                        <th>اختصار</th>
                        <th>توجية</th>
                        <th>تاريخ الانشاء</th>
                        <th class="text-right pr-5">الاحداث</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($roles as $role)
                        <tr class="tr-shadow text-center">
                            <td><a href="{{ route('auth.role.edit',$role->id) }}">{{ $loop->iteration }}</a></td>
                            <td>{{ $role->name }}</td>
                            <td><span class="status--denied">{{ $role->slug }}</span></td>
                            <td><span class="status--process">{{ $role->redirect }}</span></td>
                            <td><span class="status--process">{{ $role->created_at->diffForHumans() }}</span></td>
                            <td>
                                <div class="table-data-feature text-center">
                                    <a href="{{ route('auth.role.edit',$role->id) }}" class="item" data-toggle="tooltip" data-placement="top" title="تعديل">
                                        <i class="zmdi zmdi-edit"></i>
                                    </a>
                                    <a href="{{ route('auth.role.delete',$role->id) }}" class="item delete" data-toggle="tooltip" data-placement="top" title="حذف">
                                        <i class="zmdi zmdi-delete"></i>
                                    </a>
                                </div>
                            </td>
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
        $(".delete").on("click", function(){
            return confirm("هل تريد حقا حذف هذا العنصر ؟");
        });
    </script>
@endsection
