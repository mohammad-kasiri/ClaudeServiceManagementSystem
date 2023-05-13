@extends('admin.layout.master' , ['title' => 'ویرایش سرور فروش'])
@section('title' , ' ویرایش سرور فروش')
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
    <x-dashboard.subheader :links='$buttons' :title="'ویرایش سرور فروش'" />
@endsection

@section('content')
    @if($errors->hasAny())
        {{dd($errors->all())}}
    @endif
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
                        ویرایش سرور
                    </h3>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('admin.server.update' , ['server' => $server])}}" method="post">
                    @method('PATCH')
                    @csrf
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <x-dashboard.form.select.row label="کشور" name="location_id" >
                                @foreach($locations as $location)
                                    <option value="{{$location->id}}" {{$server->location_id == $location->id ? 'selected' : ''}}>
                                        {{$location->title}}
                                    </option>
                                @endforeach
                            </x-dashboard.form.select.row>
                        </div>
                        <div class="col-md-10">
                            <x-dashboard.form.row-input label="آدرس"  name="address" value="{{$server->address}}"/>
                        </div>

                        <div class="col-md-10">
                            <x-dashboard.form.row-input label="پورت"  name="port" type="number" value="{{$server->port}}"/>
                        </div>

                        <div class="col-md-10">
                            <x-dashboard.form.select.row label="پرتوکل" name="protocol" >
                                <option value="http"  {{$server->protocol =='http' ? 'selected' : ''}}>http</option>
                                <option value="https" {{$server->protocol =='https' ? 'selected' : ''}}>https</option>
                            </x-dashboard.form.select.row>
                        </div>

                        <div class="col-md-10">
                            <x-dashboard.form.row-input label="یوزرنیم"  name="user" value="{{$server->user}}"/>
                        </div>
                        <div class="col-md-10">
                            <x-dashboard.form.row-input label="پسورد"  name="pass" value="{{$server->pass}}"/>
                        </div>
                        <div class="col-md-10">
                            <x-dashboard.form.row-input label="از پورت"  name="min_port" type="number" value="{{$server->min_port}}"/>
                        </div>
                        <div class="col-md-10">
                            <x-dashboard.form.row-input label="تا پورت"  name="max_port" type="number" value="{{$server->max_port}}"/>
                        </div>
                        <div class="col-md-10">
                            <x-dashboard.form.row-input label="توضیحات"  name="description" value="{{$server->description}}"/>
                        </div>

                        <div class="col-md-3">
                            <button type="submit" class="btn btn-outline-primary btn-block">ویرایش سرور</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--end::Entry-->
@endsection
