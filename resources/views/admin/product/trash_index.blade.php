@extends('layouts.layout-admin')
@section('title')
    {{ __('Silinen Kullanıcılar') }}
@endsection

@section('content')
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="card">
                    <div class="card-header">
                        <h3>Silinen Ürünler</h3>
                        <a href="{{route('product.index')}}" type="button"
                            class="btn btn-warning btn-sm float-right rounded mr-1 " data-toggle="tooltip" data-placement="top"
                            title="Geri Dön"><i class="fa fa-reply"></i></a>
                    </div>
                    <div class="card-block table-border-style">
                        <div class="table-responsive">
                            <table id="datatable" class="dataTable table">
                               <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    {{--    --}}

    <script>
        $(function() {
            $('#datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('product.trashed_data') }}',
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
                        title: 'Stok',
                        data: 'stock',
                        name: 'stock'
                    },
                    {
                        title: 'Fiyat',
                        data: 'price',
                        name: 'price'
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
