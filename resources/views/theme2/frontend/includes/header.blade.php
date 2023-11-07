<!-- headar section start -->
<style>
    .default__small__button__mobile {
        padding: 5px 23px;
        font-weight: 600;
        font-size: 14px;
        line-height: 1.5;
        color: var(--primaryColor);
        border-radius: var(--borderRadius2);
        background: var(--whitegrey3);
        display: inline-block;
        text-align: center;
        margin-bottom: 3px;
    }
</style>
<header>
    <div class="headerarea headerarea__3 header__sticky header__area">
        <div class="container desktop__menu__wrapper">
            <div class="row">
                <div class="col-xl-2 col-lg-2 col-md-6">
                    <div class="headerarea__left">
                        <div class="headerarea__left__logo">
                            <a class="dark__mode" href="/"><img loading="lazy"  src="{{ asset(config('settings.site_logo')) }}" alt="logo" width="220px" height=""></a>
                            <a class="light__mode" href="/"><img src="/frontend/theme2/img/logo/logo_dark.png" alt="logo" width="220px" height=""></a>
                        </div>

                    </div>
                </div>
                <div class="col-xl-7 col-lg-7 main_menu_wrap">
                    <div class="headerarea__main__menu">
                        <nav>
                            <ul>
                                <li class="mega__menu position-static"><a class="headerarea__has__dropdown" href="/">Anasayfa </a></li>
                                <li class="mega__menu position-static"><a class="headerarea__has__dropdown" href="/#about-us">Hakkımızda<i class="icofont-rounded-down d-none"></i> </a></li>
                                <li><a class="headerarea__has__dropdown" href="/#blog">Blog</a></li>
                                <li><a class="headerarea__has__dropdown" href="/#news_content">Mevzuat<span class="mega__menu__label">Son dakika</span></a></li>
                                <li><a class="headerarea__has__dropdown" href="/#contact">İletişim</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="headerarea__right">


                        <div class="headerarea__login">
                            <a href="{{config('settings.site_facebook_url')}}"><i class="icofont-facebook"></i></a>
                            <a href="{{config('settings.site_linkedin_url')}}"><i class="icofont-linkedin"></i></a>
                            <a href="{{config('settings.site_instagram_url')}}"><i class="icofont-instagram"></i></a>
                            @auth() <a href="/backend"><i class="icofont-user-alt-5"></i></a> @endauth
                        </div>

                        <div class="headerarea__button">
                            <button type="button" class="btn btn-primary default__button" data-bs-toggle="modal" data-bs-target="#request_modal">
                                Teklif Al
                            </button>
                        </div>
                    </div>
                </div>

            </div>

        </div>


        <div class="container-fluid mob_menu_wrapper">
            <div class="row align-items-center">
                <div class="col-6">
                    <div class="mobile-logo">
                        <a class="dark__mode logo__dark" href="/"><img loading="lazy"  src="{{ asset(config('settings.site_logo')) }}" alt="logo" width="220px" height=""></a>
                        <a class="light__mode logo__dark" href="/"><img src="/frontend/theme2/img/logo/logo_dark.png" alt="logo" width="220px" height=""></a>                    </div>
                </div>
                <div class="col-6">
                    <div class="header-right-wrap">

                        <div class="headerarea__right">


                            <div class="headerarea__login">

                                @auth() <a href="/backend"><i class="icofont-user-alt-5"></i></a> @endauth
                                <button type="button" class="btn btn-primary default__button--2" data-bs-toggle="modal" data-bs-target="#request_modal">
                                    Teklif Al
                                </button>
                            </div>

                        </div>

                        <div class="mobile-off-canvas">
                            <a class="mobile-aside-button" href="#"><i class="icofont-navigation-menu"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- header section end -->


