



<!-- [ breadcrumb ] end -->
            <div class="pcoded-inner-content">
                <div class="main-body">
                    <div class="page-wrapper">
                        <div class="page-body">
                            <!-- [ page content ] start -->
                            <div class="row">
                                <div class="col-md-12 col-xl-8 row justify-content-around">
                                    <div class="card comp-card col-5">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <h6 class="m-b-25">Makalelerim </h6>
                                                    <h3 class="f-w-700 text-c-blue">{{$contents['articleCount']}}</h3>
                                                    <p class="m-b-0">{{date('d.m.Y')}}</p>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-eye bg-c-blue"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
{{--                                    $articleCount--}}
                                    <div class="card comp-card col-5">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <h6 class="m-b-25">Testlerim </h6>
                                                    <h3 class="f-w-700 text-c-green">{{$contents['testsCount']}}</h3>
                                                    <p class="m-b-0">{{date('d.m.Y')}}</p>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-bullseye bg-c-green"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-12">
                                    <div class="card latest-update-card ">
                                        <div class="card-header">
                                            <h5>Son Eklenen Ürünler</h5>
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
                                        <div class="card-block">
                                            <div class="scroll-widget">
                                                <div class="latest-update-box">
                                                   @foreach($content['products'] as $product)
                                                        <div class="row p-b-30">
                                                            <div class="col-auto text-right update-meta p-r-0">
                                                                <i class="feather icon-briefcase f-w-600 bg-c-orenge update-icon"></i>
                                                            </div>
                                                            <div class="col p-l-5">
                                                                <a target="_blank" href="https://wa.me/{{trim(config('settings.site_whatsapp_phone'))}}?text={{$product->name}}"><h6>{{$product->name}}</h6></a>
                                                                <p class="text-muted m-b-0">Stok: {{$product->stock}} {{-- Fiyat: {{$product->price}}--}}</p>
                                                            </div>
                                                        </div>
                                                   @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 d-none">
                                    <div class="card latest-update-card">
                                        <div class="card-header">
                                            <h5>Son Güncellemeler</h5>
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
                                        <div class="card-block">
                                            <div class="scroll-widget">
                                                <div class="latest-update-box">
                                                    <div class="row p-t-20 p-b-30">
                                                        <div class="col-auto text-right update-meta p-r-0">
                                                            <i class="b-primary update-icon ring"></i>
                                                        </div>
                                                        <div class="col p-l-5">
                                                            <a href="#!"><h6>Yeni Bir Sınav Eklendi </h6></a>
                                                            <p class="text-muted m-b-0">Lorem ipsum dolor sit amet, <a href="#!" class="text-c-blue"> More</a></p>
                                                        </div>
                                                    </div>
                                                    <div class="row p-b-30">
                                                        <div class="col-auto text-right update-meta p-r-0">
                                                            <i class="b-primary update-icon ring"></i>
                                                        </div>
                                                        <div class="col p-l-5">
                                                            <a href="#!"><h6>Yeni Maklemiz Yayında </h6></a>
                                                            <p class="text-muted m-b-0">Lorem dolor sit amet, <a href="#!" class="text-c-blue"> More</a></p>
                                                        </div>
                                                    </div>
                                                    <div class="row p-b-30">
                                                        <div class="col-auto text-right update-meta p-r-0">
                                                            <i class="b-success update-icon ring"></i>
                                                        </div>
                                                        <div class="col p-l-5">
                                                            <a href="#!"><h6>Yeni Ürün Eklendi</h6></a>
                                                            <p class="text-muted m-b-0">Lorem ipsum dolor sit ipsum amet, 
                                                                <a href="#!" class="text-c-green"> More</a></p>
                                                        </div>
                                                    </div>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- sale 2 card end -->

                                <!-- testimonial and top selling start -->
                                <div class="col-md-12">
                                    <div class="card table-card">
                                        <div class="card-header">
                                            <h3>Test Sonuçları</h3>
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
                                            <div class="table-responsive p-20">
                                                <table id="datatable" class="dataTable table table-hover table-responsive-sm">
                                                    <thead >
                                                    <th>#</th>
                                                    <th>Test Adı</th>
                                                    <th>Kullanıcı</th>
                                                    <th>Kayıt Durumu</th>
                                                    <th>Kayıt Tarihi</th>
                                                    <th>İşlemler</th>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- testimonial and top selling end -->



                                <!-- lettest acivity and statustic card start -->

                                <!-- lettest acivity and statustic card end -->

                            </div>
                            <!-- [ page content ] end -->
                        </div>
                    </div>
                </div>
            </div>
   
        