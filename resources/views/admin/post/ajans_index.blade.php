@extends('layouts.layout-admin')
@section('title')
    {{ __('Haberler') }}
@endsection
@section('content')
    <div class="pcoded-inner-content">
        <div class="page-wrapper">
            <div class="page-body">
                <div class="col-sm-12">
                    <!-- Material tab card start -->
                    <div class="card">
                        <div class="card-header">
                                <h5>Material Tab</h5>
                        </div>
                        <div class="card-block">
                            <div class="row">
                                <div class="col-lg-12 col-xl-12">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs md-tabs tabs-left b-none" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active text-left m-2" data-toggle="tab" href="#evrimNews" role="tab">Evrim Haberleri</a>
                                            <div class="slide"></div>
                                        </li>
{{--                                        <li class="nav-item">--}}
{{--                                            <a class="nav-link text-left m-2" data-toggle="tab" href="#profile5" role="tab">AA</a>--}}
{{--                                            <div class="slide"></div>--}}
{{--                                        </li>--}}
{{--                                        <li class="nav-item">--}}
{{--                                            <a class="nav-link text-left m-2" data-toggle="tab" href="#messages5" role="tab">DHA</a>--}}
{{--                                            <div class="slide"></div>--}}
{{--                                        </li>--}}
{{--                                        <li class="nav-item">--}}
{{--                                            <a class="nav-link text-left m-2" data-toggle="tab" href="#settings5" role="tab">CHA</a>--}}
{{--                                            <div class="slide"></div>--}}
{{--                                        </li>--}}
                                    </ul>
                                    <!-- Tab panes -->
                                    <div class="tab-content tabs-left-content card-block col-12">
                                        <div class="container d-flex justify-content-between ">
                                            <h3>Evrim Gümrük Haberleri </h3>
                                            <a href="{{route('post.getAjans')}}" class="btn btn-info">Güncelle</a>
                                        </div>
                                       
                                        <br>
                                        <div class="tab-pane active" id="evrimNews" role="tabpanel">
                                            <table id="evrimNewsDatatable" class="table" >
                                                
                                            </table>                                            
                                        </div>
                                        <div class="tab-pane" id="profile5" role="tabpanel">
                                            <p class="m-0">Anadolu Haber Ajansı Haberleri</p>
                                        </div>
                                        <div class="tab-pane" id="messages5" role="tabpanel">
                                            <p class="m-0">Diyarbakır Haber Ajansı Haberleri</p>
                                        </div>
                                        <div class="tab-pane" id="settings5" role="tabpanel">
                                            <p class="m-0">Cihan Haber Ajansı Haberleri</p>
                                        </div>
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
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">

    
<style>
    md-tabs.tabs-left .nav-item, .md-tabs.tabs-right .nav-item, .tabs-left .nav-item, .tabs-right .nav-item {
       background-color: blanchedalmond;
    }
    .tabs-left, .tabs-right {
        min-width: 197px;

    }
</style>
@endsection
@section('js')
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>


    <script>
        $(function() {
            $('#evrimNewsDatatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{storage_path('app/evrimNews.json')}}",
                columns: [{
                        title: 'İD',
                        data: 'DT_RowIndex',
                        orderable: false,
                        searchable: false,
                        witdh:'5%',

                    },
                    {
                        title: 'Başlık',
                        data: 'title',
                        name: 'title',
                        witdh:'5%',
                    },
                    {
                        title: 'Özet ',
                        data: 'short_detail',
                        name: 'short_detail',
                        witdh:'10%',
                        render: function(e) {
                            return `
                            <p style=" word-break: break-word;text-wrap: normal;">${e}</p>`
                        }
                    },

                    {
                        title: 'Kategori',
                        data: 'category',
                        name: 'category.name',
                        orderable: false,
                        sortable: false,
                        witdh:'10%',

                    },
                    {
                        title: 'Ekleyen Kişi',
                        data: 'user',
                        name: 'author.name',
                        orderable: true,
                        sortable: false,
                        witdh:'10%',

                        render: function(e) {
                            return `${e}`;
                        }
                    },
                    {
                        title: 'Ekelenme Tarihi',
                        data: 'created_at',
                        name: 'created_at',                        
                        witdh:'10%',
                    },
                    {
                        title: 'İşlemler',
                        data: 'action',
                        name: 'action',
                        searchable: false,
                        orderable: false,
                        witdh:'10%',

                        render: function(e) {


                            return `
                        <div class="text-center">
                           <a href="{{ route($modul_name . '.edit') }}/${e}" class="" data-toggle="tooltip" data-placement="top" title="Düzenle"><i class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green"></i></a>
                            <a href="{{ route($modul_name . '.destroy') }}/${e}" onclick="return confirm(\'Silme İşlemi onaylıyormusunuz ?\')"  data-toggle="tooltip" data-placement="top" title="Sil"><i class="feather icon-trash-2 f-w-600 f-16 text-c-red"></i></a>
                        </div>
                        `;
                        }

                    }
                ],
                language: {
                    'url': "{{ asset('i18N/') }}/{{ app()->getLocale() == '' ? Config('app.fallback_locale') : app()->getLocale() }}{{ '.json' }}"
                }
            });


        });
    </script>


    <script type="text/javascript"
            src="https://cookieconsent.popupsmart.com/src/js/popper.js"></script>
    <script>
        window.start.init({Palette:"palette2",Mode:"floating left",
            Theme:"edgeless",ButtonText:"Kabul et",
            Message:"This website uses cookies to ensure you get the best experience on our website.Learn more",
            LinkText:"Detaları incele",Location:"Gizlilik sayfası",Time:"5",})</script>
@endsection
