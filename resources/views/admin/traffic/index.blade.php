@extends('admin.layout.master' , ['title' => 'لیست ترافیک های موجود'])
@section('title' , 'لیست ترافیک های موجود')

@section('subheader')
    <x-dashboard.subheader :links='[]' :title="'لیست ترافیک های موجود'" />
@endsection

@section('content')
    <!--begin::Container-->
    <div class=" container ">
        <!--begin::Notice-->
        @if(\Illuminate\Support\Facades\Session::has('message'))
            @include('admin.layout.alert')
        @endif
        <!--end::Notice-->
        <div class="card card-custom my-5">
            <div class="card-header flex-wrap border-0 pt-6 pb-0">
                <div class="card-title">
                    <h3 class="card-label">
                        افزودن ترافیک
                    </h3>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('admin.traffic.store')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-5">
                            <x-dashboard.form.row-input label="عنوان"  name="title" type="text"/>
                        </div>
                        <div class="col-md-5">
                            <x-dashboard.form.row-input label="میزان حجم (GB)"  name="amount" type="number"/>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-outline-primary btn-block">افزودن</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!--begin::Card-->
        <div class="card card-custom">
            <div class="card-header flex-wrap border-0 pt-6 pb-0">
                <div class="card-title">
                    <h3 class="card-label">
                        لیست ترافیک های تعریف شده
                    </h3>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive-sm">
                    <table class="table ">
                        <thead>
                        <tr class="text-muted">
                            <th class="text-center">#</th>
                            <th class="text-center">عنوان</th>
                            <th class="text-center">حجم</th>
                            <th class="text-center">وضعیت</th>
                            <th class="text-center">عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($traffic as $key=>$each_traffic)
                            <tr>
                                <td class="text-center align-middle"> {{ $key+1 }} </td>
                                <td class="text-center align-middle text-nowrap"> {{$each_traffic->title}}</td>
                                <td class="text-center align-middle text-nowrap"> {{$each_traffic->amount}}   GB</td>
                                <td class="text-center align-middle text-nowrap text-{{$each_traffic->is_active_class()}}"> {{$each_traffic->is_active()}}</td>

                                <td class="text-center align-middle text-nowrap">
                                    <a href="{{route('admin.traffic.edit', ['traffic' => $each_traffic])}}"  class="btn btn-icon btn-circle btn-sm btn-outline-primary">
                                        <i class="fa fa-pen"></i>
                                    </a>
                                    <a href="{{route('admin.traffic.switch_status', ['traffic' => $each_traffic])}}"  class="btn btn-icon btn-circle btn-sm btn-outline-warning">
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
