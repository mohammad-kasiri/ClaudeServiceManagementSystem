@extends('admin.layout.master' , ['title' => 'فعالسازی و غیرفعالسازی پلن ها'])
@section('title' , 'فعالسازی و غیرفعالسازی پلن ها')

@section('subheader')
    @php
        $buttons = [
            [
                'title'  =>  'فعالسازی همه' ,
                'icon'   =>  '<i class="fas fa-check"></i>' ,
                'route'  =>  route('admin.plan.activate_all') ,
                'color'  =>  'btn-light-success'
            ],
            [
                'title'  =>  ' غیر فعالسازی همه' ,
                'icon'   =>  '<i class="fas fa-cross"></i>' ,
                'route'  =>  route('admin.plan.deactivate_all') ,
                'color'  =>  'btn-light-danger'
            ],
        ];
    @endphp
    <x-dashboard.subheader :links='$buttons ?? []' :title="'فعالسازی و غیرفعالسازی پلن ها'" />
@endsection

@section('content')
    <!--begin::Container-->
    <div class=" container ">
        <!--begin::Notice-->
        @if(\Illuminate\Support\Facades\Session::has('message'))
            @include('admin.layout.alert')
        @endif
        <!--end::Notice-->

        <!--begin::Card-->
        <div class="card card-custom">
            <div class="card-header flex-wrap border-0 pt-6 pb-0">
                <div class="card-title">
                    <h3 class="card-label">
                        فعالسازی و غیرفعالسازی پلن ها
                    </h3>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('admin.plan.activate_status')}}" method="post">
                    @csrf
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <x-dashboard.form.select.row label="کشور" name="location_id" >
                                <option value=""></option>
                                @foreach($locations as $location)
                                    <option value="{{$location->id}}" {{old('location_id') == $location->id ? 'selected' : ''}}>{{$location->title}}</option>
                                @endforeach
                            </x-dashboard.form.select.row>
                        </div>

                        <div class="col-md-10">
                            <x-dashboard.form.select.row label="بازه زمانی" name="period_id" >
                                <option value=""></option>
                                @foreach($periods as $period)
                                    <option value="{{$period->id}}" {{old('period_id') == $period->id ? 'selected' : ''}}>{{$period->title}}</option>
                                @endforeach
                            </x-dashboard.form.select.row>
                        </div>

                        <div class="col-md-10">
                            <x-dashboard.form.select.row label="ترافیک" name="traffic_id" >
                                <option value=""></option>
                            @foreach($traffics as $traffic)
                                    <option value="{{$traffic->id}}" {{old('traffic_id') == $traffic->id ? 'selected' : ''}}>{{$traffic->title}}</option>
                                @endforeach
                            </x-dashboard.form.select.row>
                        </div>
                        <div class="col-md-10">
                            <button type="submit" class="btn btn-success float-right">فعالسازی</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
        <!--end::Card-->
    </div>
    <!--end::Container-->
@endsection
