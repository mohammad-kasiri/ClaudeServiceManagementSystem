@extends('customer.layout.master')
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
                                    <i class="flaticon-price-tag icon-2x"></i>
                                </span>
                            </div>
                            <div class="d-flex flex-column">
                                <a class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3">
                                    تعداد صورت حساب ها
                                </a>
                                <div class="text-dark-75">{{$activeInvoices}}</div>
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
                                    <i class="flaticon-settings icon-2x"></i>
                                </span>
                            </div>
                            <div class="d-flex flex-column">
                                <a  class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3">
                                    تعداد اشتراک های فعال
                                </a>
                                <div class="text-dark-75">{{$activeAccounts}}</div>
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
                                    <i class="flaticon2-talk icon-2x"></i>
                                </span>
                            </div>
                            <!--end::Icon-->
                            <!--begin::Content-->
                            <div class="d-flex flex-column">
                                <a  class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3">
                                   درخواست های پشتیبانی
                                </a>
                                <div class="text-dark-75">{{$unAnsweredTickets}}</div>
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
                               اشتراک ها فعال
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
                                    <th class="text-center">کانفیگ</th>
                                    <th class="text-center">تاریخ انقضا</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($accounts as $key=>$account)
                                    <tr>
                                        <td class="text-center align-middle"> {{ $key+1 }} </td>
                                        <td class="text-center align-middle">
                                            {{$account->server->location->title}}
                                        </td>
                                        <td class="text-center align-middle" dir="ltr">
                                            {{$account->config() }}
                                        </td>

                                        <td class="text-center align-middle"> {{$account->expire_at()}}</td>
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


