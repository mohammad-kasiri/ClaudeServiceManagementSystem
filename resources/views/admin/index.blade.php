@extends('admin.layout.master')
@section('title' , "پیشخوان اصلی" )
@section('headline', "پیشخوان اصلی")

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="card h-100 card-custom wave wave-animate-slow wave-primary mb-8 mb-lg-0">
                    <div class="card-body">
                        <div class="d-flex align-items-center p-5">
                            <div class="mr-6">
                                <span class="svg-icon svg-icon-primary svg-icon-4x">
                                    <i class="flaticon-avatar icon-2x"></i>
                                </span>
                            </div>
                            <div class="d-flex flex-column">
                                <a class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3">
                                    تعداد کاربران
                                </a>
                                <div class="text-dark-75">{{$users}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 card-custom wave wave-animate-slow wave-danger mb-8 mb-lg-0">
                    <div class="card-body">
                        <div class="d-flex align-items-center p-5">
                            <div class="mr-6">
                                <span class="svg-icon svg-icon-danger svg-icon-4x">
                                    <i class="flaticon-piggy-bank icon-2x"></i>
                                </span>
                            </div>
                            <div class="d-flex flex-column">
                                <a  class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3">
                                    تعداد فروش امروز
                                </a>
                                <div class="text-dark-75">{{$sell_count}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 card-custom wave wave-animate-slow wave-info mb-8 mb-lg-0">
                    <div class="card-body">
                        <div class="d-flex align-items-center p-5">
                            <!--begin::Icon-->
                            <div class="mr-6">
                                <span class="svg-icon svg-icon-success svg-icon-4x">
                                    <i class="flaticon-coins icon-2x"></i>
                                </span>
                            </div>
                            <!--end::Icon-->
                            <!--begin::Content-->
                            <div class="d-flex flex-column">
                                <a  class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3">
                                    جمع مبلغ فروش امروز
                                </a>
                                <div class="text-dark-75">{{$sell_amount}}</div>
                            </div>
                            <!--end::Content-->
                        </div>
                    </div>
                </div>
                <!--end::کال اوت-->
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-12">
                <!--begin::Card-->
                <div class="card card-custom">
                    <div class="card-header flex-wrap border-0 pt-6 pb-0">
                        <div class="card-title">
                            <h3 class="card-label">
                                لیست 10 رسید آخر
                            </h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive-sm">
                            <table class="table ">
                                <thead>
                                <tr class="text-muted">
                                    <th class="text-center">#</th>
                                    <th class="text-center">کاربر</th>
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
                                        <td class="text-center align-middle"> {{$invoice->user->name ?? $invoice->user->email }} </td>
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
        </div>
    </div>

@endsection


