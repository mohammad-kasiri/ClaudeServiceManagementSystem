@extends('admin.layout.master' , ['title' => 'افزودن پلن فروش'])
@section('title' , ' افزودن پلن فروش')
@section('subheader')
    @php
        $buttons = [
            [
                'title'  =>  'لیست پلن ها ' ,
                'icon'   =>  '<i class="fas fa-undo"></i>' ,
                'route'  =>  route('admin.plan.index') ,
                'color'  =>  'btn-light-info'
             ],
        ];
    @endphp
    <x-dashboard.subheader :links='$buttons' :title="'افزودن پلن فروش'" />
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
                        افزودن پلن
                    </h3>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('admin.plan.store')}}" method="post">
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
                            <x-dashboard.form.select.row label="بازه زمانی" name="period_id">
                                @foreach($periods as $period)
                                    <option value="{{$period->id}}" {{old('period_id') == $period->id ? 'selected' : ''}}>
                                        {{$period->title}}
                                    </option>
                                @endforeach
                            </x-dashboard.form.select.row>
                        </div>
                        <div class="col-md-10">
                            <x-dashboard.form.select.row label="ترافیک" name="traffic_id">
                                @foreach($traffics as $traffic)
                                    <option value="{{$traffic->id}}" {{old('traffic_id') == $traffic->id ? 'selected' : ''}}>
                                        {{$traffic->title}}
                                    </option>
                                @endforeach
                            </x-dashboard.form.select.row>
                        </div>
                        <div class="col-md-10">
                            <x-dashboard.form.row-input label="قیمت چاخان (تومان)"  name="rrp_price"  separate="true"/>
                        </div>
                        <div class="col-md-10">
                            <x-dashboard.form.row-input label="قیمت اصلی (تومان)"  name="price"  separate="1"/>
                        </div>
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-outline-primary btn-block">افزودن پلن</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--end::Entry-->
@endsection
