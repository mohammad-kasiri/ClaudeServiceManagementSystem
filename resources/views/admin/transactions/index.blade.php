@extends('admin.layout.master' , ['title' => 'لیست تراکنش ها'])
@section('title' , 'لیست تراکنش ها')

@section('subheader')
    <x-dashboard.subheader :links='[]' :title="'لیست تراکنش ها'" />
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
                        لیست تراکنش ها
                    </h3>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive-sm">
                    <table class="table ">
                        <thead>
                        <tr class="text-muted">
                            <th class="text-center">#</th>
                            <th class="text-center">کاربر</th>
                            <th class="text-center">refID</th>
                            <th class="text-center">authority</th>
                            <th class="text-center">mask_card_number </th>
                            <th class="text-center">BuyerIP </th>
                            <th class="text-center">وضعیت</th>
                            <th class="text-center">تاریخ پرداخت</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($transactions as $key=>$transaction)
                            <tr>
                                <td class="text-center align-middle"> {{ $key+1 }} </td>
                                <td class="text-center align-middle"> {{ $transaction->invoice->user->email }}</td>
                                <td class="text-center align-middle"> {{$transaction->refID }}</td>
                                <td class="text-center align-middle"> {{$transaction->authority }}  </td>
                                <td class="text-center align-middle"> {{$transaction->mask_card_number }}  </td>
                                <td class="text-center align-middle"> {{$transaction->BuyerIP }}  </td>
                                <td class="text-center align-middle">
                                    <p class="text-{{$transaction->status_class()}}">
                                        {{$transaction->step }}
                                    </p>
                                </td>
                                <td class="text-center align-middle"> {{$transaction->created_at()}}</td>
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
