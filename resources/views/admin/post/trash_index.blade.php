@extends('layout-admin')
@section('title')
    {{ __('Silinen İlanlar') }}
@endsection
@push('css')
    {{--    <link href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet"> --}}
@endpush


@section('content')
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="card">
                    <div class="card-header">
                        <h3>Silinen İlanlar</h3>
                        <a onclick="window.history.back();" type="button"
                            class="btn btn-warning btn-sm float-right rounded mr-1 " data-toggle="tooltip" data-placement="top"
                            title="Geri Dön"><i class="fa fa-reply"></i></a>

                    </div>

                    <div class="card-block table-border-style">
                        <div class="table-responsive">
                            <table id="datatable" class="dataTable table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Başlık</th>
                                        <th>Firma / Okul Adı</th>
                                        <th>İlan türü</th>
                                        <th>Kategori</th>
                                        <th>Eklenme Tarihi</th>
                                        <th>Ekleyen Kişi</th>
                                        <th>Durumu</th>
                                        <th>İşlemler</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $post)
                                        <tr>
                                            <th scope="row">{{ $post->id }}</th>
                                            <td style="word-break: break-all; white-space: normal; width: 50%;">
                                                {{ $post->title }}</td>
                                            <td>{{ $post->school_name }}</td>
                                            <td>
                                                @if ($post->ilan_turu == 0)
                                                    <label class="label label-success">İş yeri</label>
                                                @elseif($post->ilan_turu == 1)
                                                    <label class="label label-primary">Stajer İlanı</label>
                                                @endif
                                            </td>
                                            <td>
                                                {{ $post->category->name ?? 'Silinmiş' }}

                                            </td>
                                            <td>{{ date('d-m-Y', strtotime($post->deleted_at)) }}</td>
                                            <td>
                                                {{ $post->author->name ?? 'Silinmiş' }}

                                            </td>
                                            <td>
                                                @if ($post->publish == 0)
                                                    <label class="label label-danger">Onay Bekliyor</label>
                                                @elseif($post->publish == 1)
                                                    <label class="label label-primary">Taslak</label>
                                                @elseif($post->publish == 2)
                                                    <label class="label label-success">Yayında</label>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('post.restore', $post->id) }}" data-toggle="tooltip"
                                                    data-placement="top" title="Geri Gönder"><i
                                                        class="feather icon-refresh-ccw f-w-600 f-16 m-r-15 text-c-blue"></i></a>
                                                <a href="{{ route('post.trash', $post->id) }}" data-toggle="tooltip"
                                                    data-placement="top" title="Sil"
                                                    onclick="return confirm('Silme İşlemi onaylıyormusunuz ?')"><i
                                                        class="feather icon-trash-2 f-w-600 f-16 text-c-red"></i></a>
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


@section('js')
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable();


        });
        // $(document).ready(function(){
        //     $("#myInput").on("keyup", function() {
        //         var value = $(this).val().toLowerCase();
        //         $("#datatable  tr").filter(function() {
        //             $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        //         });
        //     });
        // });
    </script>
@endsection
