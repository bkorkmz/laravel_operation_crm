@extends('layouts.layout-admin')
@section('title')
    {{ __('Soru Grubu Listesi') }}
@endsection
@section('content')

    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <div class="pcoded-inner-content">
        <div class="page-wrapper">
            <div class="page-body">
                <div class="">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3>Soru Grubu Listesi</h3>
                                {{-- <a href="{{ route($modul_name . '.trashed_index') }}" type="button"
                                    class="btn btn-warning btn-sm float-right rounded mr-1 " data-toggle="tooltip"
                                    data-placement="top" title="Çöp Kutusu"><i class="fa fa-trash"></i></a> --}}
                                <a href="{{ route($modul_name . '.create') }}" type="button"
                                    class="btn btn-primary btn-sm float-right rounded mr-1 "><i class="fa fa-plus"></i>Yeni
                                    ekle</a>

                            </div>
                            <div class="card-block table-border-style">
                                <div class="table-responsive">
                                    <table id="datatable" class="dataTable table table-hover table-responsive-sm">
                                        <thead>
                                        <th>#</th>
                                        <th>Başlık</th>
                                        <th>Açıklama</th>
                                        <th>Soru Sayısı</th>
                                        <th>Durum</th>
                                        <th>Eklenme Tarihi</th>
                                        <th>İşlemler</th>
                                        </thead>
                                        <tbody>
                                        
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
@endsection
@section('css')

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
                        data: 'DT_RowIndex',
                        orderable: false,
                        searchable: false,
                        width:'5%',
                    },
                    {
                        data: 'name',
                        name: 'name',
                        width:'20%',
                        orderable: false,

                    },
                    {
                        data: 'description',
                        name: 'description',
                        width:'20%',
                        orderable: false,
                        sortable: false,
                          render: function(e) {
                              return  '<div style="width:100%;    text-wrap:balance;">' + $('<div/>').html(e).text() + '</div>';
                        }
                    },
                    {
                        data: 'questions_count',
                        name: 'questions_count',
                        orderable: false,
                        sortable: false,
                        width:'1%',
                        render: function(data){
                            return   '<a href="{{ route('question.index') }}/'+data.id+'" class="btn btn-outline-primary">'+data.questions_count+' <i class="icon feather icon-eye f-w-600 f-16 m-l-15 mr-2 text-c-orenge"></i>Listele</a>';
                        }
                    },
                    {
                        data: 'status',
                        name: 'status',
                        orderable: true,
                        sortable: false,
                        width:'5%',
                        render: function(e) {
                            return `${e}`;
                        }
                    },
                    {
                        data: 'created_at',
                        name: 'created_at',
                        width:'10%',
                    },
                    {
                        data: 'action',
                        name: 'action',
                        searchable: false,
                        orderable: false,
                        width:'10%',
                        render: function(e) {
                            return `
                            <div class="text-center">
                                <a href="{{ route($modul_name.'.edit') }}/${e}" class="" data-toggle="tooltip" data-placement="top" title="Düzenle"><i class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green"></i></a>
                                <a href="{{ route($modul_name.'.delete') }}/${e}" onclick="return confirm(\'Silme İşlemi onaylıyormusunuz ?\')"  data-toggle="tooltip" data-placement="top" title="Sil"><i class="feather icon-trash-2 f-w-600 f-16 text-c-red"></i></a>
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
