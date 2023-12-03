<!-- topbar__section__stert -->
<div class="topbararea d-none">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6">
                <div class="topbar__left">
                    <ul>
                        <li>
                           {{config('settings.site_phone')}}
                        </li>
                        <li>
                           - {{config('settings.site_email')}}
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6">
                <div class="topbar__right">
                    {{--  <div class="topbar__icon">
                         <i class="icofont-location-pin"></i>
                     </div--                    <div class="topbar__text">
                         <p> {!!config('settings.site_address') !!}</p>
                     </div>--}}
                    <div class="topbar__list">
                        <ul>
                            <li><a href="{{config('settings.site_facebook_url')}}"><i class="icofont-facebook"></i></a></li>
                            <li><a href="{{config('settings.site_twitter_url')}}"><i class="icofont-twitter"></i></a></li>
                            <li><a href="{{config('settings.site_instagram_url')}}"><i class="icofont-instagram"></i></a></li>
                            <li><a href="{{config('settings.site_google_plus_url')}}"><i class="icofont-google-plus"></i></a></li>
                            <li><a href="{{config('settings.site_linkedin_url')}}"><i class="icofont-linkedin"></i></a></li>
                            <li><a href="{{config('settings.site_youtube_url')}}"><i class="icofont-youtube-play"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- topbar__section__end -->


