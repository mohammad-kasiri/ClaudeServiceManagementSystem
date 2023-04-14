@extends('admin.layout.master' , ['title' => 'لیست اکانت ها'])
@section('title' , 'لیست اکانت ها')

@section('subheader')
    <x-dashboard.subheader :links='$buttons ?? []' :title="'لیست اکانت'" />
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
                            لیست اکانت ها
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive-sm">
                        <table class="table ">
                            <thead>
                            <tr class="text-muted">
                                <th class="text-center">#</th>
                                <th class="text-center">سرور</th>
                                <th class="text-center">port</th>
                                <th class="text-center">کاربر</th>
                                <th class="text-center">تاریخ ایجاد</th>
                                <th class="text-center">تاریخ انقضا</th>
                                <th class="text-center">ترافیک</th>
                                <th class="text-center">وضعیت</th>
                                <th class="text-center">عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($accounts as $key=>$account)
                                <tr>
                                    <td class="text-center align-middle"> {{\App\Functions\PaginationCounter::item($accounts , $key)}} </td>
                                    <td class="text-center align-middle text-nowrap"> {{$account->server->display_address()}}</td>
                                    <td class="text-center align-middle">{{$account->xui_port}}</td>
                                    <td class="text-center align-middle">{{$account->user->name}}</td>
                                    <td class="text-center align-middle">{{$account->created_at()}}</td>
                                    <td class="text-center align-middle">{{$account->expire_at()}}</td>
                                    <td class="text-center align-middle">{{$account->xui_traffic}} GB</td>
                                    <td class="text-center align-middle">{{$account->status}}</td>

                                    <td class="text-center align-middle text-nowrap">
                                        <a href="{{route('admin.account.switch_status' , $account)}}"
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
                {{$accounts->render()}}
            </div>
        </div>
        <!--end::Container-->
@endsection
