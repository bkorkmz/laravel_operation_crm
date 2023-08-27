<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">
        <h1 class="logo me-auto"><a href="index.html">
                <span>
                    <img src="{{ asset(config('settings.site_logo')) }}" alt="logo" class="logo">
                </span>
            </a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt=""></a>-->

        <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
                <li><a class="nav-link scrollto active" href="#hero">Anasayfa</a></li>
                <li><a class="nav-link scrollto" href="#about">Hakkımızda</a></li>
                <li><a class="nav-link scrollto" href="#services">Hizmetlerimiz</a></li>
                <li><a class="nav-link scrollto " href="#portfolio">Portfolyo</a></li>
                <!-- <li><a class="nav-link scrollto" href="#team">Team</a></li> -->
                <li><a href="">Blog</a></li>
                {{-- <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
          <ul>
            <li><a href="#">Drop Down 1</a></li>
            <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
              <ul>
                <li><a href="#">Deep Drop Down 1</a></li>
                <li><a href="#">Deep Drop Down 2</a></li>
                <li><a href="#">Deep Drop Down 3</a></li>
                <li><a href="#">Deep Drop Down 4</a></li>
                <li><a href="#">Deep Drop Down 5</a></li>
              </ul>
            </li>
            <li><a href="#">Drop Down 2</a></li>
            <li><a href="#">Drop Down 3</a></li>
            <li><a href="#">Drop Down 4</a></li>
          </ul>
                </li> --}}
                <li><a class="nav-link scrollto" href="#contact">İletişim</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

        <a href="#about" class="get-started-btn scrollto">Hadi Başlayalım</a>
        @auth()
            <div class="container-fluit bg-light">
                <div class="container">
                    <div class="center">


                        <nav class="navbar order-last order-lg-0">
                            <li class="dropdown list-group"><button class="btn btn-success "><i
                                        class="ri ri-user-follow-line mr-1"></i><span>{{ auth()->user()->name }}</span></button>
                                <ul>
                                    <li><a href="{{route('admin.index')}}">Yönetim Paneli</a></li>

                                    <li><a href="{{route('profile.index')}}">Profilim</a></li>
                                    <li><a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">Çıkış
                                            Yap</a></li>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                              @csrf
                                          </form>
                                </ul>
                            </li>
                        </nav>
                        {{-- <button class="btn btn-success">            <i class="bi bi-list mobile-nav-toggle"></i>
                        </button> --}}
                    </div>
                </div>
            </div>
        @endauth


    </div>
</header><!-- End Header -->
