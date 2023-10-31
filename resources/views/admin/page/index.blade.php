@extends('layouts.layout-admin')

@section('title')
    {{ __('Tüm Sayfalar') }}
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
                <div class="row">
                    <div class="col-4">
                        <h3>Sayfa Listesi</h3>
                    </div>
                    <div class="col-8">
                        <div class="float-right">
                            <a href="{{ route($modul_name.'.trashed') }}" type="button" class="btn btn-warning btn-sm float-right rounded mr-1 " data-toggle="tooltip" data-placement="top" title="Çöp Kutusu"><i class="fa fa-trash"></i></a>
                            <a href="{{ route($modul_name.'.create') }}" type="button" class="btn btn-primary btn-sm float-right rounded mr-1 " ><i class="fa fa-plus"></i>Yeni ekle</a>
                        </div>
                    </div>
                </div>
        </div>
        <div class="card-block table-border-style">
            <div class="table-responsive">
                <table id="datatable" class="table">
          
                </table>
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
                ajax: '{{ route($modul_name.'.index_data') }}',
                columns: [{
                    title: 'İD',
                    data: 'DT_RowIndex',
                    orderable: false,
                    searchable: false,
                },
                    {
                        title: 'Başlık',
                        data: 'title',
                        name: 'title'
                    },
                  
                 
                    {
                        title: 'Durum',
                        data: 'publish',
                        name: 'publish',
                        orderable: true,
                        sortable: false,
                        render: function(e) {
                            if (e == 0){
                                return 'Yayında';
                            }else {
                                return 'Taslak';
                            }
                           
                        }
                    },
                    {
                        title: 'Sayfa Türü',
                        data: 'type',
                        name: 'type'
                    },
                    {
                        title: 'İşlemler',
                        data: 'action',
                        name: 'action',
                        class:'text-center',
                        searchable: false,
                        orderable: false,
                        render: function(e) {
                            return `
                        <div class="text-center">
                            <a href="{{ route($modul_name.'.edit') }}/${e}" class="" data-toggle="tooltip" data-placement="top" title="Düzenle"><i class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green"></i></a>
                            <a href="{{ route($modul_name.'.destroy') }}/${e}" onclick="return confirm(\'Silme İşlemi onaylıyormusunuz ?\')"  data-toggle="tooltip" data-placement="top" title="Sil"><i class="feather icon-trash-2 f-w-600 f-16 text-c-red"></i></a>
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
