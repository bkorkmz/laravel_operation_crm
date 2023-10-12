@extends('layouts.layout-admin')

@section('title')
    {{ __('Tüm Sayfalar') }}
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Sayfa Listesi</h3>
            <a href="{{ route($modul_name.'.trashed') }}" type="button" class="btn btn-warning btn-sm float-right rounded mr-1 " data-toggle="tooltip" data-placement="top" title="Çöp Kutusu"><i class="fa fa-trash"></i></a>
            <a href="{{ route($modul_name.'.create') }}" type="button" class="btn btn-primary btn-sm float-right rounded mr-1 " ><i class="fa fa-plus"></i>Yeni ekle</a>
        </div>
        <div class="card-block table-border-style">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Başlık</th>
                        <th>Eklenme Tarihi</th>
                        <th>Durumu</th>
                        <th>Sayfa tipi</th>
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
