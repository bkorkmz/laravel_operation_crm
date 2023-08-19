@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


{{-- 
@php $menus = menu();
    
    $currentpath = request()->path();
    
    if (strpos($currentpath, 'backend/') === 0) {
        $currentpath = str_replace('backend/', '', $currentpath); // Eğer "backend" başlangıçta varsa sadece path'i alınır
} else {
    $currentpath = explode('/', $currentpath)[0]; // "backend" yoksa ilk parçayı alınır
    }
    
@endphp

<ul class="pcoded-item pcoded-left-item">


    @foreach ($menus['menu'] as $menuitem)
        @canany($menuitem['permission'])
            @php
                if (isset($menuitem['submenu'])) {
                    $has_sub = 'pcoded-hasmenu';
                } else {
                    $has_sub = '';
                }
            @endphp

        @endphp
            @if(preg_match($menuitem['path'], $currentpath))
                <li class="{{ $has_sub}}  active pcoded-trigger">
                @else
                <li class="{{ $has_sub }}">
            @endif
            <a href="{{ $menuitem['route'] != '' ? route($menuitem['route']) : 'javascript:void(0)' }} "
                class="waves-effect waves-dark">
                <span class="pcoded-micon"><i class="{{ $menuitem['icon'] }} "></i></span>
                <span class="pcoded-mtext">{{ $menuitem['text'] }} </span>
                @if ($menuitem['badge'] == 'true')
                                    <span class="pcoded-badge label label-danger {{ $menuitem['badge']}}">1</span>

                @endif
            </a>

            @if (isset($menuitem['submenu']))
                @canany($menuitem['permission'])
                    <ul class="pcoded-submenu">
                        @foreach ($menuitem['submenu'] as $submenu)
                            @if (preg_match($submenu['path'], $currentpath))
                                <li class="active">
                                @else
                                <li>
                            @endif
                            <a href="{{ $submenu['route'] != '' ? route($submenu['route']) : 'javascript:void(0)' }}"
                                class="waves-effect waves-dark">
                                <span class="pcoded-mtext">{{ $submenu['text'] }}</span>
                            </a>
                            </li>
                        @endforeach
                    </ul>
                @endcanany
            @endif
            </li>
        @endcanany
    @endforeach
</ul>











    ///////////////////////////////
    {
  "menu": [
    {
      "text": "Ana Sayfa",
      "icon": "feather icon-home",
      "route": "admin.index",
      "path": "/^backend/",
      "badge": "false",
      "permission": ""
    },
    {
      "text": "Kullanıcı Ayarları",
      "icon": "feather icon-users",
      "route": "",
      "path": "/^(user|roles)$/",
      "badge": "false",
      "permission": [
        "view_menu_users",
        "view_menu_roles"
      ],
      "submenu": [
        {
          "text": "Kullanıcı Listesi",
          "icon": "feather icon-users",
          "route": "user.index",
          "path": "/^user/",
          "badge": "false",
          "permission": [
            "view_menu_users"
          ]
        },
        {
          "text": "Roller",
          "icon": "",
          "route": "roles.index",
          "path": "/^roles/",
          "badge": "false",
          "permission": [
            "view_menu_roles"
          ]
        },
        {
          "text": "Satın Alma",
          "icon": "",
          "route": "",
          "path": "/^user(\\/$|\\/sales)/",
          "badge": "false",
          "permission": [
            ""
          ]
        },
        {
          "text": "Destek Masası",
          "icon": "",
          "route": "",
          "path": "/^user(\\/$|\\/help)/",
          "badge": "false",
          "permission": [
            ""
          ]
        },
        {
          "text": "Pazarlama İletişimi",
          "icon": "",
          "route": "",
          "path": "/^user(\\/$|\\/sales-info)/",
          "badge": "false",
          "permission": [
            ""
          ]
        },
        {
          "text": "Geribildirim Yönetimi",
          "icon": "",
          "route": "",
          "path": "/^user(\\/$|\\/feedback)/",
          "badge": "false",
          "permission": [
            ""
          ]
        }
      ]
    },
    {
      "text": "Haber Bülteni ",
      "icon": "feather icon-globe",
      "route": "",
      "path": "/^(post)$/",
      "badge": "false",
      "permission": [
        "view_menu_post",
        "view_menu_category",
        "view_menu_photogallery",
        "view_menu_videogallery",
        "view_menu_comment"
      ],
      "submenu": [
        {
          "text": "Haber Listesi",
          "icon": "feather icon-users",
          "route": "post.index",
          "path": "/^post/",
          "badge": "false",
          "permission": [
            "view_menu_post",
            "view_all_post"
          ]
        },
        {
          "text": "Foto Galeri",
          "icon": "",
          "route": "",
          "path": "/^photo_gallery/",
          "badge": "false",
          "permission": [
            "view_photogallery",
            "view_all_photogallery"
          ]
        },
        {
          "text": "Video Galeri",
          "icon": "",
          "route": "",
          "path": "/^video_gallery/",
          "badge": "false",
          "permission": [
            "view_videogallery",
            "view_all_videogallery"
          ]
        }
      ]
    },
    {
      "text": "Ürünler",
      "icon": "feather icon-pie-chart",
      "route": "product.index",
      "path": "/^product/",
      "badge": "false",
      "permission": [
        "view_menu_product",
        "view_product"
      ],
      "submenu": [
        {
          "text": "Ürün Listesi",
          "icon": "feather icon-users",
          "route": "product.index",
          "path": "/^product/",
          "badge": "false",
          "permission": [
            "view_product"
          ]
        }
      ]
    },
    {
      "text": "Kategoriler",
      "icon": "feather icon-layers",
      "route": "category.index",
      "path": "/^category/",
      "badge": "false",
      "permission": [
        "view_menu_category",
        "view_category"
      ]
    },
    {
      "text": "Makaleler",
      "icon": "feather icon-pie-chart",
      "route": "",
      "path": "/^article/",
      "badge": "false",
      "permission": [
        "view_menu_article",
        "view_article"
      ],
      "submenu": [
        {
          "text": "Makaleler Listesi",
          "icon": "feather icon-users",
          "route": "article.index",
          "path": "/^article/",
          "badge": "false",
          "permission": [
            "view_article"
          ]
        }
      ]
    },
    {
      "text": "Yorum Yönetimi",
      "icon": "feather icon-message-square",
      "route": "",
      "path": "/^comments/",
      "badge": "true",
      "permission": [
        "view_menu_comment"
      ],
      "submenu": [
        {
          "text": "Yorumlar",
          "icon": "",
          "route": "",
          "path": "/^comments/",
          "badge": "false",
          "permission": [
            "view_comment",
            "view_all_comment"
          ]
        }
      ]
    },
    {
      "text": "Ayarlar",
      "icon": "feather icon-settings",
      "route": "",
      "path": "/^settings/",
      "badge": "false",
      "permission": [
        "view_menu_settings",
        "view_settings"
      ],
      "submenu": [
        {
          "text": "Sistem  Ayarları ",
          "icon": "feather icon-users",
          "route": "settings.index",
          "path": "/^settings/",
          "badge": "false",
          "permission": [
            "view_menu_settings"
          ]
        }
      ]
    }
  ]
}
    
    
    
    --}}