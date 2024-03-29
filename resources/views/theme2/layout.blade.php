<!doctype html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">


<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>@yield('title') {{config('settings.site_title')}}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Description" content="{{ config('settings.site_description') }}">
    <meta name="Author" content="{{ config('settings.site_url') }}">
    <meta name="Keywords" content="{{ config('settings.site_keywords') }}">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {!! config('settings.site_meta_tag') !!}
@yield('head')

<link rel="shortcut icon" type="image/x-icon" href="{{config('settings.site_icon')}}">
<!-- Place favicon.ico in the root directory -->

<!-- CSS here -->
<link rel="stylesheet" href="{{asset("frontend/theme2/css/bootstrap.min.css")}}">
<link rel="stylesheet" href="{{asset("frontend/theme2/css/animate.min.css")}}">
<link rel="stylesheet" href="{{asset("frontend/theme2/css/aos.min.css")}}">
<link rel="stylesheet" href="{{asset("frontend/theme2/css/magnific-popup.css")}}">
<link rel="stylesheet" href="{{asset("frontend/theme2/css/icofont.min.css")}}">
<link rel="stylesheet" href="{{asset("frontend/theme2/css/slick.css")}}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css">
<link rel="stylesheet" href="{{asset("frontend/theme2/css/style.css")}}">
    
    @yield('css')
<style>
    .modal-header h5 {
        font-size: 30px;
        color: #fff;
        padding: 10px 30px;
        text-align: center;
        line-height: 27px;
        font-weight: 700;
    }
     .requestForm .error-message {
         display: none;
         color: #fff;
         background: #ed3c0d;
         text-align: left;
         padding: 15px;
         font-weight: 600;
     }

    .requestForm .error-message br+br {
        margin-top: 25px;
    }

    .requestForm .sent-message {
        display: none;
        color: #fff;
        background: #18d26e;
        text-align: center;
        padding: 15px;
        font-weight: 600;
    }

    .requestForm .loading {
        display: none;
        background: #fff;
        text-align: center;
        padding: 15px;
    }

    .requestForm .loading:before {
        content: "";
        display: inline-block;
        border-radius: 50%;
        width: 24px;
        height: 24px;
        margin: 0 10px -6px 0;
        border: 3px solid #18d26e;
        border-top-color: #eee;
        animation: animate-loading 1s linear infinite;
    }
/* 
    .footerarea__right__wraper */
</style>

<script>
    if (navigator.userAgent.indexOf('Safari') != -1 && navigator.userAgent.indexOf('Chrome') == -1) {
        // Sadece Safari tarayıcısında çalışmasını istediğiniz kod
        localStorage.setItem("theme-color", "light");
    } else {
        localStorage.setItem("theme-color", "light");
    }

    // On page load or when changing themes, best to add inline in `head` to avoid FOUC
    if (localStorage.getItem("theme-color") === "dark" || (!("theme-color" in localStorage) && window.matchMedia("(prefers-color-scheme: dark)").matches)) {
      document.documentElement.classList.add("is_dark");
    } 
    if (localStorage.getItem("theme-color") === "light") {
      document.documentElement.classList.remove("is_dark");
    } 
</script>


</head>
<style>
:root {
    --primaryColor: {{ config('settings.frontend_color') }};
    --secondaryColor: {{ config('settings.frontend_color') }};
}
.back__loader_logo img {
    width: 130px;
}
#back__circle_loader {
    width: 177px;
    height: 177px;
}
</style>
<body class="body__wrapper">
<!-- pre loader area start -->
<div id="back__preloader">
    <div id="back__circle_loader"></div>
       <div class="back__loader_logo">
            <img src="{{ asset(config('settings.site_logo')) }}" alt="Preload">
        </div>
</div>
<!-- pre loader area end -->

