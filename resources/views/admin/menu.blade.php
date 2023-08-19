@php
    $menus = menu();
    
    $currentpath = request()->path();
    
    if (strpos($currentpath, 'backend/') === 0) {
        $currentpath = str_replace('backend/', '', $currentpath); // Eğer "backend" başlangıçta varsa sadece path'i alınır
} else {
    $currentpath = explode('/', $currentpath)[0]; // "backend" yoksa ilk parçayı alınır
    }
    
@endphp
{{-- @dd($currentpath,$menus['menu'][1]) --}}

<ul class="pcoded-item pcoded-left-item">


    @foreach ($menus['menu'] as $menuitem)

        @if (permissionCheck($menuitem['permission']) || $menuitem['permission'] == "" )
            {{-- @canany($menuitem['permission']) --}}
            {{-- @dd($menuitem) --}}

            @php
                if (isset($menuitem['submenu'])) {
                    $has_sub = 'pcoded-hasmenu';
                } else {
                    $has_sub = '';
                }
                
            @endphp
            {{-- @dd(isset($menuitem['submenu']),$currentpath) --}}
            @if (preg_match($menuitem['path'], $currentpath)
             )
                <li class="{{ $has_sub }}  active pcoded-trigger">
                @else
                <li class="{{ $has_sub }}">
            @endif
            <a href="{{ $menuitem['route'] != '' ? route($menuitem['route']) : 'javascript:void(0)' }} "
                class="waves-effect waves-dark">
                <span class="pcoded-micon"><i class="{{ $menuitem['icon'] }} "></i></span>
                <span class="pcoded-mtext">{{ $menuitem['text'] }} </span>
                @if ($menuitem['badge'] == 'true')
                    <span class="pcoded-badge label label-danger {{ $menuitem['badge'] }}"></span>
                @endif
            </a>


            @if (isset($menuitem['submenu']))
                <ul class="pcoded-submenu">
                    @foreach ($menuitem['submenu'] as $submenu)
                        {{-- @can($menuitem['permission']) --}}
                        @if (permissionCheck($submenu['permission']) || $menuitem['permission'] == "")
                            @if (preg_match($submenu['path'], $currentpath))
                                <li class="active">
                                @else
                                <li>
                            @endif
                            <a href="{{ $submenu['route'] != '' ? route($submenu['route']) : 'javascript:void(0)' }}"
                                class="waves-effect waves-dark">
                                <span class="pcoded-mtext">{{ $submenu['text'] }}</span>
                                @if ($menuitem['badge'] == 'true')
                                    <span class="pcoded-badge label label-danger {{ $menuitem['badge'] }}"></span>
                                @endif
                            </a>
                            </li>
                        {{-- @endcan --}}
                         @endif
                    @endforeach
                </ul>
            @endif
            </li>
            {{-- @endcanany --}}
        @endif
    @endforeach
</ul>



{{-- 
    
    <li class="pcoded-hasmenu">
        <a href="javascript:void(0)" class="waves-effect waves-dark">
            <span class="pcoded-micon"><i class="feather icon-users"></i></span>
            <span class="pcoded-mtext">Kullanıcılar</span>
        </a>
        <ul class="pcoded-submenu">
            <li class="">
                <a href="{{route("user.index")}}" class="waves-effect waves-dark">
                    <span class="pcoded-mtext">Kullanıcı listesi</span>
                </a>
            </li>
            <li class="">
                <a href="" class="waves-effect waves-dark">
                    <span class="pcoded-mtext">Roller</span>
                </a>
            </li>
            <li class="">
                <a href="" class="waves-effect waves-dark">
                    <span class="pcoded-mtext">Satın Alma</span>
                </a>
            </li>
            <li class="">
                <a href="" class="waves-effect waves-dark">
                    <span class="pcoded-mtext">Destek Masası</span>
                </a>
            </li>
            <li class="">
                <a href="" class="waves-effect waves-dark">
                    <span class="pcoded-mtext">Pazarlama İletişimi</span>
                </a>
            </li>
            <li class="">
                <a href="" class="waves-effect waves-dark">
                    <span class="pcoded-mtext">Geribildirim Yönetimi</span>
                </a>
            </li>
            <li class="">
                <a href="" class="waves-effect waves-dark">
                    <span class="pcoded-mtext">Analitik ve Raporlama</span>
                    <span class="pcoded-badge label label-info ">NEW</span>
                </a>
            </li>
        </ul>
    </li>
    <li class="pcoded-hasmenu">
        <a href="javascript:void(0)" class="waves-effect waves-dark">
            <span class="pcoded-micon"><i class="feather icon-box"></i></span>
            <span class="pcoded-mtext">Ürünler</span>
        </a>
        <ul class="pcoded-submenu">
            <li class="">
                <a href="{{route('product.index')}}" class="waves-effect waves-dark">
                    <span class="pcoded-mtext">Ürün listesi</span>
                </a>
            </li>
        </ul>
    </li>
</ul>
--}}


