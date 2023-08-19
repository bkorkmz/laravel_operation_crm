@extends('layouts.layout-admin')
@section('title')
    {{ __('Haberler') }}
@endsection
@section('content')
    <div class="pcoded-inner-content">
        <div class="page-wrapper">
            <div class="page-body">
                <div class="">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3>Makaleler</h3>
                                <a href="{{ route($modul_name . '.trashed_index') }}" type="button"
                                    class="btn btn-warning btn-sm float-right rounded mr-1 " data-toggle="tooltip"
                                    data-placement="top" title="Çöp Kutusu"><i class="fa fa-trash"></i></a>
                                <a href="{{ route($modul_name . '.create') }}" type="button"
                                    class="btn btn-primary btn-sm float-right rounded mr-1 "><i class="fa fa-plus"></i>Yeni
                                    ekle</a>

                            </div>
                            <div class="card-block table-border-style">
                                <div class="table-responsive">
                                    <table id="datatable" class="dataTable table table-hover table-responsive-sm">

                                    </table>
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
@endsection
@section('js')
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>


    <script>
        $(function() {
            $('#datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route($modul_name . '.index_data') }}',
                columns: [{
                        title: 'İD',
                        data: 'DT_RowIndex',
                        orderable: false,
                        searchable: false,
                        witdh: '5%',

                    },
                    {
                        title: 'Başlık',
                        data: 'title',
                        name: 'title',
                        witdh: '5%',
                    },
                    {
                        title: 'Özet ',
                        data: 'short_detail',
                        name: 'short_detail',
                        witdh: '10%',
                        render: function(e) {
                            return `
                            <p style=" word-break: break-word;text-wrap:wrap;">${e}</p>`
                        }
                    },

                    {
                        title: 'Kategori',
                        data: 'category',
                        name: 'category.name',
                        orderable: false,
                        sortable: false,
                        witdh: '10%',

                    },
                    {
                        title: 'Ekleyen Kişi',
                        data: 'user',
                        name: 'author.name',
                        orderable: true,
                        sortable: false,
                        witdh: '10%',

                        render: function(e) {
                            return `${e}`;
                        }
                    },
                    {
                        title: 'Ekelenme Tarihi',
                        data: 'created_at',
                        name: 'created_at',
                        witdh: '10%',
                    },
                    {
                        title: 'İşlemler',
                        data: 'action',
                        name: 'action',
                        searchable: false,
                        orderable: false,
                        witdh: '10%',

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
@endsection
