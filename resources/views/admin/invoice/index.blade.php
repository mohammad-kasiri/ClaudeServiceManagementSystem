@extends('admin.layout.master' , ['title' => 'لیست صورتحساب ها'])
@section('title' , 'لیست صورتحساب ها')

@section('subheader')
    <x-dashboard.subheader :links='[]' :title="'لیست رسیدها'" />
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
                        لیست رسیدها
                    </h3>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive-sm">
                    <table class="table ">
                        <thead>
                        <tr class="text-muted">
                            <th class="text-center">#</th>
                            <th class="text-center">اشتراک</th>
                            <th class="text-center">حجم</th>
                            <th class="text-center">مبلغ </th>
                            <th class="text-center">وضعیت </th>
                            <th class="text-center">تاریخ پرداخت</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($invoices as $key=>$invoice)
                            <tr>
                                <td class="text-center align-middle"> {{ $key+1 }} </td>
                                <td class="text-center align-middle"> {{ $invoice->plan->location->title }} - {{$invoice->period->title}}</td>
                                <td class="text-center align-middle"> {{ $invoice->traffic->title }}</td>
                                <td class="text-center align-middle"> {{number_format( $invoice->payable_price )}} تومان </td>
                                <td class="text-center align-middle">
                                    <p class="text-{{$invoice->status_class()}}">{{ $invoice->status() }}</p>
                                </td>
                                <td class="text-center align-middle"> {{$invoice->created_at()}}</td>
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
