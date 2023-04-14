@extends('admin.layout.master' , ['title' => 'لیست بازه های زمانی'])
@section('title' , 'لیست بازه های زمانی')

@section('subheader')
    <x-dashboard.subheader :links='[]' :title="'لیست بازه های زمانی'" />
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
                        افزودن بازه جدید
                    </h3>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('admin.period.store')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-5">
                            <x-dashboard.form.row-input label="عنوان"  name="title" type="text"/>
                        </div>
                        <div class="col-md-5">
                            <x-dashboard.form.row-input label="تعداد روز"  name="total_days" type="number"/>
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
                        لیست بازه زمانی های تعریف شده
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
                            <th class="text-center">تعداد روز</th>
                            <th class="text-center">وضعیت</th>
                            <th class="text-center">عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($periods as $key=>$period)
                            <tr>
                                <td class="text-center align-middle"> {{ $key+1 }} </td>
                                <td class="text-center align-middle text-nowrap"> {{$period->title}}</td>
                                <td class="text-center align-middle text-nowrap"> {{$period->total_days}}   روز</td>
                                <td class="text-center align-middle text-nowrap text-{{$period->is_active_class()}}">
                                    {{$period->is_active()}}
                                </td>

                                <td class="text-center align-middle text-nowrap">
                                    <a href="{{route('admin.period.edit', ['period' => $period])}}"  class="btn btn-icon btn-circle btn-sm btn-outline-primary">
                                        <i class="fa fa-pen"></i>
                                    </a>
                                    <a href="{{route('admin.period.switch_status', ['period' => $period])}}"  class="btn btn-icon btn-circle btn-sm btn-outline-warning">
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