<!-- Dark/Light area start -->
{{--    <div class="mode_switcher my_switcher top-50">--}}
{{--        <button id="light--to-dark-button" class="light align-items-center">--}}
{{--            <svg xmlns="http://www.w3.org/2000/svg" class="ionicon dark__mode" viewBox="0 0 512 512"><path d="M160 136c0-30.62 4.51-61.61 16-88C99.57 81.27 48 159.32 48 248c0 119.29 96.71 216 216 216 88.68 0 166.73-51.57 200-128-26.39 11.49-57.38 16-88 16-119.29 0-216-96.71-216-216z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/></svg>--}}

{{--            <svg xmlns="http://www.w3.org/2000/svg" class="ionicon light__mode" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M256 48v48M256 416v48M403.08 108.92l-33.94 33.94M142.86 369.14l-33.94 33.94M464 256h-48M96 256H48M403.08 403.08l-33.94-33.94M142.86 142.86l-33.94-33.94"/><circle cx="256" cy="256" r="80" fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32"/></svg>--}}

{{--            <span class="light__mode">Açık</span>--}}
{{--            <span class="dark__mode">Koyu</span>--}}
{{--        </button>--}}
{{--    </div>--}}
<!-- Dark/Light area end -->

<main class="main_wrapper overflow-hidden">



    @include('theme2.frontend.includes.header')


    @yield('breadcrumbs')
    @yield('content')

 
  
    <div class="modal fade" id="request_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header" style="background: #01b4a0">
                    <h5 class="modal-title" id="exampleModalLabel"> Yazılım Teklif Formu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0">
                    <form class="become__instructor__form requestForm" action="{{route('frontend.contactsubmit')}}" id="requestForm" method="POST" role="form" onsubmit="return false;">
                       @csrf
                        <input type="hidden" name="form_type" id="form_type" value="request_form">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="dashboard__form__wraper">
                                    <div class="dashboard__form__input">
                                        <label for="name">Ad - Soyad</label>
                                        <input type="text" name="name" placeholder="Ad - Soyad Giriniz" required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-12">
                                <div class="dashboard__form__wraper">
                                    <div class="dashboard__form__input">
                                        <label for="email">E-posta Adresi</label>
                                        <input type="email" name="email" placeholder="Eposta  Giriniz" required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-12">
                                <div class="dashboard__form__wraper">
                                    <div class="dashboard__form__input">
                                        <label for="phone">Telefon Numarası</label>
                                        <input id="phone"  type="text" maxlength="10" pattern="[0-9]{3}[0-9]{3}[0-9]{4}"
                                               oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\.*?)\.*/g, '$1');"
                                               class="{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone"
                                               value="{{ old('phone') }}" placeholder="Telefon Numarası Giriniz" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="my-3">
                                    <div class="loading">Gönderiliyor</div>
                                    <div class="error-message"></div>
                                    <div class="sent-message">Teklifinizi aldık. En kısa sürde size döneceğiz !</div>
                                </div>
                                <div class="dashboard__form__button">
                                    <button class="default__button" type="submit">Bize Ulaşın</button>
                                </div>
                            </div>

                        </div>



                    </form>
                </div>

            </div>
        </div>
    </div>




    @include('theme2.frontend.includes.footer')


</main>






<script>
    // On page load or when changing themes, best to add inline in `head` to avoid FOUC
    if (localStorage.getItem("theme-color") === "dark" || (!("theme-color" in localStorage) && window.matchMedia("(prefers-color-scheme: dark)").matches)) {
      document.getElementById("light--to-dark-button")?.classList.add("dark--mode");
    } 
    if (localStorage.getItem("theme-color") === "light") {
      document.getElementById("light--to-dark-button")?.classList.remove("dark--mode");
    } 
  </script>

<script>
    $(document).ready(function () {
        $("#requestForm").on("submit", function (e) {
            e.preventDefault();
            let thisForm = this;
            thisForm.querySelector('.loading').classList.remove('d-block');
            let formData = new FormData( thisForm );
            let action = thisForm.getAttribute('action');
            fetch(action, {
                method: 'POST',
                body: formData,
                headers: { 'X-Requested-With': 'XMLHttpRequest' },
            })
                .then(response => response.json()) // JSON formatındaki yanıtı işle
                .then(data => {
                    thisForm.querySelector('.loading').classList.remove('d-block');

                    if (data.message === 'OK') {
                        thisForm.querySelector('.sent-message').classList.add('d-block');
                        thisForm.reset();
                        setTimeout(function() {
                            thisForm.querySelector('.sent-message').classList.remove('d-block');
                            thisForm.querySelector('.error-message').classList.remove('d-block');
                            // $('#request_modal').modal('hidden');
                            // $('body').removeClass('modal-open');
                            // $('.modal-backdrop').remove();
                            }, 4000);
                        
                    } else if (data.errors) {
                        const errorMessages = Object.values(data.errors).flat(); // Tüm hata mesajlarını bir dizide topla
                        displayError(thisForm, errorMessages.join('<br>')); // Hata mesajlarını <br> ile birleştirip göster
                    } else {
                        throw new Error(data.message);
                    }
                })
                .catch(error => {
                    displayError(thisForm, error.message);
                });
            function displayError(thisForm, error) {
                const loadingElement = thisForm.querySelector('.loading');
                const errorMessageElement = thisForm.querySelector('.error-message');

                loadingElement.classList.remove('d-block');
                errorMessageElement.innerHTML = error;
                errorMessageElement.classList.add('d-block');
            }
            
        });
    });
</script>

{{--@yield('js')--}}
</body>

</html>