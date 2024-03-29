@extends('layouts.app')
@section('title')
  @lang('Şifre Sıfırlama  Sayfası')
@stop
@section('css')

    <style>
        body {
            background-image:url("{{config('settings.site_login_img')}}");
            background-size:cover;
        }
        .container{
            max-width: 40rem;
        }
    </style>
@endsection
@section('content')


            <div class="card text-center">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>
                    </form>
                </div>
            </div>
@endsection
