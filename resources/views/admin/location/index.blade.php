@extends('admin.layout.master' , ['title' => 'لیست مکان ها'])
@section('title' , 'لیست مکان ها')

@section('subheader')
    <x-dashboard.subheader :links='[]' :title="'لیست مکان ها'" />
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
                        لیست مکان ها
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
                            <th class="text-center">نام</th>
                            <th class="text-center">وضعیت</th>
                            <th class="text-center">عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($locations as $key=>$location)
                            <tr>
                                <td class="text-center align-middle"> {{ $key+1 }} </td>
                                <td class="text-center align-middle text-nowrap">
                                    <img src="{{asset($location->image)}}" class="img-fluid" width="56px" >
                                </td>
                                <td class="text-center align-middle text-nowrap"> {{$location->title}}</td>
                                <td class="text-center align-middle text-nowrap text-{{$location->is_active_class()}}">
                                    {{$location->is_active()}}
                                </td>

                                <td class="text-center align-middle text-nowrap">
                                    <a href="{{route('admin.location.switch_status', ['location' => $location])}}"  class="btn btn-icon btn-circle btn-sm btn-outline-warning">
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
