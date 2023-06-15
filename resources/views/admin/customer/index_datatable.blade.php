@extends('layout-admin')
@section('title')
    {{ __('Kullanıcılar Sayfası ') }}
@endsection
@section('content')
<div class="pcoded-inner-content">
    <div class="main-body">
        <div class="page-wrapper">
            
    <div class="card">
        <div class="card-header">
            <h3>Kullanıcı Listesi</h3>
            <a href="{{ route('user.trashed') }}" type="button" class="btn btn-warning btn-sm float-right rounded mr-1 " data-toggle="tooltip" data-placement="top" title="Çöp Kutusu"><i class="fa fa-trash"></i></a>
            <a href="{{ route('user.create') }}" type="button" class="btn btn-primary btn-sm float-right rounded mr-1 "><i class="fa fa-plus"></i>Yeni ekle</a>

        </div>
        <div class="card-block table-border-style">
            <div class="table-responsive">
                <table id="datatable" class="dataTable table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Ad Soyad</th>
                        <th>E Posta</th>
                        <th>Rolü</th>
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
@endsection



@section('js')
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <script  src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>


    <script>
        $(function() {
            $('#datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{route('user.index_data')}}',
                columns: [
                    {  data: 'DT_RowIndex', orderable: false, searchable: false, },
                    // { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' },
                    { data: 'status', name: 'status' },
                    { data: 'user_check', name: 'user_check' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'action', name: 'action',searchable:false,orderable:false }
                ]
            });

        });

    </script>
@endsection