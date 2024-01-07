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
            <div class="d-flex">
                <div class="col-xl-2 col-lg-2 col-md-6">
                    <div class="headerarea__left">
                        <div class="headerarea__left__logo featurearea__img " style="max-width: 200px">
                            <a class="dark__mode" href="/"><img loading="lazy"  src="{{ asset(config('settings.site_logo')) }}" alt="logo" width="200px" height=""></a>
                            <a class="light__mode" href="/"><img src="{{ asset(config('settings.site_logo')) }}" alt="logo" width="200px" height=""></a>
                        </div>

                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 main_menu_wrap">
                    <div class="headerarea__main__menu">
                        <nav>
                            <ul>
                                <li class="mega__menu position-static"><a class="headerarea__has__dropdown" href="/">Anasayfa </a></li>
                                <li class="mega__menu position-static"><a class="headerarea__has__dropdown" href="/#about-us">Hakkımızda<i class="icofont-rounded-down d-none"></i> </a></li>
                                <li><a class="headerarea__has__dropdown" href="/#blog">Blog</a></li>
                                <li><a class="headerarea__has__dropdown" href="/#news_content">Haberler</a></li>
                                <li><a class="headerarea__has__dropdown " href="tests">Kendini Testet</a></li>
                             
                                <li><a class="headerarea__has__dropdown" href="/#contact">İletişim</a></li>
                                 <li class="d-none"><a target="_blank" class="headerarea__has__dropdown" href="https://logi-san.com/gumruk-hizmetleri/">Logisan Lojistik</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="headerarea__right">
{{--                        <div class="headerarea__button headerarea__login">--}}
{{--                            <a type="button" class="btn btn default__button" href="https://logi-san.com/gumruk-hizmetleri/">--}}
{{--                                Logisan Lojistik--}}
{{--                            </a>--}}
{{--                        </div>--}}

                        <div class="headerarea__login d-flex">
                            <a  class="{{config('settings.site_facebook_url') ?"default__button text-white ": "d-none"}}"   href="{{config('settings.site_facebook_url')}}"><i class="icofont-facebook"></i></a>
                            <a  class="{{config('settings.site_instagram_url') ?"default__button text-white ": "d-none"}}"  href="{{config('settings.site_instagram_url')}}"><i class="icofont-instagram"></i></a>
                            <a  class="{{config('settings.site_linkedin_url') ?"default__button text-white ": "d-none"}}"   href="{{config('settings.site_linkedin_url')}}"><i class="icofont-linkedin"></i></a>
{{--                            @auth() <a href="/backend"><i class="icofont-user-alt-5"></i></a> @endauth--}}
                        </div>
                        <div class="header__cart">
                            @auth()
                                <button type="button" class="btn btn-primary dropdown-toggle"
                                        type="button" id="dropdownMenuButton" data-mdb-toggle="dropdown" aria-expanded="false" >
                                    <i class="icofont-user-alt-5"></i>    {{auth()->user()->name}}
                                </button>
                                <div class="header__right__dropdown__wrapper">
                                    <div class="mb-0 header__right__dropdown__inner">
                                        <div class="single__header__right__dropdown">
                                            <div class="header__right__dropdown__content">
                                                @if(auth()->user()->hasRole('user'))
                                                    <a class="d-grid " href="{{route('admin.index')}}">Kullanıcı Paneli</a>
                                                @else
                                                <a class="d-grid " href="{{route('admin.index')}}">Yönetim Paneli</a>

                                                @endif
                                            </div>
                                        </div>
                                        @if(auth()->user()->hasRole('user'))
                                        <div class=" single__header__right__dropdown">
                                            <div class="header__right__dropdown__content">
                                                <a class="d-grid " href="{{route('profile.index')}}">Profilim</a></div>
                                        </div>
                                        @endif
                                        <div class="mb-0 single__header__right__dropdown">
                                            <div class="header__right__dropdown__content">
                                                <a class="d-grid"  href="{{ route('logout') }}"
                                                       onclick="event.preventDefault();document.getElementById('logout-form').submit();">Çıkış Yap</a></li>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <button type="button" class="btn btn-primary default__button" onclick="return window.location.href = '/login'">
                                    <i class="icofont-user-alt-5"></i>    Giriş yap
                                </button>                           
                            @endauth
                        </div>
                        
                        
                    </div>
                </div>

            </div>

        </div>


        <div class="container-fluid mob_menu_wrapper">
            <div class="row align-items-center">
                <div class="col-6">
                    <div class="mobile-logo" style="max-width: 109px">
                        <a class="dark__mode logo__dark" href="/"><img loading="lazy"  src="{{ asset(config('settings.site_logo')) }}" alt="logo" width="" height=""></a>
                        <a class="light__mode logo__dark" href="/"><img src="{{ asset(config('settings.site_logo')) }}" alt="logo" width="" height=""></a>                    </div>
                </div>
                <div class="col-6">
                    <div class="header-right-wrap">

                        <div class="headerarea__right">


                            <div class="headerarea__login d-flex">

                                @auth() 
{{--                                    <a href="/backend"><i class="icofont-user-alt-5"></i></a>--}}
                                    <button type="button" class="btn btn-primary default__button  p-2 rounded" >
                                       {{auth()->user()->name}}
                                    </button>
                               @else
                            
                                <a type="button" href="/login" class="btn btn-primary default__button  p-2 rounded" >
                                    Giriş yap
                                </a>
                                @endauth
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
                        <li class="menu-item "><a href="/#news_content">Güncel Haberler</a>
                        <li class="menu-item "><a class="" href="/#contact">İletişim</a></li>
{{--                        <li class="menu-item"><a target="_blank" class="" href="https://logi-san.com/gumruk-hizmetleri/">Logisan Lojistik</a></li>--}}
                        
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