@extends('nest.frontend.layout.layout')
@section('css')

@endsection
@section('title','İletişim')

@section('head')
    <meta http-equiv="x-ua-compatible" content="ie=edge"/>
    <meta name="description" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta property="og:title" content=""/>
    <meta property="og:type" content=""/>
    <meta property="og:url" content=""/>
    <meta property="og:image" content=""/>
    <meta name="title" content="İletişim">
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Webpage",
            "url": "{{request()->fullUrl()}}"
            "name": "İletişim",
            "inLanguage":"{{app()->getLocale()}}",

        }
    </script>
    <script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@type": "BreadcrumbList",
          "itemListElement": [{
            "@type": "ListItem",
            "position": 1,
            "name": "Anasayfa",
            "item": "{{route('frontend.index')}}"
          },{
            "@type": "ListItem",
            "position": 2,
            "name": "İletişim",
            "item": " {{request()->fullUrl()}} "
          }]
        }
    </script>

@endsection
@section('breadcrumb')

    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="/" rel="nofollow"><i class="fi-rs-home mr-5"></i>Anasayfa</a>
                <span>İletişim</span>
            </div>
        </div>
    </div>

@endsection

@section('content')
    <style>
        .php-email-form .error-message {
            display: none;
            color: #fff;
            background: #ed3c0d;
            text-align: left;
            padding: 15px;
            font-weight: 600;
        }

        .php-email-form .error-message br + br {
            margin-top: 25px;
        }

        .php-email-form .sent-message {
            display: none;
            color: #fff;
            background: #18d26e;
            text-align: center;
            padding: 15px;
            font-weight: 600;
        }

        .php-email-form .loading {
            display: none;
            background: #fff;
            text-align: center;
            padding: 15px;
        }

        .php-email-form .loading:before {
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
    </style>
    <div class="page-content  pt-50">

{{--                <section class="container mb-50 d-none d-md-block">--}}
{{--                    <div class="border-radius-15 overflow-hidden">--}}
{{--                        <div id="map-panes" class="leaflet-map"></div>--}}
{{--                    </div>--}}
{{--                </section>--}}
        <div class="container">
            <div class="row">
                <div class="col-xl-10 col-lg-12 m-auto">
                    <section class="mb-50">
                        <div class="row mb-60">
                            <div class="col-md-4 mb-4 mb-md-0">
                                <h4 class="mb-15 text-brand">Ofis Adresi 1</h4>
                                {{config('settings.site_address')}}</br>
                                <abbr title="Phone">Telefon:</abbr>{{config('settings.site_phone')}}<br/>
                                <abbr title="Email">Email: </abbr>{{config('settings.site_email')}}<br/>
                                {{--                                <a class="btn btn-sm font-weight-bold text-white mt-20 border-radius-5 btn-shadow-brand hover-up"><i class="fi-rs-marker mr-5"></i>View map</a>--}}
                            </div>
                            <div class="col-md-4 mb-4 mb-md-0">
                                <h4 class="mb-15 text-brand">Ofis Adresi 2</h4>
                                {{config('settings.site_address_two')}}</br>
                                <abbr title="Phone">Telefon:</abbr>{{config('settings.site_phone')}}<br/>
                                <abbr title="Email">Email: </abbr>{{config('settings.site_email')}}<br/>
                                {{--                                <a class="btn btn-sm font-weight-bold text-white mt-20 border-radius-5 btn-shadow-brand hover-up">--}}
                                {{--                                    <i class="fi-rs-marker mr-5"></i>View map</a>--}}
                            </div>
                            <div class="col-md-4">
                                <h4 class="mb-15 text-brand">Mağaza Adresi</h4>
                                {{config('settings.site_address_tree')}}</br>
                                <abbr title="Phone">Telefon:</abbr>{{config('settings.site_phone')}}<br/>
                                <abbr title="Email">Email: </abbr>{{config('settings.site_email')}}<br/>
                                <abbr title="whatsapp">whatsapp: </abbr> <a href="https://wa.me/{{config('settings.site_whatsapp_phone')}}?text=Bilgi almak istiyorum">{{config('settings.site_whatsapp_phone')}}</a><br/>

                                {{--                                <a class="btn btn-sm font-weight-bold text-white mt-20 border-radius-5 btn-shadow-brand hover-up"><i class="fi-rs-marker mr-5"></i>View map</a>--}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-8">
                                <div class="contact-from-area padding-20-row-col">
                                    {{--                                    <h5 class="text-brand mb-10">İletişim Formu</h5>--}}
                                    <h2 class="mb-10">İletişim Formu</h2>
                                    <p class="text-muted mb-30 font-sm text-8">Bilgileriniz gizli tutulacaktır. Lütfen gerekli alanları doldurun. <span class="text-warning">*</span></p>
                                    <form class="contact-form-style mt-30 php-email-form" id="contact-form"
                                          action="{{ route('frontend.contactsubmit') }}"
                                          method="post" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="form_type" id="form_type" value="info_form">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <div class="input-style mb-20 d-flex"><span class="text-warning">*</span>
                                                    <input name="name" placeholder="Ad - Soyad" type="text" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="input-style mb-20 d-flex"><span class="text-warning">*</span>
                                                    <input name="email" placeholder="Email adresiniz" type="email" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="input-style mb-20  d-flex">
                                                    <span class="text-warning"></span>
                                                    <input name="phone" id="phone" placeholder="0555-555-55-55" type="tel" minlength="10" maxlength="11" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="input-style mb-20  d-flex"><span class="text-warning">*</span>
                                                    <input name="subject" placeholder="Konu" type="text" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 ">
                                                <div class="textarea-style mb-30  d-flex"><span class="text-warning">*</span>
                                                    <textarea name="message" placeholder="Mesajınız" required></textarea>
                                                </div>
                                                <button class="submit submit-auto-width" type="submit">Mesaj Gönder
                                                </button>
                                            </div>
                                            <div class="my-3">
                                                <div class="loading">Gönderiliyor</div>
                                                <div class="error-message"></div>
                                                <div class="sent-message">Mesajınız iletildi. Teşekkür ederiz !</div>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                            <div class="col-lg-4 pl-50 d-lg-block d-none">
                                <img class="border-radius-15 mt-50" src="images/contact-2.jpg"
                                     alt=""/>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('css')

@endsection

@section('js')
    <script src="{{asset('/frontend/js/php-email-form/validate.js')}}"></script>

@endsection


@section('after-js')

@endsection
