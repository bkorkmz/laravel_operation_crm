@extends('layouts.layout-admin')
@section('title')
    {{ __('Ürünler ') }}
@endsection

@section('content')

    <div class="card">
        <div class="card-header">
            <h3>Ürün Listesi</h3>
            <a href="{{ route('product.trashed_index') }}" type="button" class="btn btn-warning btn-sm float-right rounded mr-1 " data-toggle="tooltip" data-placement="top" title="Çöp Kutusu"><i class="fa fa-trash"></i></a>
            <a href="{{ route('product.create') }}" type="button" class="btn btn-primary btn-sm float-right rounded mr-1 "><i class="fa fa-plus"></i>Yeni ekle</a>

        </div>
        <div class="card-block table-border-style">
            <div class="table-responsive">
                <table id="datatable" class="dataTable table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Ürün Adı</th>
                        <th>Açıklama</th>
                        <th>Durum</th>
                        <th>Stok Durumu</th>
                        <th>Fiyat</th>
                        <th>İşlemler</th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection



@section('js')
{{--    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">--}}
{{--    <script  src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>--}}
{{--    --}}

    <script>
        $(function() {
            $('#datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{route('product.index_data')}}',
                columns: [
                    {  data: 'DT_RowIndex', orderable: false, searchable: false, },
                    // { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'description', name: 'description' },
                    { data: 'status', name: 'status' },
                    { data: 'quantity', name: 'quantity' },
                    { data: 'price', name: 'price' },
                    { data: 'action', name: 'action',searchable:false,orderable:false }
                ],
                language: {
                    'url': "{{ asset('i18N/')}}/{{app()->getLocale() == '' ? Config('app.fallback_locale') : app()->getLocale()}}{{'.json'}}"
                }
            });


        });

    </script>
@endsection

