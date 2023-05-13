@extends('customer.layout.master' , ['title' => 'بازکردن تیکت جدید'])
@section('title' , 'بازکردن تیکت جدید')

@section('subheader')
    @php
        $buttons = [
          [
              'title'  =>  'بازگشت' ,
              'icon'   =>  '<i class="fas fa-undo"></i>' ,
              'route'  =>  route('panel.ticket.index') ,
              'color'  =>  'btn-light-info'
           ],
      ];
    @endphp
    <x-dashboard.subheader :links='[]' :title="'بازکردن تیکت جدید'" />
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
                        بازکردن تیکت جدید
                    </h3>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('panel.ticket.store')}}" method="post" class="text-center">@csrf
                    <div class="row">
                        <div class="col-md-12">
                            <x-dashboard.form.row-input label="موضوع تیکت"  name="subject"/>
                        </div>
                        <div class="col-md-12">
                            <x-dashboard.form.select.row label="دپارتمان" name="department">
                                <option value="support"     {{old('department') == 'support'    ? 'selected' : ''}}>پشتیبانی فنی</option>
                                <option value="finance"     {{old('department') == 'finance'    ? 'selected' : ''}}>مالی</option>
                                <option value="management"  {{old('department') == 'management' ? 'selected' : ''}}>مدیریت</option>
                            </x-dashboard.form.select.row>
                        </div>
                        <div class="col-md-12">
                            <x-dashboard.form.select.row label="میزان اهمیت" name="priority">
                                <option value="low"    {{old('priority') == 'low'    ? 'selected' : ''}}>کم</option>
                                <option value="medium" {{old('priority') == 'medium' ? 'selected' : ''}}>متوسط</option>
                                <option value="high"   {{old('priority') == 'high'   ? 'selected' : ''}}>فوری</option>
                            </x-dashboard.form.select.row>
                        </div>
                        <div class="col-md-12">
                            <x-dashboard.form.text.textarea name="message" value="{{old('message')}}" label="توضیحات" />
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">ثبت درخواست</button>
                </form>
            </div>
        </div>
        <!--end::Card-->
    </div>
    <!--end::Container-->
@endsection