{{--



    <ul class="pcoded-item pcoded-left-item">
        <li class="active">
            <a href="{{ route('manage.index') }}" class="waves-effect waves-dark">
                                          <span class="pcoded-micon">
                                            <i class="fa fa-home"></i>
                                          </span>
                <span class="pcoded-mtext">Yönetim Anasayfa</span>
            </a>
        </li>
    </ul>
    <ul class="pcoded-item pcoded-left-item">
        <li class="pcoded-hasmenu">
            <a href="javascript:void(0)" class="waves-effect waves-dark">
                                        <span class="pcoded-micon">
                                          <i class="fa fa-users"></i>
                                        </span>
                <span class="pcoded-mtext">Kullanıcı Yönetimi</span>
            </a>
            <ul class="pcoded-submenu">
                <li class="">
                    <a href="{{ route('user.index') }}" class="waves-effect waves-dark">
                        <span class="pcoded-mtext">Kullanıcılar </span>
                    </a>
                </li>
                <li class="">
                    <a href="{{ route('company.index') }}" class="waves-effect waves-dark">
                        <span class="pcoded-mtext">Firmalar </span>
                    </a>
                </li>

            </ul>
        </li>
    </ul>
    <ul class="pcoded-item pcoded-left-item">
        <li class="pcoded-hasmenu">
            <a href="javascript:void(0)" class="waves-effect waves-dark">
                                        <span class="pcoded-micon">
                                          <i class="fa fa-newspaper"></i>
                                        </span>
                <span class="pcoded-mtext">ilan Yönetimi</span>
            </a>
            <ul class="pcoded-submenu">
                <li class="">
                    <a href="{{ route('category.index') }}" class="waves-effect waves-dark">
                        <span class="pcoded-mtext">Meslek Kategorileri</span>
                    </a>
                </li>
                <li class="">
                    <a href="{{ route('post.index') }}" class="waves-effect waves-dark">
                        <span class="pcoded-mtext">Staj İlanları</span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
    <ul class="pcoded-item pcoded-left-item">
        <li>
            <a href="{{route('sliders.index')}}" class="waves-effect waves-dark">
                                          <span class="pcoded-micon">
                                            <i class="fa fa-list-alt"></i>
                                          </span>
                <span class="pcoded-mtext">Slider ayarları</span>
            </a>
        </li>
    </ul>



    <ul class="pcoded-item pcoded-left-item">
        <li class="pcoded-hasmenu">
            <a href="javascript:void(0)" class="waves-effect waves-dark">
                                        <span class="pcoded-micon">
                                          <i class="fa fa-bookmark"></i>
                                        </span>
                <span class="pcoded-mtext">Sayfalar </span>
            </a>
            <ul class="pcoded-submenu">

                        <li class="">
                            <a href="{{ route('page.index') }}" class="waves-effect waves-dark">
                                <span class="pcoded-mtext">Sayfaları Listele</span>
                            </a>
                        </li>
            </ul>
        </li>
    </ul>

    <ul class="pcoded-item pcoded-left-item">
        <li>
            <a href="{{ route('comment.index') }}" class="waves-effect waves-dark">
                                          <span class="pcoded-micon">
                                            <i class="fa fa-comments"></i>
                                          </span>
                <span class="pcoded-mtext">Yorumlar</span>
            </a>
        </li>
    </ul>
    <ul class="pcoded-item pcoded-left-item">
        <li>
            <a href="{{ route('article.index') }}" class="waves-effect waves-dark">
                                          <span class="pcoded-micon">
                                            <i class="fa fa-anchor"></i>
                                          </span>
                <span class="pcoded-mtext">Makaleler</span>
            </a>
        </li>
    </ul>

    <ul class="pcoded-item pcoded-left-item">
        <li>
            <a href="{{ route('themeoptions') }}" class="waves-effect waves-dark">
                                          <span class="pcoded-micon">
                                              <i class="fa fa-paint-brush"></i>
                                          </span>
                <span class="pcoded-mtext">Tema Ayarları</span>
            </a>
        </li>
    </ul>

    <ul class="pcoded-item pcoded-left-item">
        <li>
            <a href="{{ route('message.index') }}" class="waves-effect waves-dark">
                                          <span class="pcoded-micon">
                                            <i class="fa fa-envelope"></i>
                                          </span>


                <span class="pcoded-mtext">İletişim Talepleri
                    @if ($message_count > 0)
                <span class="badge badge-danger">&nbsp;{{$message_count}}</span>
                    @endif
                </span>
            </a>
        </li>
    </ul>
    <ul class="pcoded-item pcoded-left-item">
        <li>
            <a href="{{ route('generalsetting.edit') }}" class="waves-effect waves-dark">
                                          <span class="pcoded-micon">
                                            <i class="fa fa-cog"></i>
                                          </span>
                <span class="pcoded-mtext">Genel Ayarlar</span>
            </a>
        </li>
    </ul>
    @if (auth()->id() == 1)
    <ul class="pcoded-item pcoded-left-item">
        <li>
            <a href="/log-viewer" class="waves-effect waves-dark">
                                          <span class="pcoded-micon">
                                            <i class="fa fa-terminal"></i>
                                          </span>
                <span class="pcoded-mtext">Log Kayıtları</span>
            </a>
        </li>
    </ul>
    @endif

--}}
