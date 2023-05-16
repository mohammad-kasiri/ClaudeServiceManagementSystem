@extends('customer.layout.master' , ['title' => 'لیست کانفیگ ها'])
@section('title' , 'لیست کانفیگ ها')

@section('subheader')
    <x-dashboard.subheader :links='[]' :title="'لیست کانفیگ ها'" />
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
                        لیست کانفیگ ها
                    </h3>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive-sm">
                    <table class="table ">
                        <thead>
                        <tr class="text-muted">
                            <th class="text-center">#</th>
                            <th class="text-center">کشور</th>
                            <th class="text-center">کانفیگ</th>
                            <th class="text-center">تاریخ انقضا</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($accounts as $key=>$account)
                            <tr>
                                <td class="text-center align-middle"> {{ $key+1 }} </td>
                                <td class="text-center align-middle">
                                    {{$account->server->location->title}}
                                </td>
                                <td class="text-center align-middle" dir="ltr" onclick="copyToClipboard('{{$account->config()}}')">
                                    {{$account->config() }}
                                </td>

                                <td class="text-center align-middle"> {{$account->expire_at()}}</td>
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

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        function copyToClipboard(config)
        {
            navigator.clipboard.writeText(config);
            Swal.fire(
                'حله !',
              ' در کلیپ برد ذخیره شد! ',
                'success'
            )
        }
    </script>
@endsection
