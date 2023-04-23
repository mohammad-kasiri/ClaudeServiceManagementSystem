@extends('customer.layout.master' , ['title' => 'ویرایش پروفایل'])
@section('title' , 'ویرایش پروفایل')

@section('subheader')
    <x-dashboard.subheader :links='[]' :title="'ویرایش پروفایل'" />
@endsection

@section('content')
    <!--begin::Container-->
    <div class=" container ">
        <!--begin::Notice-->
        @if(\Illuminate\Support\Facades\Session::has('message'))
            @include('customer.layout.alert')
        @endif
        <!--end::Notice-->

        <!--begin::Card-->
        <div class="card card-custom">
            <div class="card-header flex-wrap border-0 pt-6 pb-0">
                <div class="card-title">
                    <h3 class="card-label">
                        ویرایش پروفایل
                    </h3>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('panel.profile.update')}}" method="post">
                    @method('PATCH')
                    @csrf
                    <div class="row justify-content-center">



                        <div class="col-md-10">
                            <x-dashboard.form.row-input label="نام"  name="name" value="{{auth()->user()->name}}"/>
                        </div>
                        <div class="col-md-10">
                            <x-dashboard.form.row-input label="شماره تماس"  name="mobile" value="{{auth()->user()->mobile}}"/>
                        </div>
                        <div class="col-md-10">
                            <x-dashboard.form.row-input label="ایمیل"  name="email" value="{{auth()->user()->email}}" disabled="1" />
                        </div>

                        <div class="col-md-10">
                            <x-dashboard.form.row-input label="کلمه عبور جدید"  name="password"  type="password" />
                        </div>
                        <div class="col-md-10">
                            <x-dashboard.form.row-input label="تکرار کلمه عبور جدید"  name="password_confirmation" type="password"/>
                        </div>

                        <div class="col-md-3">
                            <button type="submit" class="btn btn-outline-primary btn-block">ثبت تغییرات </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!--end::Card-->
    </div>
    <!--end::Container-->
@endsection
