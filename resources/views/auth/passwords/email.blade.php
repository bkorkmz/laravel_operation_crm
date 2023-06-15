@extends('layouts.app')
@section('title')
@lang('Şifre Sıfırlama')
@stop
@section('content')

<div class="card text-center">

    <div class="card-body">
           
            <div class="col-lg-12 ">


                <div class="text-center">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/lotus.webp" class="img-fluid" alt="logo" width="250px">
                </div>

                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

                <form method="POST" action="{{ route('login') }}" class="form-control border-0 justify-contend-center">
                    @csrf

                    <div class="row mb-3 justify-content-center">
                        {{-- <label for="email" class="col-form-label text-start">{{ __('Email Address') }}</label> --}}

                        <div class="col-md-12">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="fas fa-user"></i>
                                </span>
                                <input id="email" type="email" class="form-control form-select-lg @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" placeholder="{{ __('Email Adresi Giriniz') }}" required autocomplete="email" autofocus
                                aria-label="email" aria-describedby="basic-addon1">

                           @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            </div>
                        </div>
                    </div>

                
                    <div class="row mb-0 justify-content-left " >
                        <div class="col-md-12 ">
                            <button type="submit" class="btn btn-primary p-lg-2">
                                {{ __('Şifre Sıfırlama Linki Gönder') }}
                            </button>
                        </div>
                    </div>
                </form>

            </div>

    </div>

  </div>

@endsection





