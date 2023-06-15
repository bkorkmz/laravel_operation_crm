@extends('layouts.app')
@section('title')
    @lang('Kayıt Sayfası')
@stop
@section('css')

@endsection
<style>
    body {
    background-image:url("{{config('settings.site_register_img')}}");
    background-size:cover;   
    }
</style>
@section('content')


<div class="container">
    <div class=" p-y-4 my-lg-5 p-3">
        <div class="card text-center">
            <div class="card-body">
                <div class="row">
                    <div class="text-start m-4">
                        <button onclick="history.back()" class="btn btn-outline-secondary" title="Geri dön" data-bs-toggle="tooltip" data-bs-placement="top"> <i class="fas fa-reply "></i></button>
                    </div>
                    <div class="col-md-9 col-lg-6 col-xl-6">
                        <img src="{{config('settings.site_logo')}}" class="img-fluid mb-4 mt-3" alt="logo" width="180px">
                        <div class="align-self-center">
                            <h3>Kayıt  Sayfası </h3>
                            <h4>Account Control and System </h4>
                        </div>
        
                    </div>
                    <div class="col-md-8 col-lg-6 col-xl-5 offset-xl-1">
        
                        <form method="POST" action="{{ route('register') }}" class="form-control border-0">
                            @csrf
        
        
                            <div class="my-2  mt-2">
        
        
                                <div class="row mb-3 flex-column">
                                    @php
                                        $icon =  '<i class="fas fa-user"></i>';
                                        $title = "İsim Soyisim ";
                                        $input_name = "name";
                                        $input_id = "name";
                                        $input_type = "text";
                                        $placeholder = "İsim Soyisim Giriniz";
                                        $required = "required";
                                    @endphp
                                    <div class="">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">
                                            {!! $icon !!}
                                            </span>
                                            <input id="{{$input_id }}" type="{{$input_type}}" class="form-control form-select-lg @error($input_name) is-invalid @enderror" name="{{$input_name}}"
                                            value="{{ old($input_name) }}" placeholder="{{ $placeholder }}" required autocomplete="email" autofocus {{$required}}
                                            aria-label="email" aria-describedby="basic-addon1">
        
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
        
        
        
        
                                <div class="row mb-3  flex-column">
                                    @php
                                        $icon =  '<i class="fas fa-id-card"></i>';
                                        $title = "Tc No ";
                                        $input_name = "tc_no";
                                        $input_id = "tc_no";
                                        $input_type = "text";
                                        $placeholder = "Tc Numarınızı Giriniz";
                                        $required = "required";
                                    @endphp
                                    <div class="">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">
                                            {!! $icon !!}
                                            </span>
                                            <input id="{{$input_id }}" type="{{$input_type}}"  class="form-control form-select-lg @error($input_name) is-invalid @enderror" 
                                                    name="{{$input_name}}" value="{{ old($input_name) }}" placeholder="{{ $placeholder }}" {{$required}}
                                                    aria-label="{{$input_name}}" aria-describedby="basic-addon1" maxlength="11" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)">
                                
        
                                            @error('tc_no')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
        
        
        
        
        
                                <div class="row mb-3  flex-column">
                                    @php
                                        $icon =  '<i class="fas fa-at"></i>';
                                        $title = "Email ";
                                        $input_name = "email";
                                        $input_id = "email";
                                        $input_type = "email";
                                        $placeholder = "Email Adresinizi Giriniz";
                                        $required = "required";
                                    @endphp
                                    <div class="">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">
                                            {!! $icon !!}
                                            </span>
                                            <input id="{{$input_id }}" type="{{$input_type}}" class="form-control form-select-lg @error($input_name) is-invalid @enderror" name="{{$input_name}}"
                                                    value="{{ old($input_name) }}" placeholder="{{ $placeholder }}" {{$required}}
                                                    aria-label="{{$input_name}}" aria-describedby="basic-addon1">
        
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
        
        
                                <div class="row mb-3  flex-column">
                                    @php
                                        $icon =  '<i class="fas fa-key"></i>';
                                        $title = "Şifre ";
                                        $input_name = "password";
                                        $input_id = "password";
                                        $input_type = "password";
                                        $placeholder = "Şifrenizi  Giriniz";
                                        $required = "required";
                                    @endphp
                                    <div class="">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">
                                            {!! $icon !!}
                                            </span>
                                            <input id="{{$input_id }}" type="{{$input_type}}" class="form-control form-select-lg @error($input_name) is-invalid @enderror" name="{{$input_name}}"
                                                    value="{{ old($input_name) }}" placeholder="{{ $placeholder }}" {{$required}}
                                                    aria-label="{{$input_name}}" aria-describedby="basic-addon1" autocomplete="new-password" minlength="8">
                                            <span class="input-group-text"><i class="far fa-eye-slash" id="togglePassword"></i></span>
        
        
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{$message}}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
        
                                <div class="row mb-3  flex-column">
                                    @php
                                        $icon =  '<i class="fas fa-key"></i>';
                                        $title = "Şifre Tekrar ";
                                        $input_name = "password_confirmation";
                                        $input_id = "password_confirmation";
                                        $input_type = "password";
                                        $placeholder = "Şifrenizi Tekrar  Giriniz";
                                        $required = "required";
                                    @endphp
                                    <div class="">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">
                                            {!! $icon !!}
                                            </span>
                                            <input id="{{$input_id }}" type="{{$input_type}}" class="form-control form-select-lg @error($input_name) is-invalid @enderror" name="{{$input_name}}"
                                                    value="{{ old($input_name) }}" placeholder="{{ $placeholder }}" {{$required}}
                                                    aria-label="{{$input_name}}" aria-describedby="basic-addon1" autocomplete="new-password" minlength="8">
        
                                            @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
        
        
                            </div>
        
        
                            <div class="row mb-0 justify-content-start" >
                                <div class="col-md-12 ">
                                    <button type="submit" class="btn btn-success w-50">
                                        {{ __('Kayıt ol') }}
                                    </button>
        
        
                                </div>
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

    <script>
        const passwordInput = document.querySelector('input[name="password"]');
        const passwordConfirmationInput = document.querySelector('input[name="password_confirmation"]'
        );

        function validatePassword() {
            if (passwordInput.value !== passwordConfirmationInput.value) {
                passwordConfirmationInput.classList.add("is-invalid");
                passwordInput.classList.add("is-invalid");
            } else {
                passwordConfirmationInput.classList.remove("is-invalid");
                passwordInput.classList.remove("is-invalid");
            }
        }

        passwordInput.addEventListener("input", validatePassword);
        passwordConfirmationInput.addEventListener("input", validatePassword);

        togglePassword.addEventListener('click', function () {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });

    </script>
@endsection