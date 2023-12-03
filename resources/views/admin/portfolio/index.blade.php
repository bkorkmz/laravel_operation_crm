@extends('layouts.layout-admin')
@section('title')
    {{ __('PortFolyo Sayfası ') }}
@endsection



@section('content')
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">

    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="card">
                        <div class="card-header">
                            <h3>PortFolyo Listesi</h3>
                            {{-- <a href="{{ route('user.teams.trashed') }}" type="button"
                                class="btn btn-warning btn-sm float-right rounded mr-1 " data-toggle="tooltip"
                                data-placement="top" title="Çöp Kutusu"><i class="fa fa-trash"></i></a> --}}
                            <a href="{{ route($module_name.'.create') }}" type="button"
                                class="btn btn-primary btn-sm float-right rounded mr-1 "><i class="fa fa-plus"></i>Yeni
                                ekle</a>

                        </div>
                        <div class="card-block table-border-style">
                            <div class="dt-responsive table-responsive">
                                <table id="datatable" class="dataTable table table-hover table-responsive-sm nowrap">
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
                columns: [
                   {
                        title: "Adı",
                        data: 'name',
                        name: 'name'
                    },
                    {
                        title: "Logo",
                        data: 'image',
                        name: 'image',
                    },

           
                    {
                        title: 'Kategori',
                        data: 'category_name',
                        name: 'category_name'
                    },
                    // {
                    //     title: 'Bağlantı Linki',
                    //     data: 'link',
                    //     name: 'link'
                    // },
               
                    {
                        title: 'Durum',
                        data: 'status',
                        name: 'status'
                    },
                    // {
                    //     title: "Kayıt Tarihi",
                    //     data: 'created_at',
                    //     name: 'created_at'
                    // },
                    {
                        title: "İşlemler",
                        data: 'action',
                        name: 'action',
                        class: 'text-center',
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
