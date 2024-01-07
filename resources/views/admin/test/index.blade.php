@extends('layouts.layout-admin')
@section('title')
    {{ __('Test  Sayfası') }}
@endsection



@section('content')
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">

    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="card">
                        <div class="card-header">
                            <h3>Test Listesi</h3>
                            {{-- <a href="{{ route('user.teams.trashed') }}" type="button"
                                class="btn btn-warning btn-sm float-right rounded mr-1 " data-toggle="tooltip"
                                data-placement="top" title="Çöp Kutusu"><i class="fa fa-trash"></i></a> --}}
                            <a href="{{ route($module_name.'.create') }}" type="button"
                                class="btn btn-primary btn-sm float-right rounded mr-1 "><i class="fa fa-plus"></i>Yeni ekle</a>

                        </div>
                        <div class="card-block table-border-style">
                            <div class="table-responsive">
                                <table id="datatable" class="dataTable table table-hover table-responsive-sm">
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
@endsection


@section('css')
<link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">

<style>
.slider__images{

border-radius: 26%;
object-fit: cover;
max-width: 80px;
height: auto;

}


</style>



@endsection

@section('js')
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>


    <script>
        $(function() {
            $('#datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route($module_name.'.index_data') }}',
                columns: [{
                        title: 'ID',
                        data: 'id',
                        name: 'id'
                    },
                    {
                        title: "Adı",
                        data: 'name',
                        name: 'name'
                    },
                    {
                        title: 'Durum',
                        data: 'status',
                        name: 'status',
                        render: function(e) {
                            let text = "";
                            let price = "";
                            if (e == 1){
                                text = "<span class='badge badge-success'>Aktif</span>";
                            }else {
                                text = "<span class='badge badge-danger'>Pasif</span>";
                            }

                            return `
                        <div class="text-center">
                                          ${text}                          
                        </div>
                        `;
                        }
                    },
                    {            
                        title: 'Kayıt Durumu ',
                        data: 'wage_status',
                        name: 'wage_status',
                        render: function(e) {
                            let text = "";
                            let price = e.price;
                            if (e.wage_status == 'pay'){
                                text = "<span class='badge badge-warning'>Ücretli  - Fiyat: "+price+" </span>";
                            }else {
                                text = "<span class='badge badge-info'>Ücretsiz</span>";
                            }
                            
                            return `
                        <div class="text-center">
                             ${text}                          
                        </div>
                        `;
                        }
                    },
                    {
                        title: "Kayıt Tarihi",
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        title: "İşlemler",
                        data: 'action',
                        name: 'action',
                        render: function(e) {
                            return `
                        <div class="text-center">
                            <a href="{{ route($module_name . '.edit') }}/${e}" class="" data-toggle="tooltip" data-placement="top" title="Düzenle"><i class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green"></i></a>
                            <a href="{{ route($module_name . '.show') }}/${e}" class="" data-toggle="tooltip" data-placement="top" title="Görüntüle"><i class="icon feather icon-monitor f-w-600 f-16 m-r-15 text-c-blue"></i></a>
                            <a href="{{ route($module_name . '.destroy') }}/${e}" onclick="return confirm(\'Silme İşlemi onaylıyormusunuz ?\')"  data-toggle="tooltip" data-placement="top" title="Sil"><i class="feather icon-trash-2 f-w-600 f-16 text-c-red"></i></a>
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

        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
@endsection
