<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


<head>

    <title>@yield('title') | Yönetim paneli </title>
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>

    <![endif]-->
    <!-- Meta -->

    <meta charset="utf-8">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ config('settings.site_icon') ?? 'Laravel' }}" type="image/x-icon" />

    {{-- <link rel="shortcut icon" type="image/x-icon" href="{{config('settings.site_icon') ?? "Laravel"}}"/> --}}
    {{-- {{dd(config('settings.site_icon'))}} --}}
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:500,700" rel="stylesheet">
    <link href="{{ asset('vendor/dropify/dist/css/dropify.css?v=1.0') }}" rel="stylesheet" type="text/css" />,
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css?v=1.0" rel="stylesheet"/>

    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"> --}}

    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/bower_components/bootstrap/css/bootstrap.min.css?v=1.0') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin/bower_components/bootstrap-maxlength/js/bootstrap-maxlength.js') }}">
    <!-- waves.css -->
        <!-- Style.css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/style.css?v=1.0') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/widget.css?v=1.0') }}">
    <!-- feather icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/icon/feather/css/feather.css?v=1.0') }}">
    <!-- font-awesome-n -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/font-awesome-n.min.css?v=1.0') }}">
    <!-- Chartlist chart css -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">


{{--    <link rel="stylesheet" href="{{asset('admin/bower_components/select2/css/select2.min.css')}}" />--}}
{{--    <!-- Multi Select css -->--}}
{{--    <link rel="stylesheet" type="text/css" href="{{asset('admin/bower_components/bootstrap-multiselect/css/bootstrap-multiselect.css')}}" />--}}
{{--    <link rel="stylesheet" type="text/css" href="{{asset('admin/bower_components/multiselect/css/multi-select.css')}}" />--}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>

        .select2-container {
            font-size: 15px;
            border-radius: 2px;
            border: 1px solid #ccc;
        }
        .select2-results__option--selectable:hover {
            background-color: #abb3ec;
            color: #fff;
        }

        .select2-results__option--selected{
            background-color: #6e87f7;
            color: #fff;
        }
        .select2-results__options {
            max-height: 300px;
            overflow-y: scroll;
        }

        .char-count-style{
            display: flex;
            float: right;
            background-color: blue;
            padding: 1px 15px 0px 8px;
            color: white;
            border-radius: 15%;
        }
        .max-length-reached {
            background-color: #b71515;
        }
    </style>


    @yield('css')

</head>

<body>
    <!-- [ Pre-loader ] start -->
    {{-- <div class="loader-bg">
    <div class="loader-bar"></div>
</div>
<div class="loader-bg">
    <div class="loader-bar"></div>
</div> --}}
    <!-- [ Pre-loader ] end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            <!-- [ Header ] start -->
            <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">
                    <div class="navbar-logo">
                        <a href="/">
                            <img class="img-fluid img-100"
                                src="
{{--                        {{asset('admin/assets/images/logo.png')}} --}}{{ asset(config('settings.site_logo')) }}"
                                alt="Theme-Logo" />
                        </a>
                        <a class="mobile-menu" id="mobile-collapse" href="#!">
                            <i class="feather icon-menu icon-toggle-right"></i>
                        </a>
                        <a class="mobile-options waves-effect waves-light">
                            <i class="feather icon-more-horizontal"></i>
                        </a>
                    </div>
                    <div class="navbar-container container-fluid">
                        <ul class="nav-left">
                            <!--<li class="header-search">-->
                            <!--    <div class="main-search morphsearch-search">-->
                            <!--        <div class="input-group">-->
                            <!--            <span class="input-group-prepend search-close">-->
                            <!--                <i class="feather icon-x input-group-text"></i>-->
                            <!--            </span>-->
                            <!--            <input type="text" class="form-control" placeholder="Enter Keyword">-->
                            <!--            <span class="input-group-append search-btn">-->
                            <!--                <i class="feather icon-search input-group-text"></i>-->
                            <!--            </span>-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--</li>-->
                            <li>
                                <a href="#!" onclick="javascript:toggleFullScreen()"
                                    class="waves-effect waves-light">
                                    <i class="full-screen feather icon-maximize"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('frontend.index') }}" class="waves-effect waves-light"
                                    data-toggle="tooltip" data-placement="top" title="Siteyi Görüntüle">
                                    <i class="feather icon-monitor"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('clear-cache') }}" class="waves-effect waves-light"
                                    data-toggle="tooltip" data-placement="top" title="Cache temizle">
                                    <i class="feather icon-refresh-cw rotate-refresh"></i>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-right">
                            <li class="header-notification">
                                <div class="dropdown-primary dropdown">
                                    <div class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="feather icon-bell"></i>
                                        {{-- <span class="badge bg-c-red">5</span> --}}
                                    </div>
                                    <ul class="show-notification notification-view dropdown-menu"
                                        data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                        <li>
                                            <div class="media">
{{--                                                <img class="img-radius" src="{{asset('assets/images/avatar-4.jpg')}}" alt="Generic placeholder image"> --}}
                                                <div class="media-body">
                                                    <h5 class="notification-user"></h5>
                                                    <p class="notification-msg">Bildirim kutusu boş</p>
                                                    <span class="notification-time"></span>
                                                </div>
                                            </div>
                                        </li>
{{--                                        <li>--}}
{{--                                            <h6>Notifications</h6>--}}
{{--                                            <label class="label label-danger">New</label>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <div class="media">--}}
{{--                                                --}}{{--                                            <img class="img-radius" src="{{asset('assets/images/avatar-4.jpg')}}" alt="Generic placeholder image"> --}}
{{--                                                <div class="media-body">--}}
{{--                                                    <h5 class="notification-user">John Doe</h5>--}}
{{--                                                    <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer--}}
{{--                                                        elit.</p>--}}
{{--                                                    <span class="notification-time">30 minutes ago</span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </li>--}}

                                    </ul>
                                </div>
                            </li>
                            {{-- <li class="header-notification">
                            <div class="dropdown-primary dropdown">
                                <div class="displayChatbox dropdown-toggle" data-toggle="dropdown">
                                    <i class="feather icon-message-square"></i>
                                    <span class="badge bg-c-green">3</span>
                                </div>
                            </div>
                        </li> --}}
                            <li class="user-profile header-notification">

                                <div class="dropdown-primary dropdown">
                                    <div class="dropdown-toggle" data-toggle="dropdown">
                                        <img src="{{ auth()->user()->avatar ?? asset('admin/assets/images/avatar-4.jpg') }}"
                                            class="img-radius" alt="User-Profile-Image">
                                        <span>{{ auth()->user()->name ?? 'Admin' }}</span>
                                        <i class="feather icon-chevron-down"></i>
                                    </div>
                                    <ul class="show-notification profile-notification dropdown-menu"
                                        data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                        @can('view_settings')
                                            <li>
                                            <a href="{{route('settings.index')}}">
                                                <i class="feather icon-settings"></i> Ayarlar

                                            </a>
                                        </li>
                                        @endcan
                                        @can('view_my_profile_users')
                                         <li>
                                            <a href="{{route('profile.index')}}">
                                                <i class="feather icon-user"></i> Profilim

                                            </a>
                                        </li>
                                        @endcan

                                    {{-- <li>
                                        <a href="">
                                            <i class="feather icon-mail"></i> My Messages

                                        </a>
                                    </li> --}}
                                    {{-- <li>
                                        <a href="">
                                            <i class="feather icon-lock"></i> Lock Screen

                                        </a>
                                    </li> --}}
                                        <li>
                                            <a
                                                onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                <i class="feather icon-log-out"></i> @lang('Çıkış yap')
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- [ chat user list ] start -->
            <div id="sidebar" class="users p-chat-user showChat d-none">
                <div class="had-container">
                    <div class="p-fixed users-main">
                        <div class="user-box">
                            <div class="chat-search-box">
                                <a class="back_friendlist">
                                    <i class="feather icon-x"></i>
                                </a>
                                <div class="right-icon-control">
                                    <div class="input-group input-group-button">
                                        <input type="text" id="search-friends" name="footer-email"
                                            class="form-control" placeholder="Search Friend">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary waves-effect waves-light" type="button"><i
                                                    class="feather icon-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="main-friend-list">
                                <div class="media userlist-box waves-effect waves-light" data-id="1"
                                    data-status="online" data-username="Josephin Doe">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-radius img-radius"
                                            src="{{ asset('assets/images/avatar-3.jpg') }}"
                                            alt="Generic placeholder image ">
                                        <div class="live-status bg-success"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="chat-header">Josephin Doe</div>
                                    </div>
                                </div>
                                <div class="media userlist-box waves-effect waves-light" data-id="2"
                                    data-status="online" data-username="Lary Doe">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-radius"
                                            src="{{ asset('assets/images/avatar-2.jpg') }}"
                                            alt="Generic placeholder image">
                                        <div class="live-status bg-success"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Lary Doe</div>
                                    </div>
                                </div>
                                <div class="media userlist-box waves-effect waves-light" data-id="3"
                                    data-status="online" data-username="Alice">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-radius"
                                            src="{{ asset('assets/images/avatar-4.jpg') }}"
                                            alt="Generic placeholder image">
                                        <div class="live-status bg-success"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Alice</div>
                                    </div>
                                </div>
                                <div class="media userlist-box waves-effect waves-light" data-id="4"
                                    data-status="offline" data-username="Alia">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-radius"
                                            src="{{ asset('assets/images/avatar-3.jpg') }}"
                                            alt="Generic placeholder image">
                                        <div class="live-status bg-default"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Alia<small class="d-block text-muted">10 min
                                                ago</small></div>
                                    </div>
                                </div>
                                <div class="media userlist-box waves-effect waves-light" data-id="5"
                                    data-status="offline" data-username="Suzen">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-radius"
                                            src="{{ asset('assets/images/avatar-2.jpg') }}"
                                            alt="Generic placeholder image">
                                        <div class="live-status bg-default"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Suzen<small class="d-block text-muted">15 min
                                                ago</small></div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ chat user list ] end -->

            <!-- [ chat message ] start -->
            {{-- <div class="showChat_inner">
                <div class="media chat-inner-header">
                    <a class="back_chatBox">
                        <i class="feather icon-x"></i> Josephin Doe
                    </a>
                </div>
                <div class="main-friend-chat">
                    <div class="media chat-messages">
                        <a class="media-left photo-table" href="#!">
                            <img class="media-object img-radius img-radius m-t-5"
                                src="{{ asset('assets/images/avatar-2.jpg') }}" alt="Generic placeholder image">
                        </a>
                        <div class="media-body chat-menu-content">
                            <div class="">
                                <p class="chat-cont">I'm just looking around. Will you tell me something about
                                    yourself?</p>
                            </div>
                            <p class="chat-time">8:20 a.m.</p>
                        </div>
                    </div>
                    <div class="media chat-messages">
                        <div class="media-body chat-menu-reply">
                            <div class="">
                                <p class="chat-cont">Ohh! very nice</p>
                            </div>
                            <p class="chat-time">8:22 a.m.</p>
                        </div>
                    </div>
                    <div class="media chat-messages">
                        <a class="media-left photo-table" href="#!">
                            <img class="media-object img-radius img-radius m-t-5"
                                src="{{ asset('assets/images/avatar-2.jpg') }}" alt="Generic placeholder image">
                        </a>
                        <div class="media-body chat-menu-content">
                            <div class="">
                                <p class="chat-cont">can you come with me?</p>
                            </div>
                            <p class="chat-time">8:20 a.m.</p>
                        </div>
                    </div>
                </div>
                <div class="chat-reply-box">
                    <div class="right-icon-control">
                        <div class="input-group input-group-button">
                            <input type="text" class="form-control" placeholder="Write hear . . ">
                            <div class="input-group-append">
                                <button class="btn btn-primary waves-effect waves-light" type="button"><i
                                        class="feather icon-message-circle"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <!-- [ chat message ] end -->


            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <nav class="pcoded-navbar">
                        <div class="nav-list">
                            <div class="pcoded-inner-navbar main-menu">

                                @include('admin.menu');
                            </div>

                        </div>
                    </nav>
                    <div class="pcoded-content">
                        <div class="page-header card">
                            <div class="row align-items-end">
                                <div class="col-lg-8">
                                    <div class="page-header-title">
                                        <i class="feather icon-home bg-c-blue"></i>
                                        <div class="d-inline">
                                            <h5>Yönetim Paneli</h5>
                                            <span>CRM Panel </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 d-none">
                                    <div class="page-header-breadcrumb">
                                        <ul class=" breadcrumb breadcrumb-title">
                                            <li class="breadcrumb-item">
                                                <a href="/"><i class="feather icon-home"></i></a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#">
                                                    {{ request()->path() }}</a> </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @yield('content')
                    </div>
                    <!-- [ style Customizer ] start -->
                    <div id="styleSelector">
                    </div>
                    <!-- [ style Customizer ] end -->
                </div>
            </div>
        </div>
    </div>


    {{-- <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script> --}}
    <script type="text/javascript" src="{{ asset('admin/bower_components/popper.js/js/popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/bower_components/jquery/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/bower_components/jquery-ui/js/jquery-ui.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/bower_components/bootstrap/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/bower_components/bootstrap/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/assets/pages/waves/js/waves.min.js') }}"></script>

    <!-- notification  -->
    <script type="text/javascript" src="{{ asset('admin/assets/js/bootstrap-growl.min.js') }}"></script>
    {{-- <script type="text/javascript" src="{{ asset('admin/assets/pages/notification/notification.js') }}"></script> --}}
    {{-- <script src="{{ asset('admin/assets/js/pcoded.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('admin/assets/js/vertical/vertical-layout.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('admin/assets/js/jquery.mCustomScrollbar.concat.min.js') }}"></script> --}}

    <!-- dropify  -->
    <script src="{{ asset('vendor/dropify/dist/js/dropify.js') }}"></script>

    <!-- Custom js -->
    <script src="{{ asset('admin/assets/js/pcoded.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/vertical/vertical-layout.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/assets/js/script.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/bower_components/jquery-slimscroll/js/jquery.slimscroll.js') }}">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>






    {{-- <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

<script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script> --}}
    {{-- @include('sweetalert::alert') --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    {{-- swich  --}}
    {{-- <script type="text/javascript" src=".{{asset('admin/bower_components/switchery/js\switchery.min.js')}}"></script> --}}


    <script>

        $('.dropify').dropify({
            messages: {
                'default': 'Resim yükle ya da sürükle',
                'replace': 'Resim değiştir ya da sürükle',
                'remove': 'Kaldır',
                'error': 'Hata! Desteklenen dosya tipinden farklı bir dosya yüklediniz.'
            }
        });
    </script>

<script>
    const readFunction = (id) => {
        const url = "{{ route('admin.info_message.edit') }}/" + id;
        // `/admin/info_message/${id}/edit`; // Bu URL'yi ilgili route yapısına uygun olarak güncellemelisiniz
        fetch(url, {
                method: 'GET',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
            })
            .then(response => response.json())
            .then(data => {
                if (data == true) {
                    console.log(data);
                    const labelElement = document.getElementById(`read_${id}`);
                    labelElement.classList.remove('badge-danger');
                    labelElement.classList.add('badge-success');
                    labelElement.textContent = 'Okundu'; // İstediğiniz içeriği buraya ekleyebilirsiniz
                }
            })
            .catch(error => {
                console.error('Fetch hatası:', error);
            });
    };
</script>

    <script>
        class TextareaWithMaxlength {
            constructor(selector) {
                this.textareas = document.querySelectorAll(selector);
                this.init();
            }
            init() {
                this.textareas.forEach(textarea => {
                    const maxLength = textarea.getAttribute('data-maxlength');
                    const charCountSpan = textarea.nextElementSibling;
                    const charCountStyle = textarea.nextElementSibling;

                    textarea.addEventListener('input', () => {
                        let charCount = textarea.value.length;
                        if (charCount >= maxLength) {
                            textarea.value = textarea.value.slice(0, maxLength);
                            charCount = maxLength;
                            charCountStyle.classList.add('max-length-reached');

                        } else {
                            charCountStyle.classList.remove('max-length-reached');
                        }
                        charCountSpan.textContent = `${charCount}/${maxLength}`;
                    });
                });
            }
        }
        new TextareaWithMaxlength('.with-maxlength');
    </script>

    @yield('js')


    @yield('after-js')

</body>


</html>