<!-- Mobile Menu Start Here -->
<div class="mobile-off-canvas-active">
    <a class="mobile-aside-close"><i class="icofont  icofont-close-line"></i></a>
    <div class="header-mobile-aside-wrap">
        {{--        <div class="mobile-search">--}}
        {{--            <form class="search-form" action="#">--}}
        {{--                <input type="text" placeholder="Search entire store…">--}}
        {{--                <button class="button-search"><i class="icofont icofont-search-2"></i></button>--}}
        {{--            </form>--}}
        {{--        </div>--}}
        <div class="mobile-menu-wrap headerarea">

            <div class="mobile-navigation">

                <nav>
                    <ul class="mobile-menu">
                        <li class="menu-item"><a href="/">Anasayfa</a></li>
                        <li class="menu-item "><a href="#">Hizmetlerimiz</a></li>
                        <li class="menu-item "><a href="/#blog">Blog</a></li>
                        <li class="menu-item-has-children"><a href="/#news_content">Güncel Haberler</a>
                            <ul class="dropdown">
                                <li><a href="">Evrim<span class="mega__menu__label">Son Dakika</span></a></li>
                                {{--                                <li><a href="ecommerce/product-">Product Details</a></li>--}}
                                {{--                                <li><a href="">Cart</a></li>--}}
                                {{--                                <li><a href="">Checkout</a></li>--}}
                                {{--                                <li><a href="">Wishlist</a></li>--}}

                            </ul>
                        </li>

                    </ul>
                </nav>

            </div>

        </div>
        <div class="mobile-curr-lang-wrap">
            {{--            <div class="single-mobile-curr-lang">--}}
            {{--                <a class="mobile-language-active" href="#">Language <i class="icofont-thin-down"></i></a>--}}
            {{--                <div class="lang-curr-dropdown lang-dropdown-active">--}}
            {{--                    <ul>--}}
            {{--                        <li><a href="#">English (US)</a></li>--}}
            {{--                        <li><a href="#">English (UK)</a></li>--}}
            {{--                        <li><a href="#">Spanish</a></li>--}}
            {{--                    </ul>--}}
            {{--                </div>--}}
            {{--            </div>--}}

            <!-- <div class="single-mobile-curr-lang">
                        <a class="mobile-currency-active" href="#">Currency <i class="icofont-thin-down"></i></a>
                        <div class="lang-curr-dropdown curr-dropdown-active">
                            <ul>
                                <li><a href="#">USD</a></li>
                                <li><a href="#">EUR</a></li>
                                <li><a href="#">Real</a></li>
                                <li><a href="#">BDT</a></li>
                            </ul>
                        </div>
                    </div> -->

            {{--            <div class="single-mobile-curr-lang">--}}
            {{--                <a class="mobile-account-active" href="#">My Account <i class="icofont-thin-down"></i></a>--}}
            {{--                <div class="lang-curr-dropdown account-dropdown-active">--}}
            {{--                    <ul>--}}
            {{--                        <li><a href="">Login</a></li>--}}
            {{--                        <li><a href="">/ Create Account</a></li>--}}
            {{--                        <li><a href="">My Account</a></li>--}}
            {{--                    </ul>--}}
            {{--                </div>--}}
            {{--            </div>--}}
        </div>
        <div class="mobile-social-wrap">
          <a  class="{{config('settings.site_facebook_url') ?"": "d-none"}}"   href="{{config('settings.site_facebook_url')}}"><i class="icofont-facebook"></i></a>
          <a  class="{{config('settings.site_twitter_url') ?"": "d-none"}}"    href="{{config('settings.site_twitter_url')}}"><i class="icofont-twitter"></i></a>
          <a  class="{{config('settings.site_instagram_url') ?"": "d-none"}}"  href="{{config('settings.site_instagram_url')}}"><i class="icofont-instagram"></i></a>
          <a  class="{{config('settings.site_google_plus_url') ?"": "d-none"}}" href="{{config('settings.site_google_plus_url')}}"><i class="icofont-google-plus"></i></a>
          <a  class="{{config('settings.site_linkedin_url') ?"": "d-none"}}"   href="{{config('settings.site_linkedin_url')}}"><i class="icofont-linkedin"></i></a>
          <a  class="{{config('settings.site_youtube_url') ?"": "d-none"}}"    href="{{config('settings.site_youtube_url')}}"><i class="icofont-youtube-play"></i></a>
        </div>
    </div>
</div>
<!-- Mobile Menu end Here -->