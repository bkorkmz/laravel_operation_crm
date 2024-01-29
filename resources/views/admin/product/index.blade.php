@extends('layouts.layout-admin')
@section('title')
    {{ __('Ürünler ') }}
@endsection

@section('content')
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">

    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="card">
                    <div class="card-header">
                        <h3>Ürün Listesi</h3>
                        <a href="{{ route('product.trashed_index') }}" type="button"
                            class="btn btn-warning btn-sm float-right rounded mr-1 " data-toggle="tooltip" data-placement="top"
                            title="Çöp Kutusu"><i class="fa fa-trash"></i></a>
                        <a href="{{ route('product.create') }}" type="button"
                            class="btn btn-primary btn-sm float-right rounded mr-1 "><i class="fa fa-plus"></i>Yeni ekle</a>

                    </div>
                    <div class="card-block table-border-style">
                        <div class="table-responsive">
                            <table id="datatable" class="dataTable table">
                                <thead>

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
@endsection



@section('js')
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    {{--    --}}

    <script>
        $(function() {
            $('#datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('product.index_data') }}',
                columns: [{
                       title: 'ID',
                        data: 'DT_RowIndex',
                        orderable: false,
                        searchable: false,
                    },
                    // {
                    //     title: 'Resim',
                    //     data: 'photo',
                    //     name: 'photo'
                    // },
                    {
                        title: 'Ürün Adı',
                        data: 'name',
                        name: 'name'
                    },

                    {
                        title: 'Durum',
                        data: 'status',
                        name: 'status'
                    },
                    {
                        title: 'Kategori',
                        data: 'stock',
                        name: 'stock'
                    },
                    {
                        title: 'Stok / Fiyat ',
                        data: 'price',
                        name: 'price',
                        render: function(d) { return d}
                    },
                    {
                        title: 'İşlemler',
                        data: 'action',
                        name: 'action',
                        searchable: false,
                        orderable: false
                    }
                ],
                language: {
                    'url': "{{ asset('i18N/') }}/{{ app()->getLocale() == '' ? Config('app.fallback_locale') : app()->getLocale() }}{{ '.json' }}"
                }
            });


        });
    </script>
@endsection
