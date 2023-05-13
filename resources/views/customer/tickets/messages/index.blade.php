@extends('customer.layout.master' , ['title' => 'لیست پیام ها'])
@section('title' , 'لیست پیام ها')

@section('subheader')
    <x-dashboard.subheader :links='[]' :title="'لیست پیام ها'" />
@endsection

@section('content')
    <!--begin::Container-->
    <div class=" container ">
        <!--begin::Notice-->
        @if(\Illuminate\Support\Facades\Session::has('message'))
            @include('customer.layout.alert')
        @endif
        <!--end::Notice-->
        <div class="card card-custom my-5">
            <div class="card-header flex-wrap border-0 pt-6 pb-0">
                <div class="card-title">
                    <h3 class="card-label">
                        پیام جدید
                    </h3>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('panel.ticket.message.store' , ['ticket' => $ticket->id])}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <x-dashboard.form.text.textarea name="message" label="توضیحات"/>
                        </div>
                        <div class="col-md-12 text-center">
                            <button class="btn btn-primary" type="submit">افزودن پیام</button>
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
                        پیام ها
                    </h3>
                </div>
            </div>
            <div class="card-body">
                @foreach($messages as $message)
                    <div class="row @if($message->user_id == auth()->id()) bg-light-info @else bg-light-success @endif my-5">
                        <div class="col-12  min-h-50  p-5">
                            <b>{{ $message->user_id == auth()->id()  ? auth()->user()->name : 'مدیریت' }} : </b>
                            <span class="text-muted float-right">{{ $message->created_at() }}     </span>
                            <br> <br>
                            <p class="ml-5">{{ $message->message }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!--end::Card-->
    </div>
    <!--end::Container-->
@endsection
