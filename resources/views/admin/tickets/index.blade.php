@extends('admin.layout.master' , ['title' => 'لیست تیکت ها'])
@section('title' , 'لیست تیکت ها')

@section('subheader')
    <x-dashboard.subheader :links='[]' :title="'لیست تیکت ها'" />
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
                            <th class="text-center">نام کاربر</th>
                            <th class="text-center">ایمیل کاربر</th>
                            <th class="text-center">موضوع</th>
                            <th class="text-center">دپارتمان</th>
                            <th class="text-center">وضعیت</th>
                            <th class="text-center">تاریخ ویرایش</th>
                            <th class="text-center">عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tickets as $key => $ticket)
                            <tr class>
                                <td class="text-center">{{$key+1}}</td>
                                <td class="text-center">{{$ticket->user->name}}</td>
                                <td class="text-center">{{$ticket->user->email}}</td>
                                <td class="text-center">{{$ticket->subject}}</td>
                                <td class="text-center">{{$ticket->department}}</td>
                                <td class="text-center {{$ticket->status_class()}}">{{$ticket->status()}}</td>
                                <td class="text-center">{{$ticket->updated_at()}}</td>
                                <td class="text-center align-middle text-nowrap">
                                    <a  href="{{route('admin.ticket.close', ['ticket' => $ticket->id])}}"
                                        class="btn btn-icon btn-circle btn-sm btn-outline-danger"
                                        data-container="body"
                                        data-delay="500"
                                        data-toggle="popover"
                                        data-placement="top"
                                        data-content="بستن تیکت">
                                        <i class="fas fa-skull"></i>
                                    </a>
                                    <a  href="{{route('admin.ticket.pending', ['ticket' => $ticket->id])}}"
                                        class="btn btn-icon btn-circle btn-sm btn-outline-warning"
                                        data-container="body"
                                        data-delay="500"
                                        data-toggle="popover"
                                        data-placement="top"
                                        data-content="در انتظار پاسخ">
                                        <i class="fas fa-stopwatch"></i>
                                    </a>
                                    <a href="{{route('admin.ticket.message.index', ['ticket' => $ticket->id])}}"
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
                <div class="row justify-content-center">
                    {{$tickets->links()}}
                </div>
            </div>
        </div>
        <!--end::Card-->
    </div>
    <!--end::Container-->
@endsection
