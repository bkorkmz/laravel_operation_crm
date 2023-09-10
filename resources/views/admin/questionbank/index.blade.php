@extends('layouts.layout-admin')
@section('title')
    {{ __('Soru Grubu Listesi') }}
@endsection
@section('content')
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
                ajax: '{{ route($modul_name.'.index_data') }}',
                columns: [{
                        title: 'İD',
                        data: 'DT_RowIndex',
                        orderable: false,
                        searchable: false,
                    },
                    {
                        title: 'Başlık',
                        data: 'name',
                        name: 'name'
                    },
                    {
                        title: 'Açıklama',
                        data: 'description',
                        name: 'description',
                        orderable: true,
                        sortable: true
                    },
                    {
                        title: 'Soru Sayısı',
                        data: 'questions_count',
                        name: 'questions_count',
                        orderable: true,
                        sortable: true,
                        render: function(data){
                            return   data.questions_count + '<a href="{{ route('question.index') }}/'+data.id+'"><i class="icon feather icon-eye f-w-600 f-16 m-l-15 text-c-orenge"></i>Listele</a>';
                        }
                    },
                    {
                        title: 'Durum',
                        data: 'status',
                        name: 'status',
                        orderable: true,
                        sortable: false,
                        render: function(e) {
                            return `${e}`;
                        }
                    },
                    {
                        title: 'Ekelenme Tarihi',
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        title: 'İşlemler',
                        data: 'action',
                        name: 'action',
                        searchable: false,
                        orderable: false,
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
