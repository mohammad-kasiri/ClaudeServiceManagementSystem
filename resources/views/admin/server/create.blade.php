@extends('admin.layout.master' , ['title' => 'افزودن سرور فروش'])
@section('title' , ' افزودن سرور فروش')
@section('subheader')
    @php
        $buttons = [
            [
                'title'  =>  'لیست سرور ها ' ,
                'icon'   =>  '<i class="fas fa-undo"></i>' ,
                'route'  =>  route('admin.server.index') ,
                'color'  =>  'btn-light-info'
             ],
        ];
    @endphp
    <x-dashboard.subheader :links='$buttons' :title="'افزودن سرور فروش'" />
@endsection

@section('content')
    <!--begin::Entry-->
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
                        افزودن سرور
                    </h3>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('admin.server.store')}}" method="post">
                    @csrf
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <x-dashboard.form.select.row label="کشور" name="location_id" >
                                @foreach($locations as $location)
                                    <option value="{{$location->id}}" {{old('location_id') == $location->id ? 'selected' : ''}}>
                                        {{$location->title}}
                                    </option>
                                @endforeach
                            </x-dashboard.form.select.row>
                        </div>
                        <div class="col-md-10">
                            <x-dashboard.form.row-input label="آدرس"  name="address"/>
                        </div>

                        <div class="col-md-10">
                            <x-dashboard.form.row-input label="پورت"  name="port" type="number"/>
                        </div>

                        <div class="col-md-10">
                            <x-dashboard.form.select.row label="پرتوکل" name="protocol" >
                                <option value="http" {{old('protocol') =='http' ? 'selected' : ''}}>http</option>
                                <option value="https" {{old('protocol') =='https' ? 'selected' : ''}}>https</option>
                            </x-dashboard.form.select.row>
                        </div>

                        <div class="col-md-10">
                            <x-dashboard.form.row-input label="یوزرنیم"  name="user"/>
                        </div>
                        <div class="col-md-10">
                            <x-dashboard.form.row-input label="پسورد"  name="pass"/>
                        </div>
                        <div class="col-md-10">
                            <x-dashboard.form.row-input label="از پورت"  name="min_port" type="number"/>
                        </div>
                        <div class="col-md-10">
                            <x-dashboard.form.row-input label="تا پورت"  name="max_port" type="number"/>
                        </div>
                        <div class="col-md-10">
                            <x-dashboard.form.row-input label="توضیحات"  name="description"/>
                        </div>

                        <div class="col-md-3">
                            <button type="submit" class="btn btn-outline-primary btn-block">افزودن سرور</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--end::Entry-->
@endsection
