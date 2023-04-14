@extends('admin.layout.master' , ['title' => 'ویرایش پلن فروش'])
@section('title' , ' ویرایش پلن فروش')
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
    <x-dashboard.subheader :links='$buttons' :title="'ویرایش پلن فروش'" />
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
                        ویرایش پلن
                    </h3>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('admin.plan.update' , ['plan' => $plan])}}" method="post">
                    @method('PATCH')
                    @csrf
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <x-dashboard.form.select.row label="کشور" name="location_id" >
                                @foreach($locations as $location)
                                    <option value="{{$location->id}}" {{$plan->location_id == $location->id ? 'selected' : ''}}>
                                        {{$location->title}}
                                    </option>
                                @endforeach
                            </x-dashboard.form.select.row>
                        </div>
                        <div class="col-md-10">
                            <x-dashboard.form.select.row label="بازه زمانی" name="period_id">
                                @foreach($periods as $period)
                                    <option value="{{$period->id}}" {{$plan->period_id == $period->id ? 'selected' : ''}}>
                                        {{$period->title}}
                                    </option>
                                @endforeach
                            </x-dashboard.form.select.row>
                        </div>
                        <div class="col-md-10">
                            <x-dashboard.form.select.row label="ترافیک" name="traffic_id">
                                @foreach($traffics as $traffic)
                                    <option value="{{$traffic->id}}" {{$plan->traffic_id == $traffic->id ? 'selected' : ''}}>
                                        {{$traffic->title}}
                                    </option>
                                @endforeach
                            </x-dashboard.form.select.row>
                        </div>
                        <div class="col-md-10">
                            <x-dashboard.form.row-input label="قیمت چاخان (تومان)"  name="rrp_price"  separate="true" value="{{$plan->rrp_price}}"/>
                        </div>
                        <div class="col-md-10">
                            <x-dashboard.form.row-input label="قیمت اصلی (تومان)"  name="price"  separate="1" value="{{$plan->price}}"/>
                        </div>
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-outline-primary btn-block">ویرایش پلن</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--end::Entry-->
@endsection
