@extends('admin.layout.master' , ['title' => 'لیست پلن های موجود'])
@section('title' , 'لیست پلن های موجود')

@section('subheader')
    @php
        $buttons = [
            [
                'title'  =>  'افزودن پلن جدید ' ,
                'icon'   =>  '<i class="fas fa-plus"></i>' ,
                'route'  =>  route('admin.plan.create') ,
                'color'  =>  'btn-light-info'
             ],
        ];
    @endphp
    <x-dashboard.subheader :links='$buttons ?? []' :title="'لیست پلن های موجود'" />
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
                        لیست پلن های موجود
                    </h3>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive-sm">
                    <table class="table ">
                        <thead>
                        <tr class="text-muted">
                            <th class="text-center">#</th>
                            <th class="text-center">کشور</th>
                            <th class="text-center">مکان</th>
                            <th class="text-center">بازه زمان</th>
                            <th class="text-center">ترافیک</th>
                            <th class="text-center">قیمت برای مصرف کننده</th>
                            <th class="text-center">وضعیت</th>
                            <th class="text-center">عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($plans as $key=>$plan)
                            <tr>
                                <td class="text-center align-middle"> {{ $key+1 }} </td>
                                <td class="text-center align-middle text-nowrap">
                                    <img src="  {{$plan->location->image}}" class="img-fluid rounded" width="54px">
                                </td>
                                <td class="text-center align-middle text-nowrap"> {{$plan->location->title}}</td>
                                <td class="text-center align-middle text-nowrap"> {{$plan->period->title}}</td>
                                <td class="text-center align-middle text-nowrap"> {{$plan->traffic->title}}</td>
                                <td class="text-center align-middle text-nowrap"> {{$plan->price()}} تومان</td>
                                <td class="text-center align-middle text-nowrap text-{{$plan->is_active_class()}}"> {{$plan->is_active()}}</td>

                                <td class="text-center align-middle text-nowrap">
                                    <a href="{{route('admin.plan.edit', ['plan' => $plan])}}"  class="btn btn-icon btn-circle btn-sm btn-outline-primary">
                                        <i class="fa fa-pen"></i>
                                    </a>
{{--                                    <a href="{{route('admin.plan.switch_status', ['plan' => $plan])}}"  class="btn btn-icon btn-circle btn-sm btn-outline-warning">--}}
{{--                                        <i class="fas fa-sync-alt"></i>--}}
{{--                                    </a>--}}
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
