@extends('layout-admin')
@section('title')
    {{ __('Firma Sayfası ') }}
@endsection
@section('content')
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">

    <div class="card">
        <div class="card-header">
            <h3>Firma  Listesi</h3>
{{--            <a href="{{ route('company.trashed') }}" type="button" class="btn btn-warning btn-sm float-right rounded mr-1 " data-toggle="tooltip" data-placement="top" title="Çöp Kutusu"><i class="fa fa-trash"></i></a>--}}
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
{{--                        <th>Rolü</th>--}}
                        <th>Onay Durumu</th>
                        <th>Kayıt Tarihi</th>
                        <th>İşlemler</th>
                    </tr>
                    </thead>
                    <tbody>
{{--                    @foreach($users as $user)--}}
{{--                        <tr>--}}
{{--                            <th scope="row">{{ $user->id }}</th>--}}
{{--                            <td>{{ $user->name }}</td>--}}
{{--                            <td>{{ $user->email }}</td>--}}
{{--                            <td>@if($user->status==2) Firma Yetkilisi @elseif($user->status==1) Admin @elseif($user->status==3) İçerik Editörü @else Kullanıcı @endif</td>--}}
{{--                            <td>@if($user->user_check==0)<b class="badge badge-danger rounded ">Onaysız </b>  @elseif($user->user_check==1) <b class="badge badge-success rounded ">Onaylı</b> @endif</td>--}}
{{--                            <td>{{ date('d-m-Y', strtotime($user->created_at)) }}</td>--}}
{{--                            <td>--}}
{{--                                @if($user->id != 1 )--}}
{{--                                    <a href="{{ route('user.edit', $user->id) }}" data-toggle="tooltip" data-placement="top" title="Düzenle"><i class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green"></i></a>--}}
{{--                                    <a href="{{ route('user.destroy', $user->id) }}" onclick="return confirm('Silme İşlemi onaylıyormusunuz ?')"  data-toggle="tooltip" data-placement="top" title="Sil"><i class="feather icon-trash-2 f-w-600 f-16 text-c-red"></i></a>--}}
{{--                                @endif--}}

{{--                            </td>--}}
{{--                        </tr>--}}
{{--                    @endforeach--}}
                    </tbody>
                </table>
{{--                {{ $users->links() }}--}}
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