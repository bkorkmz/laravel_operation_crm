<style>
    .registerarea__wraper {
        max-width: 100%;
    }

    /*--------------------------------------------------------------
    # Contact
    --------------------------------------------------------------*/
   /*.php-email-form {*/
   /*     box-shadow: 0 0 30px rgba(214, 215, 216, 0.6);*/
   /*     padding: 30px;*/
   /*     border-radius: 4px;*/
   /* }*/

     .php-email-form .error-message {
        display: none;
        color: #fff;
        background: #ed3c0d;
        text-align: left;
        padding: 15px;
        font-weight: 600;
    }

     .php-email-form .error-message br+br {
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

<div class="registerarea sp_top_90" >
    <div class="container">
        <div class="row">
            <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12 mb-4" data-aos="fade-up">
                <div class="registerarea__wraper">
                    <div class="section__title registerarea__section__title">
                        {{--                            <div class="section__title__button">--}}
                        {{--                                <div class="default__small__button">Course List</div>--}}
                        {{--                            </div>--}}
                        <div class="section__title__heading heading__underline">
                            <h2>{!! config('settings.site_name') !!}</h2>
                        </div>
                    </div>
                    <div class="registerarea__content">
                        <div class="registerarea__video">
                            <div class="video__pop__btn">
                                <a class="video-btn" >
                                    </a>
                            </div>
                            <div class="registerarea__para">
                                <p>İletişime geçerek uzman müşteri temsilcilerimiz tarafından fiyat teklifi alın.</p>
                                <div class="col-md-12 mt-4">
                                    <div class="info-box">
                                        <h3 class="link-light">İletişim Bilgilerimiz </h3>
                                        <p>{!!config('settings.site_address')!!}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    @if(!blank(config('settings.site_email')))
                                        <div class="info-box mt-4">
                                            <p class="text-nowrap "><i class="icofont-email icofont-2x"></i> {!!config('settings.site_email')!!}</p>
                                        </div>
                                    @endif
                                    @if(!blank(config('settings.site_phone')))
                                        <div class="info-box mt-4">
                                            <p class="text-nowrap "><i class="icofont-phone icofont-2x"></i> {!! config('settings.site_phone') !!}</p>
                                        </div>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>


            <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12" data-aos="fade-up">
                <div class="registerarea__form contact" >
                    <div class="registerarea__form__heading">
                        <h4>İletişim Formu </h4>
                    </div>
                    <form action="{{route('frontend.contactsubmit')}}" method="post" role="form" class="php-email-form" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="form_type" id="form_type" value="info_form">
                        <div class="row">
                            <div class="col-xl-6">
                                <input class="register__input" name="name" id="name" type="text" placeholder="Adınız" required>

                            </div>
                            <div class="col-xl-6">                               
                                <input class="register__input"  name="email" id="email" type="email" placeholder="Email Adresi" required>
                            </div>
                        </div>
                        <input class="register__input" type="text"  name="subject" id="subject" placeholder="Konu" required>
                        <textarea class="register__input textarea" name="message" id="#" cols="30" placeholder="Mesajınız" required
                                  rows="10"></textarea>
                        <div class="registerarea__button">
                            <div class="my-3">
                                <div class="loading">Gönderiliyor</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Mesajınız iletildi. Teşekkür ederiz !</div>
                            </div>
                            <button class="default__button" type="submit">Mesaj Gönder
                                <i class="icofont-long-arrow-right"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <div class="registerarea__img">
        <img class="register__1" src="/frontend/theme2/img/register/register__1.png" alt="register">
        <img class="register__2" src="/frontend/theme2/img/register/register__2.png" alt="register">
        <img class="register__3" src="/frontend/theme2/img/register/register__3.png" alt="register">
    </div>
</div>