<!-- headar section start -->
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


                                <li class="mega__menu position-static">
                                    <a class="headerarea__has__dropdown" href="/">Anasayfa </a>
                                </li>

                                <li class="mega__menu position-static">
                                    <a class="headerarea__has__dropdown" href="#about-us">Hakkımızda<i class="icofont-rounded-down d-none"></i> </a>
                                </li>


                                <li class="mega__menu position-static">
                                    <a class="headerarea__has__dropdown" href="">Hizmetlerimiz<i class="icofont-rounded-down d-none"></i> </a>
                                </li>


                                <li><a class="headerarea__has__dropdown d-none" href="">Dashboard
                                        <i class="icofont-rounded-down"></i>
                                    </a>
                                    <ul class="headerarea__submenu headerarea__submenu--third--wrap">
                                        <li><a href="">Admin <i class="icofont-rounded-right"></i></a>

                                            <ul class="headerarea__submenu--third">
                                                <li><a href="">Admin Dashboard</a></li>
                                                <li><a href="">Admin Profile</a></li>
                                                <li><a href="">Message</a></li>
                                                <li><a href="">Courses</a></li>
                                                <li><a href="">Review</a></li>
                                                <li><a href="">Admin Quiz</a></li>

                                                <li><a href="">Settings</a></li>
                                            </ul>

                                        </li>
                                        <li>
                                            <a href="">Instructor <i class="icofont-rounded-right"></i></a>
                                            <ul class="headerarea__submenu--third">
                                                <li><a href="">Inst. Dashboard</a></li>
                                                <li><a href="">Inst. Profile</a></li>
                                                <li><a href="">Message</a></li>
                                                <li><a href="">Wishlist</a></li>
                                                <li><a href="">Review</a></li>
                                                <li><a href="">My Quiz</a></li>
                                                <li><a href="">Order History</a></li>
                                                <li><a href="">My Courses</a></li>
                                                <li><a href="">Announcements</a></li>
                                                <li><a href="">Quiz Attempts</a></li>
                                                <li><a href="">Assignment</a></li>
                                                <li><a href="">Settings</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="">Student <i class="icofont-rounded-right"></i></a>
                                            <ul class="headerarea__submenu--third">
                                                <li><a href="">Dashboard</a></li>
                                                <li><a href="">Profile</a></li>
                                                <li><a href="">Message</a></li>
                                                <li><a href="">Enrolled Courses</a></li>
                                                <li><a href="">Wishlist</a></li>
                                                <li><a href="">Review</a></li>
                                                <li><a href="">My Quiz</a></li>
                                                <li><a href="">Assignment</a></li>
                                                <li><a href="">Settings</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li><a class="headerarea__has__dropdown" href="">Blog</a></li>

                                <li><a class="headerarea__has__dropdown" href="">Güncel Haberler
                                    </a>
                                    <ul class="headerarea__submenu">
                                        <li><a href="">Shop<span class="mega__menu__label">Online Store</span></a></li>
                                        <li><a href="">Product Details</a></li>
                                        <li><a href="">Cart</a></li>
                                        <li><a href="">Checkout</a></li>
                                        <li><a href="">Wishlist</a></li>
                                    </ul>
                                </li>


                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="headerarea__right">

                        <div class="header__cart d-none">
                            <a href="#"> <i class="icofont-cart-alt"></i></a>
                            <div class="header__right__dropdown__wrapper">
                                <div class="header__right__dropdown__inner">
                                    <div class="single__header__right__dropdown">

                                        <div class="header__right__dropdown__img">
                                            <a href="#">
                                                <img src="/frontend/theme2/img/grid/cart1.jpg" alt="photo" width="" height="">
                                            </a>
                                        </div>
                                        <div class="header__right__dropdown__content">

                                            <a href="">Web Directory</a>
                                            <p>1 x <span class="price">$ 80.00</span></p>

                                        </div>
                                        <div class="header__right__dropdown__close">
                                            <a href="#"><i class="icofont-close-line"></i></a>
                                        </div>
                                    </div>

                                    <div class="single__header__right__dropdown">

                                        <div class="header__right__dropdown__img">
                                            <a href="#">
                                                <img src="/frontend/theme2/img/grid/cart2.jpg" alt="photo" width="" height="">
                                            </a>
                                        </div>
                                        <div class="header__right__dropdown__content">

                                            <a href="shop-">Design Minois</a>
                                            <p>1 x <span class="price">$ 60.00</span></p>

                                        </div>
                                        <div class="header__right__dropdown__close">
                                            <a href="#"><i class="icofont-close-line"></i></a>
                                        </div>
                                    </div>

                                    <div class="single__header__right__dropdown">

                                        <div class="header__right__dropdown__img">
                                            <a href="#">
                                                <img src="/frontend/theme2/img/grid/cart3.jpg" width="" height="" alt="photo">
                                            </a>
                                        </div>
                                        <div class="header__right__dropdown__content">

                                            <a href="shop-">Crash Course</a>
                                            <p>1 x <span class="price">$ 70.00</span></p>

                                        </div>
                                        <div class="header__right__dropdown__close">
                                            <a href="#"><i class="icofont-close-line"></i></a>
                                        </div>
                                    </div>
                                </div>

                                <p class="dropdown__price">Total: <span>$1,100.00</span>
                                </p>
                                <div class="header__right__dropdown__button">
                                    <a href="" class="white__color">View Cart</a>
                                    <a href="" class="blue__color">Checkout</a>
                                </div>
                            </div>
                        </div>
                        @auth()
                        <div class="headerarea__login">
                            <a href=""><i class="icofont-user-alt-5"></i></a>
                        </div>
                        @endauth
                        <div class="headerarea__button">
                            <a href="#">İletişim</a>
                        </div>
                    </div>
                </div>

            </div>

        </div>


        <div class="container-fluid mob_menu_wrapper">
            <div class="row align-items-center">
                <div class="col-6">
                    <div class="mobile-logo">
                        <!--<a class="logo__dark" href="#"><img src="{{asset('frontend/theme2/img/logo/logo_dark.png')}}" width="" height="" alt="logo"></a>-->
                        
                         <a class="dark__mode logo__dark" href="/"><img loading="lazy"  src="{{ asset(config('settings.site_logo')) }}" alt="logo" width="220px" height=""></a>
                            <a class="light__mode logo__dark" href="/"><img src="/frontend/theme2/img/logo/logo_dark.png" alt="logo" width="220px" height=""></a>
                    </div>
                </div>
                <div class="col-6">
                    <div class="header-right-wrap">

                        <div class="headerarea__right">
                            <div class="header__cart">
                                <a href="/login"> <i class="icofont-user-alt-5"></i></a>
{{--                              <div class="header__right__dropdown__wrapper">
                                    <div class="header__right__dropdown__inner">
                                        <div class="single__header__right__dropdown">

                                            <div class="header__right__dropdown__img">
                                                <a href="#">
                                                    <img src="/frontend/theme2/img/grid/cart1.jpg" width="" height="" alt="photo">
                                                </a>
                                            </div>
                                            <div class="header__right__dropdown__content">

                                                <a href="shop-">Web Directory</a>
                                                <p>1 x <span class="price">$ 80.00</span></p>

                                            </div>
                                            <div class="header__right__dropdown__close">
                                                <a href="#"><i class="icofont-close-line"></i></a>
                                            </div>
                                        </div>

                                        <div class="single__header__right__dropdown">

                                            <div class="header__right__dropdown__img">
                                                <a href="#">
                                                    <img src="/frontend/theme2/img/grid/cart2.jpg" width="" height="" alt="photo">
                                                </a>
                                            </div>
                                            <div class="header__right__dropdown__content">

                                                <a href="shop-">Design Minois</a>
                                                <p>1 x <span class="price">$ 60.00</span></p>

                                            </div>
                                            <div class="header__right__dropdown__close">
                                                <a href="#"><i class="icofont-close-line"></i></a>
                                            </div>
                                        </div>

                                        <div class="single__header__right__dropdown">

                                            <div class="header__right__dropdown__img">
                                                <a href="#">
                                                    <img src="/frontend/theme2/img/grid/cart3.jpg" width="" height="" alt="photo">
                                                </a>
                                            </div>
                                            <div class="header__right__dropdown__content">

                                                <a href="shop-">Crash Course</a>
                                                <p>1 x <span class="price">$ 70.00</span></p>

                                            </div>
                                            <div class="header__right__dropdown__close">
                                                <a href="#"><i class="icofont-close-line"></i></a>
                                            </div>
                                        </div>
                                    </div>

                                    <p class="dropdown__price">Total: <span>$1,100.00</span>
                                    </p>
                                    <div class="header__right__dropdown__button">
                                        <a href="#" class="white__color">VIEW
                                            CART</a>
                                        <a href="#" class="blue__color">CHECKOUT</a>
                                    </div>
                                </div>
  
  --}}
                                
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
        <div class="mobile-search">
            <form class="search-form" action="#">
                <input type="text" placeholder="Search entire store…">
                <button class="button-search"><i class="icofont icofont-search-2"></i></button>
            </form>
        </div>
        <div class="mobile-menu-wrap headerarea">

            <div class="mobile-navigation">

                <nav>
                    <ul class="mobile-menu">
                        <li class="menu-item-has-children"><a href="">Home</a>
                            <ul class="dropdown">
                                <li class="menu-item-has-children"><a href="">Homes Light</a>
                                    <ul class="dropdown">
                                        <li><a href="">Home (Default)</a></li>
                                        <li><a href="home-">Elegant</a></li>
                                        <li><a href="home-">Classic</a></li>
                                        <li><a href="home-">Classic LMS</a></li>
                                        <li><a href="home-">Online Course </a></li>
                                        <li><a href="home-">Marketplace </a></li>
                                        <li><a href="home-">University</a></li>
                                        <li><a href="home-">eCommerce</a></li>
                                        <li><a href="home-">Kindergarten</a></li>
                                        <li><a href="home-">Machine Learning</a></li>
                                        <li><a href="home-">Single Course</a></li>
                                    </ul>
                                </li>

                                <li class="menu-item-has-children">
                                    <a href="">Homes Dark</a>
                                    <ul class="dropdown">
                                        <li><a href="index-">Home Default (Dark)</a></li>
                                        <li><a href="home-2-">Elegant (Dark)</a></li>
                                        <li><a href="home-3-">Classic (Dark)</a></li>
                                        <li><a href="home-4-">Classic LMS (Dark)</a></li>
                                        <li><a href="home-5-">Online Course (Dark)</a></li>
                                        <li><a href="home-6-">Marketplace (Dark)</a></li>
                                        <li><a href="home-7-">University (Dark)</a></li>
                                        <li><a href="home-8-">eCommerce (Dark)</a></li>
                                        <li><a href="home-9-">Kindergarten (Dark)</a></li>
                                        <li><a href="home-10-">Kindergarten (Dark)</a></li>
                                        <li><a href="home-11-">Single Course (Dark)</a></li>
                                    </ul>
                                </li>

                            </ul>
                        </li>


                        <li class="menu-item-has-children "><a href="#">Pages</a>

                            <ul class="dropdown">
                                <li class="menu-item-has-children">
                                    <a href="#">Get Started 1</a>

                                    <ul class="dropdown">
                                        <li><a href="">About</a></li>
                                        <li><a href="about-">About (Dark)<span class="mega__menu__label new">New</span></a></li>
                                        <li><a href="">Blog</a></li>
                                        <li><a href="blog-">Blog (Dark)</a></li>
                                        <li><a href="blog-">Blog Details</a></li>
                                        <li><a href="blog-details-">Blog Details (Dark)</a></li>
                                    </ul>
                                </li>

                                <li class="menu-item-has-children">
                                    <a href="#">Get Started 2</a>
                                    <ul class="dropdown">
                                        <li><a href="">Error 404</a></li>
                                        <li><a href="error-">Error (Dark)</a></li>
                                        <li><a href="event-">Event Details</a></li>
                                        <li><a href="zoom/zoom-">Zoom<span class="mega__menu__label">Online Call</span></a></li>
                                        <li><a href="zoom/zoom-meetings-">Zoom Meeting (Dark)</a></li>
                                        <li><a href="zoom/zoom-meeting-">Zoom Meeting Details</a></li>
                                    </ul>
                                </li>

                                <li class="menu-item-has-children">
                                    <a href="#">Get Started 3</a>
                                    <ul class="dropdown">
                                        <li><a href="zoom/zoom-meeting-details-">Meeting Details (Dark)</a>
                                        </li>
                                        <li><a href="">Login</a></li>
                                        <li><a href="login-">Login (Dark)</a></li>
                                        <li><a href="#">Maintenance</a></li>
                                        <li><a href="#">Maintenance (Dark)</a></li>
                                        <li><a href="#">Terms & Condition</a></li>
                                    </ul>
                                </li>

                                <li class="menu-item-has-children">
                                    <a href="#">Get Started 4</a>
                                    <ul class="dropdown">
                                        <li><a href="#">Terms & Condition (Dark)</a></li>
                                        <li><a href="#">Privacy Policy</a></li>
                                        <li><a href="#">Privacy Policy (Dark)</a></li>
                                        <li><a href="#">Success Stories</a></li>
                                        <li><a href="#">Success Stories (Dark)</a></li>
                                        <li><a href="#">Work Policy</a></li>
                                    </ul>
                                </li>

                                <li class="menu-item-has-children">
                                    <div class="mega__menu__img">
                                        <a href="#"><img src="/frontend/theme2/img/mega/mega_menu_2.png" width="" height="" alt="Mega Menu"></a>
                                    </div>
                                </li>
                            </ul>
                        </li>



                        <li class="menu-item-has-children "><a href="">Courses</a>

                            <ul class="dropdown">
                                <li class="menu-item-has-children">
                                    <a href="#">Get Started 1</a>

                                    <ul class="dropdown">
                                        <li><a href="">Grid <span class="mega__menu__label">All Courses</span></a></li>
                                        <li><a href="course-">Course Grid (Dark)</a></li>
                                        <li><a href="course-">Course Grid</a></li>
                                        <li><a href="course-grid-">Course Grid (Dark)</a></li>
                                        <li><a href="course-">Course List</a></li>
                                        <li><a href="course-list-">Course List (Dark)</a></li>
                                    </ul>
                                </li>

                                <li class="menu-item-has-children">
                                    <a href="#">Get Started 2</a>
                                    <ul class="dropdown">
                                        <li><a href="course-">Course Details</a></li>
                                        <li><a href="course-details-">Course Details (Dark)</a></li>
                                        <li><a href="course-details-">Course Details 2</a></li>
                                        <li><a href="course-details-2-">Details 2 (Dark)</a></li>
                                        <li><a href="course-details-">Course Details 3</a></li>
                                        <li><a href="course-details-">Details 3 (Dark)</a></li>
                                    </ul>
                                </li>

                                <li class="menu-item-has-children">
                                    <a href="#">Get Started 3</a>
                                    <ul class="dropdown">
                                        <li><a href="dashboard/become-an-">Become An Instructor</a>
                                        <li><a href="dashboard/create-">Create Course <span class="mega__menu__label">Career</span></a></li>
                                        <li><a href="">Instructor</a></li>
                                        <li><a href="instructor-">Instructor (Dark)</a></li>
                                        <li><a href="instructor-">Instructor Details</a></li>
                                        <li><a href="">Course Lesson<span class="mega__menu__label new">New</span></a></li>
                                    </ul>
                                </li>

                                <li class="menu-item-has-children">
                                    <div class="mega__menu__img">
                                        <a href="#"><img src="/frontend/theme2/img/mega/mega_menu_1.png" width="" height="" alt="Mega Menu"></a>
                                    </div>
                                </li>
                            </ul>
                        </li>


                        <li class="menu-item-has-children "><a href="dashboard/admin-">Dashboard</a>

                            <ul class="dropdown">
                                <li class="menu-item-has-children">
                                    <a href="#">Admin</a>

                                    <ul class="dropdown">
                                        <li><a href="dashboard/admin-">Admin Dashboard</a></li>
                                        <li><a href="dashboard/admin-">Admin Profile</a></li>
                                        <li><a href="dashboard/admin-">Message</a></li>
                                        <li><a href="dashboard/admin-">Courses</a></li>
                                        <li><a href="dashboard/admin-">Review</a></li>
                                        <li><a href="dashboard/admin-quiz-">Admin Quiz</a></li>

                                        <li><a href="dashboard/admin-">Settings</a></li>
                                    </ul>
                                </li>

                                <li class="menu-item-has-children">
                                    <a href="#">Instructor</a>
                                    <ul class="dropdown">
                                        <li><a href="dashboard/instructor-">Inst. Dashboard</a></li>
                                        <li><a href="dashboard/instructor-">Inst. Profile</a></li>
                                        <li><a href="dashboard/instructor-">Message</a></li>
                                        <li><a href="dashboard/instructor-">Wishlist</a></li>
                                        <li><a href="dashboard/instructor-">Review</a></li>
                                        <li><a href="dashboard/instructor-my-quiz-">My Quiz</a></li>
                                        <li><a href="dashboard/instructor-order-">Order History</a></li>
                                        <li><a href="dashboard/instructor-">My Courses</a></li>
                                        <li><a href="dashboard/instructor-">Announcements</a></li>
                                        <li><a href="dashboard/instructor-quiz-">Quiz Attempts</a></li>
                                        <li><a href="dashboard/instructor-">Assignment</a></li>
                                        <li><a href="dashboard/instructor-">Settings</a></li>
                                    </ul>
                                </li>

                                <li class="menu-item-has-children">
                                    <a href="#">Student</a>
                                    <ul class="dropdown">
                                        <li><a href="dashboard/student-">Dashboard</a></li>
                                        <li><a href="dashboard/student-">Profile</a></li>
                                        <li><a href="dashboard/student-">Message</a></li>
                                        <li><a href="dashboard/student-enrolled-">Enrolled Courses</a></li>
                                        <li><a href="dashboard/student-">Wishlist</a></li>
                                        <li><a href="dashboard/student-">Review</a></li>
                                        <li><a href="dashboard/student-my-quiz-">My Quiz</a></li>
                                        <li><a href="dashboard/student-">Assignment</a></li>
                                        <li><a href="dashboard/student-">Settings</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>

                        <li class="menu-item-has-children"><a href="">eCommerce</a>
                            <ul class="dropdown">
                                <li><a href="">Shop<span class="mega__menu__label">Online Store</span></a></li>
                                <li><a href="ecommerce/product-">Product Details</a></li>
                                <li><a href="">Cart</a></li>
                                <li><a href="">Checkout</a></li>
                                <li><a href="">Wishlist</a></li>

                            </ul>
                        </li>

                    </ul>
                </nav>

            </div>

        </div>
        <div class="mobile-curr-lang-wrap">
            <div class="single-mobile-curr-lang">
                <a class="mobile-language-active" href="#">Language <i class="icofont-thin-down"></i></a>
                <div class="lang-curr-dropdown lang-dropdown-active">
                    <ul>
                        <li><a href="#">English (US)</a></li>
                        <li><a href="#">English (UK)</a></li>
                        <li><a href="#">Spanish</a></li>
                    </ul>
                </div>
            </div>

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

            <div class="single-mobile-curr-lang">
                <a class="mobile-account-active" href="#">My Account <i class="icofont-thin-down"></i></a>
                <div class="lang-curr-dropdown account-dropdown-active">
                    <ul>
                        <li><a href="">Login</a></li>
                        <li><a href="">/ Create Account</a></li>
                        <li><a href="">My Account</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="mobile-social-wrap">
            <a class="facebook" href="#"><i class="icofont icofont-facebook"></i></a>
            <a class="twitter" href="#"><i class="icofont icofont-twitter"></i></a>
            <a class="pinterest" href="#"><i class="icofont icofont-pinterest"></i></a>
            <a class="instagram" href="#"><i class="icofont icofont-instagram"></i></a>
            <a class="google" href="#"><i class="icofont icofont-youtube-play"></i></a>
        </div>
    </div>
</div>
<!-- Mobile Menu end Here -->