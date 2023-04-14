@extends('auth.layout.master')
@section('title' , __('auth.login.view.title'))
@section('content')
    <div class="login-signin">
        <div class="mb-20">
            <h3>{{__('auth.register.view.title')}}</h3>
            <div class="text-muted font-weight-bold">{{__('auth.register.view.subtitle')}}</div>
        </div>
        <form class="form" action="{{route('auth.register.register')}}" method="post">
            @csrf
            <!-------------- EMAIL OR PHONE INPUT ---------------->
            <x-auth.form.input :name="'email'"  type="email" placeholder="{{__('auth.login.view.username_placeholder')}}" />
            <!-------------- PASSWORD INPUT ---------------------->
            <x-auth.form.input :name="'password'" type="password" placeholder="{{__('auth.login.view.password_placeholder')}}"/>
            <x-auth.form.input :name="'password_confirmation'" type="password" placeholder="تکرار کلمه ی عبور"/>

            <div class="form-group d-flex flex-wrap justify-content-between align-items-center">
                <x-auth.text.link href="{{route('auth.login.index')}}">
                    {{__('auth.register.view.login_offer')}}
                </x-auth.text.link>
            </div>
            <x-auth.form.button type="submit">
                {{__('auth.register.view.submit_button')}}
            </x-auth.form.button>
        </form>

    </div>
@endsection
