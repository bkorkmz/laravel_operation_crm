@extends('layout-admin')
@section('title')
    {{ __('Firma Sayfası ') }}
@endsection
@section('content')
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="card">
        <div class="card-header">
            <h3>Firma  Listesi</h3>
            <a href="{{ route('company.create') }}" type="button" class="btn btn-primary btn-sm float-right rounded mr-1 "><i class="fa fa-plus"></i>Yeni ekle</a>

        </div>
        <div class="card-block table-border-style">
            <div class="table-responsive">
                <table id="datatable" class="dataTable table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Ad Soyad</th>
                        <th>Firma adı</th>
                        <th>E Posta</th>
                        <th>Onay Durumu</th>
                        <th>Kayıt Tarihi</th>
                        <th>İşlemler</th>
                    </tr>
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
  
@endsection



@section('js')
{{--    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">--}}
    <script  src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>


    <script>
        $(function() {
            $('#datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{route('company.index_data')}}',
                columns: [
                    { data: 'DT_RowIndex', orderable: false, searchable: false,},
                    { data: 'name', name: 'name' },
                    { data: 'company', name: 'company' },
                    { data: 'email', name: 'email' },
                    // { data: 'status', name: 'status' },
                    { data: 'user_check', name: 'user_check' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'action', name: 'action',searchable:false,orderable:false }
                ]
            });

        });

    </script>
@endsection