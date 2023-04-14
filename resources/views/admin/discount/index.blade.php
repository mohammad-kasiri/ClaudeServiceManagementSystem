@extends('admin.layout.master' , ['title' => 'لیست کدهای تخفیف'])
@section('title' , 'لیست کدهای تخفیف')

@section('subheader')
    @php
        $buttons = [
            [
                'title'  =>  'افزودن کد تخفیف جدید ' ,
                'icon'   =>  '<i class="fas fa-plus"></i>' ,
                'route'  =>  route('admin.discount.create') ,
                'color'  =>  'btn-light-info'
             ],
        ];
    @endphp
    <x-dashboard.subheader :links='$buttons ?? []' :title="'لیست کدهای تخفیف'" />
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
                        لیست کدهای تخفیف
                    </h3>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive-sm">
                    <table class="table ">
                        <thead>
                        <tr class="text-muted">
                            <th class="text-center">#</th>
                            <th class="text-center">کد</th>
                            <th class="text-center">نوع کد تخفیف</th>
                            <th class="text-center">درصد تخفیف</th>
                            <th class="text-center">محدودیت استفاده</th>
                            <th class="text-center">استفاده شده توسط</th>
                            <th class="text-center">وضعیت</th>
                            <th class="text-center">عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($discounts as $key=>$discount)
                            <tr>
                                <td class="text-center align-middle"> {{ $key+1 }} </td>
                                <td class="text-center align-middle text-nowrap">{{$discount->code}}</td>
                                <td class="text-center align-middle text-nowrap"> {{$discount->type()}} </td>
                                <td class="text-center align-middle text-nowrap">{{$discount->amount()}}</td>
                                <td class="text-center align-middle text-nowrap"> {{$discount->limitation}} </td>
                                <td class="text-center align-middle text-nowrap"> {{$discount->used_by}} </td>
                                <td class="text-center align-middle text-nowrap text-{{$discount->is_active_class()}}"> {{$discount->is_active()}}</td>
                                <td class="text-center align-middle text-nowrap">
                                    <a href="{{route('admin.discount.edit', ['discount' => $discount])}}"  class="btn btn-icon btn-circle btn-sm btn-outline-primary">
                                        <i class="fa fa-pen"></i>
                                    </a>
                                    <a href="{{route('admin.discount.switch_status', ['discount' => $discount])}}"  class="btn btn-icon btn-circle btn-sm btn-outline-warning">
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
