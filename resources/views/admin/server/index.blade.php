@extends('admin.layout.master' , ['title' => 'لیست سرور های موجود'])
@section('title' , 'لیست سرور های موجود')

@section('subheader')
    @php
        $buttons = [
            [
                'title'  =>  'افزودن سرور جدید ' ,
                'icon'   =>  '<i class="fas fa-plus"></i>' ,
                'route'  =>  route('admin.server.create') ,
                'color'  =>  'btn-light-info'
             ],
        ];
    @endphp
    <x-dashboard.subheader :links='$buttons ?? []' :title="'لیست سرور های موجود'" />
@endsection

@section('content')
    <!--begin::Container-->
    <div class=" container ">
        <!--begin::Notice-->
        @if(\Illuminate\Support\Facades\Session::has('message'))
            @include('admin.layout.alert')
        @endif
        <!--end::Notice-->

        <!--begin::Card-->
        <div class="card card-custom">
            <div class="card-header flex-wrap border-0 pt-6 pb-0">
                <div class="card-title">
                    <h3 class="card-label">
                        لیست سرور های موجود
                    </h3>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive-sm">
                    <table class="table ">
                        <thead>
                        <tr class="text-muted">
                            <th class="text-center">#</th>
                            <th class="text-center">پرچم</th>
                            <th class="text-center">کشور</th>
                            <th class="text-center">آدرس</th>
                            <th class="text-center">یوزرنیم</th>
                            <th class="text-center">پسورد</th>
                            <th class="text-center">وضعیت</th>
                            <th class="text-center">ظرفیت</th>
                            <th class="text-center">رنج پورت</th>
                            <th class="text-center">حرفی حدیثی</th>
                            <th class="text-center">عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($servers as $key=>$server)
                            <tr>
                                <td class="text-center align-middle"> {{ $key+1 }} </td>
                                <td class="text-center align-middle text-nowrap">
                                    <img src="{{asset($server->location->image)}}" class="img-fluid" width="50px"><br>
                                </td>
                                <td class="text-center align-middle text-nowrap">
                                    {{$server->location->title}}
                                </td>
                                <td class="text-center align-middle text-nowrap">
                                    <a href="{{$server->full_address()}}" target="_blank">
                                        {{$server->display_address()}}
                                         
                                        <i class="fas fa-external-link-alt fa-sm"></i>
                                    </a>
                                </td>
                                <td class="text-center align-middle text-nowrap"> {{$server->user}}</td>
                                <td class="text-center align-middle text-nowrap"> {{$server->pass}}</td>
                                <td class="text-center align-middle text-nowrap text-{{$server->is_active_class()}}"> {{$server->is_active()}}</td>
                                <td class="text-center align-middle text-nowrap"> {{$server->capacity()}} </td>
                                <td class="text-center align-middle text-nowrap"> {{$server->min_port.'-'.$server->max_port}} </td>
                                <td class="text-center align-middle text-nowrap">
                                    <button class="btn btn-outline-primary"
                                            data-container="body"
                                            data-delay="500"
                                            data-toggle="popover"
                                            data-placement="top"
                                            data-content="{{$server->description}}">توضیحات</button>
                                </td>
                                <td class="text-center align-middle text-nowrap">
                                    <a href="{{route('admin.server.edit', ['server' => $server])}}"  class="btn btn-icon btn-circle btn-sm btn-outline-primary">
                                        <i class="fa fa-pen"></i>
                                    </a>
                                    <a href="{{route('admin.server.switch_status', ['server' => $server])}}"  class="btn btn-icon btn-circle btn-sm btn-outline-warning">
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
    </div>
    <!--end::Container-->
@endsection
