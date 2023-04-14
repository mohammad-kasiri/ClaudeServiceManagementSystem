@extends('admin.layout.master' , ['title' => 'لیست ترافیک های موجود'])
@section('title' , 'لیست ترافیک های موجود')
@section('subheader')
    @php
        $buttons = [
            [
                'title'  =>  'لیست ترافیک ها' ,
                'icon'   =>  '<i class="fas fa-undo"></i>' ,
                'route'  =>  route('admin.traffic.index') ,
                'color'  =>  'btn-light-info'
             ],
        ];
    @endphp
    <x-dashboard.subheader :links='$buttons' :title="' ویرایش ' . $traffic->title" />
@endsection

@section('content')
    <!--begin::Entry-->
    <!--begin::Container-->
    <div class=" container ">
        <div class="card card-custom my-5">
            <div class="card-header flex-wrap border-0 pt-6 pb-0">
                <div class="card-title">
                    <h3 class="card-label">
                        ویرایش ترافیک {{$traffic->title}}
                    </h3>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('admin.traffic.update', ['traffic' => $traffic])}}" method="post">
                    @method('PATCH')
                    @csrf
                    <div class="row">
                        <div class="col-md-5">
                            <x-dashboard.form.row-input label="عنوان "  name="title" type="text" value="{{$traffic->title}}"/>
                        </div>
                        <div class="col-md-5">
                            <x-dashboard.form.select.row label="وضعیت" name="is_active">
                                <option value="1" {{$traffic->is_active == 1 ? 'selected' : ''}}>فعال</option>
                                <option value="0" {{$traffic->is_active == 0 ? 'selected' : ''}}>غیرفعال</option>
                            </x-dashboard.form.select.row>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-outline-primary btn-block">ویرایش ترافیک</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--end::Entry-->
@endsection
