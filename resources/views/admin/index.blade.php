@extends('layouts.layout-admin')
@section('title')
    {{ __('Yönetim Paneli') }}
@endsection
@section('content')
    

    <!-- [ breadcrumb ] end -->

    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <!-- [ page content ] start -->
                    <div class="row">
{{--                        @if($user_count > 0)--}}
                            <div class="col-xl-3 col-md-12">
                                <div class="card comp-card">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h6 class="m-b-25">Aktif Takım Üyesi</h6>
                                                <h3 class="f-w-700 text-c-green">{{$user_count}}</h3>
                                                <p class="m-b-0">{{date('d.m.Y')}}</p>
                                            </div>
                                            <div class="col-auto card_area_icon">
                                                <i class="fas fa-eye bg-c-blue"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
{{--                        @endif--}}
                        @if($total_services > 0 )
                             <div class="col-xl-3 col-md-6">
                            <div class="card comp-card">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="m-b-25">Toplam Hizmet</h6>
                                            <h3 class="f-w-700 text-c-blue">{{$total_services}}</h3>
                                            <p class="m-b-0">{{date('d.m.Y')}}</p>
                                        </div>
                                        <div class="col-auto card_area_icon">
                                            <i class="fas fa-bullseye bg-c-green"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        @endif
{{--                        @if($total_article > 0)--}}
                                <div class="col-xl-3 col-md-6">
                                    <div class="card comp-card">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <h6 class="m-b-25">Toplam Makale</h6>
                                                    <h3 class="f-w-700 text-c-yellow">{{$total_article}}</h3>
                                                    <p class="m-b-0">{{date('d.m.Y')}}</p>
                                                </div>

                                                <div class="col-auto card_area_icon">
                                                    <i class="fas fa-hand-paper bg-c-yellow"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
{{--                        @endif--}}
{{--                            @if( $newsletterCount > 0)--}}
                                <div class="col-xl-3 col-md-6">
                                    <div class="card comp-card">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <h6 class="m-b-25"><a class="badge badge-lg badge-primary" href="{{route('newsletter_download')}}">Mail Listesini indir </a> </h6>
                                                    <h3 class="f-w-700 text-c-green">{{$newsletterCount}}</h3>
                                                    <p class="m-b-0">Güncellenme : {{$newsletterCount > 0 ? $newsletter[0]->created_at->format('d.m.y. H:i') : date('d.m.Y H:i')}}</p>
                                                </div>
                                                <div class="col-auto card_area_icon">
                                                    <i class="fas fa-paper-plane bg-c-lite-green"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
{{--                            @endif--}}
                    </div>
                   
                        <!-- product profit end -->

                        <!-- lattest update, new client start -->
                    <div class="row">
                        <div class="col-xl-4 col-md-12">
                            <div class="card latest-update-card">
                                <div class="card-header">
                                    <h5>Son İletişim Mesajları</h5>
                                    <div class="card-header-right">
                                        <ul class="list-unstyled card-option">
                                            <li class="first-opt"><i class="feather icon-chevron-left open-card-option"></i>
                                            </li>
                                            <li><i class="feather icon-maximize full-card"></i></li>
                                            <li><i class="feather icon-minus minimize-card"></i></li>
                                            <li><i class="feather icon-refresh-cw reload-card"></i></li>
                                            <li><i class="feather icon-trash close-card"></i></li>
                                            <li><i class="feather icon-chevron-left open-card-option"></i></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-block">
                                    <div class="latest-update-box">
                                        @foreach ($infoMessages as $message )
                                            <div class="row p-b-30">
                                                <div class="col-auto text-right update-meta p-r-0">
                                                    <i class="feather {{$message->publish == 0 ?'icon-briefcase bg-c-red' :'icon-check f-w-600 bg-c-green'}} update-icon"></i>
                                                </div>
                                                <div class="col p-l-5">
                                                    <a href="{{route('admin.info_message')}}">
                                                        <h6>{{$message->subject}}</h6>
                                                    </a>
                                                    <p class="text-muted m-b-0">{{$message->title}} - {{$message->email}}</p>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- testimonial and top selling start -->
                        <div class="col-xl-8 col-md-12">
                            <div class="card table-card">
                                <div class="card-header">
                                    <h5>Teklif Mesajları</h5>
                                    <div class="card-header-right">
                                        <ul class="list-unstyled card-option">
                                            <li class="first-opt"><i class="feather icon-chevron-left open-card-option"></i></li>
                                            <li><i class="feather icon-maximize full-card"></i></li>
                                            <li><i class="feather icon-minus minimize-card"></i></li>
                                            <li><i class="feather icon-refresh-cw reload-card"></i></li>
                                            <li><i class="feather icon-trash close-card"></i></li>
                                            <li><i class="feather icon-chevron-left open-card-option"></i></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-block p-b-0">
                                    <div class="table-responsive">
                                        <table class="table table-hover m-b-0">
                                            <thead>
                                            <tr>
                                                <td>ID</td>
                                                <th>Ad-Soyad</th>
                                                <th>Email</th>
                                                <th>Telefon</th>
                                                <th>Durum</th>
                                                <th>Eylem</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($requestForm as $r_form )

                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$r_form->title}}</td>
                                                    <td>{{$r_form->email}}</td>
                                                    <td>{{$r_form->phone}}</td>
                                                    <td>
                                                        @if ($r_form->publish == 1)
                                                            <label id="read_{{$r_form->id }}"
                                                                   class="badge badge-success">Okundu</label>
                                                        @elseif($r_form->publish == 0)
                                                            <label id="read_{{$r_form->id }}" class="badge badge-danger">Bekliyor</label>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <button type="button"
                                                                class="btn btn-mini btn-info btn-round  waves-effect"
                                                                onclick='readFunction({{ $r_form->id }})'> İletişim Kur
                                                        </button>




                                                    </td>

                                                </tr>
                                            @endforeach

                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>    
      
                </div>
                
            </div>
        </div>
    </div>

@endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/widget.css') }}">
    <style>        
         .card_area_icon {
             top: 16px;
             position: absolute;
             right: 0;
         }
    </style>
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/bower_components/switchery/css/switchery.min.css') }}">
@stop
@section('js')
    <script type="text/javascript" src="{{asset('admin/bower_components/popper.js/js/popper.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/bower_components/switchery/js/switchery.min.js')}}"></script>

    <script type="text/javascript" src="{{asset('admin/assets/pages/advance-elements/swithces.js')}}"></script>


@stop