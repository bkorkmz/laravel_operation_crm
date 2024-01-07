@extends('layouts.layout-admin')
@section('title')
    {{ __($model->name) }}
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
                                <h3>Soru Grubu: {{$model->name}}</h3>
                                {{-- <a href="{{ route($modul_name . '.trashed_index') }}" type="button"
                                    class="btn btn-warning btn-sm float-right rounded mr-1 " data-toggle="tooltip"
                                    data-placement="top" title="Çöp Kutusu"><i class="fa fa-trash"></i></a> --}}
                                <a href="{{ route($modul_name . '.questions_add',$model->id) }}" type="button"
                                    class="btn btn-primary btn-sm float-right rounded mr-1 "><i class="fa fa-plus"></i>Yeni
                                    ekle</a>

                            </div>
                            <div class="card-block table-border-style">
                                <div class="table-responsive">
                                    <table id="datatable" class="dataTable table table-hover table-responsive-sm">
                                        <thead>
                                            <th>#</th>
                                            <th>Soru</th>
                                            <th>Durum</th>
                                            <th>Ekelenme Tarihi</th>
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
                responsive:true,
                autoWidth:true,
                ajax: '{{ route($modul_name.'.questions_data',$model->id) }}',
                columns: [{
                      
                        data: 'DT_RowIndex',
                        orderable: false,
                        searchable: false, width:'1%',
                    },
                    {
                        data: 'question',
                        name: 'question',
                        width:'20%',
                        render: function(e) {
                            return  '<div style="width:70%;    text-wrap:balance;">' + $('<div/>').html(e).text() + '</div>';

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
                        name: 'created_at', width:'5%',
                    },
                    {
                        data: 'action',
                        name: 'action',
                        searchable: false,
                        orderable: false, width:'10%',
                        render: function(e) {
                            return `
                             <div class="text-center">
                            <a href="{{ route($modul_name.'.question_show') }}/${e}" class="" data-toggle="tooltip" data-placement="top" title="Görüntüle"><i class="icon feather icon-monitor f-w-600 f-16 m-r-15 text-c-purple"></i></a>
                            <a href="{{ route($modul_name.'.question_edit') }}/${e}" class="" data-toggle="tooltip" data-placement="top" title="Düzenle"><i class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green"></i></a>
                            <a href="{{ route($modul_name.'.question_delete') }}/${e}" onclick="return confirm(\'Silme İşlemi onaylıyormusunuz ?\')"  data-toggle="tooltip" data-placement="top" title="Sil"><i class="feather icon-trash-2 f-w-600 f-16 text-c-red"></i></a>
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
