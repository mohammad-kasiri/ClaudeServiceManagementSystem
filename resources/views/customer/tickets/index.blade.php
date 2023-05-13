@extends('customer.layout.master' , ['title' => 'لیست تیکت ها'])
@section('title' , 'لیست تیکت ها')

@section('subheader')
    @php
        $buttons = [
          [
              'title'  =>  'بازکردن تیکت جدید ' ,
              'icon'   =>  '<i class="fas fa-plus"></i>' ,
              'route'  =>  route('panel.ticket.create') ,
              'color'  =>  'btn-light-info'
           ],
      ];
    @endphp
    <x-dashboard.subheader :links='$buttons ?? []' :title="'لیست تیکت ها'" />
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
                        لیست تیکت ها
                    </h3>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive-sm">
                    <table class="table ">
                        <thead>
                        <tr class="text-muted">
                            <th class="text-center">#</th>
                            <th class="text-center">موضوع</th>
                            <th class="text-center">دپارتمان</th>
                            <th class="text-center">وضعیت</th>
                            <th class="text-center">تاریخ ویرایش</th>
                            <th class="text-center">پیام ها</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tickets as $key => $ticket)
                            <tr class>
                                <td class="text-center">{{$key+1}}</td>
                                <td class="text-center">{{$ticket->subject}}</td>
                                <td class="text-center">{{$ticket->department}}</td>
                                <td class="text-center {{$ticket->status_class()}}">{{$ticket->status()}}</td>
                                <td class="text-center">{{$ticket->updated_at()}}</td>
                                <td class="text-center align-middle text-nowrap">
                                    <a href="{{route('panel.ticket.message.index', ['ticket' => $ticket->id])}}"
                                       class="btn btn-icon btn-circle btn-sm btn-outline-info"
                                       data-container="body"
                                       data-delay="500"
                                       data-toggle="popover"
                                       data-placement="top"
                                       data-content="جریان مکالمه">
                                        <i class="far fa-envelope"></i>
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
