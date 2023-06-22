@extends('layouts.app')
@section('title')
    @lang('Giriş Sayfası')
@stop
@section('css')
    <style>
        body {
            background-image: url("{{config('settings.site_login_img')}}");
            background-size: cover;
        }
    </style>
@endsection

@section('content')

    <div class="container">
        <div class=" p-y-4 my-lg-5 p-3">
            <div class="card text-center">

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9 col-lg-6 col-xl-6">
                            <div class="justify-contend-center">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                                    alt="login image" class="img-fluid">
                            </div>

                        </div>
                        <div class="col-md-8 col-lg-6 col-xl-5 offset-xl-1">


                            <div class="text-center">
                                <img src="{{ config('settings.site_logo') }}" class="mt-3 mb-4" alt="logo"
                                    width="180px">
                            </div>






                            <form method="POST" action="{{ route('login') }}"
                                class="form-control border-0 justify-contend-center">
                                @csrf

                                <div class="row mb-3 justify-content-center">
                                    {{-- <label for="email" class="col-form-label text-start">{{ __('Email Address') }}</label> --}}

                                    <div class="col-md-10">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">
                                                <i class="fas fa-user"></i>
                                            </span>
                                            <input id="email" type="email"
                                                class="form-control form-select-lg @error('email') is-invalid @enderror"
                                                name="email" value="{{ old('email') }}"
                                                placeholder="{{ __('Email Adresi Giriniz') }}" required
                                                autocomplete="email" autofocus aria-label="email"
                                                aria-describedby="basic-addon1">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3 justify-content-center">



                                    <div class="col-md-10">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">
                                                <i class="fas fa-key"></i>
                                            </span>
                                            <input id="password" type="password"
                                                class="form-control form-select-lg @error('password') is-invalid @enderror"
                                                name="password" placeholder="{{ __('Şifre Giriniz') }}" required
                                                autocomplete="current-password" aria-label="password"
                                                aria-describedby="basic-addon1">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>


                                    </div>
                                </div>

                                <div class="row mb-3 justify-content-center">
                                    <div class="d-flex justify-content-around align-items-center mb-4">
                                        <!-- Checkbox -->
                                        <div class="form-check ">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="remember"> {{ __('Beni Hatırla') }}
                                            </label>
                                        </div>
                                        <div class="">
                                            @if (Route::has('password.request'))
                                                <a class="btn btn-link" href="{{ route('password.request') }}">Şifre al
                                                    ?</a>
                                            @endif

                                        </div>


                                    </div>


                                    {{-- <div class="col-md-6 ">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>
    
                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div> --}}
                                </div>

                                <div class="row mb-0 justify-content-left ">
                                    <div class="col-md-12 ">
                                        <button type="submit" class="btn btn-primary p-lg-2 w-50">
                                            {{ __('Login') }}
                                        </button>
                                    </div>
                                    <span class="mt-2" style="font-weight: 600;"> Bir hesabınız yok mu ? <a
                                            class="text-danger" href="/register"> Kayıt ol </a></span>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>

    <div class="wrapper d-none">

        <div class=" p-y-4 my-lg-5  shadow-lg">



            <div class="card text-center">

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9 col-lg-6 col-xl-6">
                            <div class="justify-contend-center">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                                    alt="login image" class="img-fluid">
                            </div>

                        </div>
                        <div class="col-md-8 col-lg-6 col-xl-5 offset-xl-1">


                            <div class="text-center">
                                <img src="{{ config('settings.site_logo') }}" class="mt-3 mb-4" alt="logo"
                                    width="180px">
                            </div>






                            <form method="POST" action="{{ route('login') }}"
                                class="form-control border-0 justify-contend-center">
                                @csrf

                                <div class="row mb-3 justify-content-center">
                                    {{-- <label for="email" class="col-form-label text-start">{{ __('Email Address') }}</label> --}}

                                    <div class="col-md-10">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">
                                                <i class="fas fa-user"></i>
                                            </span>
                                            <input id="email" type="email"
                                                class="form-control form-select-lg @error('email') is-invalid @enderror"
                                                name="email" value="{{ old('email') }}"
                                                placeholder="{{ __('Email Adresi Giriniz') }}" required
                                                autocomplete="email" autofocus aria-label="email"
                                                aria-describedby="basic-addon1">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3 justify-content-center">



                                    <div class="col-md-10">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">
                                                <i class="fas fa-key"></i>
                                            </span>
                                            <input id="password" type="password"
                                                class="form-control form-select-lg @error('password') is-invalid @enderror"
                                                name="password" placeholder="{{ __('Şifre Giriniz') }}" required
                                                autocomplete="current-password" aria-label="password"
                                                aria-describedby="basic-addon1">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>


                                    </div>
                                </div>

                                <div class="row mb-3 justify-content-center">
                                    <div class="d-flex justify-content-around align-items-center mb-4">
                                        <!-- Checkbox -->
                                        <div class="form-check ">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="remember"> {{ __('Beni Hatırla') }}
                                            </label>
                                        </div>
                                        <div class="">
                                            @if (Route::has('password.request'))
                                                <a class="btn btn-link" href="{{ route('password.request') }}">Şifre al
                                                    ?</a>
                                            @endif

                                        </div>


                                    </div>


                                    {{-- <div class="col-md-6 ">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>
    
                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div> --}}
                                </div>

                                <div class="row mb-0 justify-content-left ">
                                    <div class="col-md-12 ">
                                        <button type="submit" class="btn btn-primary p-lg-2 w-50">
                                            {{ __('Login') }}
                                        </button>
                                    </div>
                                    <span class="mt-2" style="font-weight: 600;"> Bir hesabınız yok mu ? <a
                                            class="text-danger" href="/register"> Kayıt ol </a></span>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>



@endsection


@section('js')

@endsection
