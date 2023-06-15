@extends('layout-admin')
@section('title')
    {{ __('Silinen  Sayfalar') }}
@endsection
@section('content')
<div class="pcoded-inner-content">
    <div class="main-body">
        <div class="page-wrapper">
            
    <div class="card">
        <div class="card-header">
            <h3>Silinen Sayfalar</h3>
            <a onclick="window.history.back();" type="button" class="btn btn-warning btn-sm float-right rounded mr-1 " data-toggle="tooltip" data-placement="top" title="Geri Dön"><i class="fa fa-reply"></i></a>
        </div>
        <div class="card-block table-border-style">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Başlık</th>
                        <th>Durumu</th>
                        <th>Eklenme Tarihi</th>
                        <th>Silinme Tarihi</th>
                        <th>İşlemler</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($pages as $page)
                        <tr>
                            <th scope="row">{{ $page->id }}</th>
                            <td>{{ $page->title }}</td>
                            <td>
                                @if($page->publish==0)
                                    <label class="label label-success">Yayında</label>
                                @elseif($page->publish==1)
                                    <label class="label label-danger">Taslak</label>
                                @endif
                            </td>
                            <td>{{ date('d-m-Y', strtotime($page->created_at)) }}</td>
                            <td>{{ date('d-m-Y', strtotime($page->deleted_at)) }}</td>
                            <td>
                                    <a href="{{ route('page.restore', $page->id) }}" data-toggle="tooltip" data-placement="top" title="Geri Gönder"><i class="feather icon-refresh-ccw f-w-600 f-16 m-r-15 text-c-blue"></i></a>
                                    <a href="{{ route('page.trashed', $page->id) }}" data-toggle="tooltip" data-placement="top" title="Sil" onclick="return confirm('Silme İşlemi onaylıyormusunuz ?')" ><i class="feather icon-trash-2 f-w-600 f-16 text-c-red"></i></a>


                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
        </div>
    </div>
</div>
@endsection
