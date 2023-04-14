@extends('admin.layout.master' , ['title' => 'لیست کاربر ها'])
@section('title' , 'لیست کاربر ها')

@section('subheader')
    <x-dashboard.subheader :links='$buttons ?? []' :title="'لیست کاربر'" />
@endsection

@section('content')
        <!--begin::Container-->
        <div class=" container ">
            @if(\Illuminate\Support\Facades\Session::has('message'))
                @include('admin.layout.alert')
            @endif
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header flex-wrap border-0 pt-6 pb-0">
                    <div class="card-title">
                        <h3 class="card-label">
                            لیست کاربر ها
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive-sm">
                        <table class="table ">
                            <thead>
                            <tr class="text-muted">
                                <th class="text-center">#</th>
                                <th class="text-center">نام</th>
                                <th class="text-center">ایمیل</th>
                                <th class="text-center">تاریخ ثبت نام</th>
                                <th class="text-center">آخرین ورود</th>
                                <th class="text-center">وضعیت</th>
                                <th class="text-center">عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $key=>$user)
                                <tr>
                                    <td class="text-center align-middle"> {{\App\Functions\PaginationCounter::item($users , $key)}} </td>
                                    <td class="text-center align-middle text-nowrap"> {{$user->name}}</td>
                                    <td class="text-center align-middle">{{$user->email}}</td>
                                    <td class="text-center align-middle">{{$user->created_at()}}</td>
                                    <td class="text-center align-middle">{{$user->login_at()}}</td>
                                    @if($user->is_active)
                                        <td class="text-center align-middle text-nowrap text-success"> فعال </td>
                                    @else
                                        <td class="text-center align-middle text-nowrap text-danger"> غیر فعال </td>
                                    @endif
                                    <td class="text-center align-middle text-nowrap">
                                        <a href="{{route('admin.user.switch_status' , $user)}}"
                                           class="btn btn-icon btn-circle btn-sm btn-outline-warning"
                                           data-container="body"
                                           data-delay="500"
                                           data-toggle="popover"
                                           data-placement="top"
                                           data-content="تغییر وضعیت">
                                            <i class="fas fa-sync-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--end::Card-->
            <div class="text-center mt-5">
                {{$users->render()}}
            </div>
        </div>
        <!--end::Container-->
@endsection
