@extends('layout-admin')
@section('title')
    {{ __('Silinen Kullanıcılar') }}
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Silinen Kullanıcılar</h3>
            <a onclick="window.history.back();" type="button" class="btn btn-warning btn-sm float-right rounded mr-1 " data-toggle="tooltip" data-placement="top" title="Geri Dön"><i class="fa fa-reply"></i></a>
        </div>
        <div class="card-block table-border-style">
            <div class="table-responsive">
                <table id="datatable" class="dataTable table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Ad Soyad</th>
                        <th>E-Posta</th>
                        <th>Rolü</th>
                        <th>Onay Durumu</th>
                        <th>Kayıt Tarihi</th>
                        <th>İşlemler</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <th scope="row">{{ $user->id }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>@if($user->status==2) Firma Yetkilisi @elseif($user->status==1) Admin @elseif($user->status==3) İçerik Editörü @else Kullanıcı @endif</td>
                            <td>@if($user->user_check==0)<b class="badge badge-danger rounded ">Onaysız </b>
                                @elseif($user->user_check==1) <b class="badge badge-success rounded ">Onaylı</b>
                                @endif</td>
                            <td>{{ date('d-m-Y', strtotime($user->created_at)) }}</td>
                            <td>
                                @if($user->id != 1 || $user->status == 1)
{{--                                    <a href="{{ route('user.edit', $user->id) }}" data-toggle="tooltip" data-placement="top" title="Düzenle"><i class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green"></i></a>--}}
                                    <a href="{{ route('user.restore', $user->id) }}"  data-toggle="tooltip" data-placement="top" title="Geri Gönder"><i class="feather icon-refresh-ccw f-w-600 f-16 m-r-15 text-c-blue"></i></a>
                                    <a href="{{ route('user.trash', $user->id) }}" onclick="return confirm('Silme İşlemi onaylıyormusunuz ?')"  data-toggle="tooltip" data-placement="top" title="Sil"><i class="feather icon-trash-2 f-w-600 f-16 text-c-red"></i></a>
                                @endif

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
{{--                {{ $users->links() }}--}}
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
            $(document).ready(function() {
                $('#datatable').DataTable({
                "pagingType": "full_numbers"

            });

        });

    </script>
@endsection