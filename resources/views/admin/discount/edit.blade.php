@extends('admin.layout.master' , ['title' => 'ویرایش کد تخفیف   '])
@section('title' , 'ویرایش کد تخفیف ')
@section('subheader')
    @php
        $buttons = [
            [
                'title'  =>  'لیست کدتخفیف ها ' ,
                'icon'   =>  '<i class="fas fa-undo"></i>' ,
                'route'  =>  route('admin.discount.index') ,
                'color'  =>  'btn-light-info'
             ],
        ];
    @endphp
    <x-dashboard.subheader :links='$buttons' :title="'ویرایش کد تخفیف'" />
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
                        ویرایش کدتخفیف
                    </h3>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('admin.discount.update', ['discount' => $discount])}}" method="post">
                    @method('PATCH')
                    @csrf
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <x-dashboard.form.row-input label="کد"  name="code" value="{{$discount->code}}"/>
                        </div>

                        <div class="col-md-10">
                            <x-dashboard.form.select.row label="نوع کد تخفیف" name="type" >
                                <option value="percent"  {{ $discount->type == 'percent' ? 'selected' : ''}}>درصدی</option>
                                <option value="specific" {{ $discount->type == 'specific' ? 'selected' : ''}}>مقدار ثابت(تومان)</option>
                            </x-dashboard.form.select.row>
                        </div>

                        <div class="col-md-10">
                            <x-dashboard.form.row-input label="میزان تخفیف"  name="amount" type="number" value="{{$discount->amount}}"/>
                        </div>

                        <div class="col-md-10">
                            <x-dashboard.form.row-input label="محدودیت (تعداد سفارش)"  name="limitation" type="number" value="{{$discount->limitation}}"/>
                        </div>

                        <div class="col-md-3">
                            <button type="submit" class="btn btn-outline-primary btn-block">ویرایش کدتخفیف</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--end::Entry-->
@endsection
