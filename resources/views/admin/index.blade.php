@extends('admin.layout.master')
@section('title' , "پیشخوان اصلی" )
@section('headline', "پیشخوان اصلی")

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="card h-100 card-custom wave wave-animate-slow wave-primary mb-8 mb-lg-0">
                    <div class="card-body">
                        <div class="d-flex align-items-center p-5">
                            <div class="mr-6">
                                <span class="svg-icon svg-icon-primary svg-icon-4x">
                                    <i class="flaticon2-bell-4 icon-2x"></i>
                                </span>
                            </div>
                            <div class="d-flex flex-column">
                                <a class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3">
                                    تعداد تخفیف ها
                                </a>
                                <div class="text-dark-75">
                                    <p>
                                        0&nbsp;  کد تخفیف فعال

                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
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
                                    تراکنش
                                </a>
                                <div class="text-dark-75">
                                    10
                                    تومان
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100 card-custom wave wave-animate-slow wave-warning mb-8 mb-lg-0">
                    <div class="card-body">
                        <div class="d-flex align-items-center p-5">
                            <div class="mr-6">
                                <span class="svg-icon svg-icon-primary svg-icon-4x">
                                    <i class="flaticon-eye icon-2x"></i>
                                </span>
                            </div>
                            <div class="d-flex flex-column">
                                <a class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3">
                                    آمار سفارشات
                                </a>
                                <div class="text-dark-75">
                                    <p>
                                        0&nbsp; تعداد سفارشات امروز
                                    </p>
                                    <p>
                                        31&nbsp;  تعداد کل سفارشات
                                    </p>
                                    <p>
                                        9&nbsp;  سفارش تایید نشده
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100 card-custom wave wave-animate-slow wave-info mb-8 mb-lg-0">
                    <div class="card-body">
                        <div class="d-flex align-items-center p-5">
                            <!--begin::Icon-->
                            <div class="mr-6">
                                <span class="svg-icon svg-icon-success svg-icon-4x">
                                    <i class="flaticon-avatar icon-2x"></i>
                                </span>
                            </div>
                            <!--end::Icon-->
                            <!--begin::Content-->
                            <div class="d-flex flex-column">
                                <a  class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3">
                                    تعداد اعضا
                                </a>
                                <div class="text-dark-75">
                                    <p>
                                        24&nbsp; کاربر
                                    </p>
                                    <p>
                                        9&nbsp;مدیر
                                    </p>
                                </div>
                            </div>
                            <!--end::Content-->
                        </div>
                    </div>
                </div>
                <!--end::کال اوت-->
            </div>
        </div>
    </div>

@endsection


