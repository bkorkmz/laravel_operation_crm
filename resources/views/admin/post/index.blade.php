@extends('layout-admin')

@section('title')
    {{ __('İlan Listesi ') }}
@endsection

@push('css')
    {{--    <link href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet"> --}}
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
@endpush


@section('content')
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">

                <div class="card">
                    <div class="card-header">
                        <h3>İlan Listesi</h3>
                        <a href="{{ route('post.trashed') }}" type="button"
                            class="btn btn-warning btn-sm float-right rounded mr-1 " data-toggle="tooltip"
                            data-placement="top" title="Çöp Kutusu"><i class="fa fa-trash"></i></a>
                        <a href="{{ route('post.create') }}" type="button"
                            class="btn btn-primary btn-sm float-right rounded mr-1 "><i class="fa fa-plus"></i>Yeni ekle</a>

                    </div>




                    <div class="card-block table-border-style">
                        <div class="table-responsive">
                            <table id="datatable" class="dataTable table table-responsive">
                                <thead>
                                    <tr>
                                        <th>Başlık</th>
                                        <th>Firma / Okul Adı</th>
                                        <th>İlan türü</th>
                                        <th>Şehir</th>
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
                                            <td style="word-break: break-all; white-space: normal; width: 50%;">
                                                {{ $post->title }}</td>
                                            <td>{{ $post->school_name }}</td>
                                            <td>
                                                @if ($post->ilan_turu == 0)
                                                    <label class="badge badge-inverse-danger">İş veren ilanı</label>
                                                @elseif($post->ilan_turu == 1)
                                                    <label class="badge badge-inverse-primary">İş Arayan İlanı</label>
                                                @endif
                                            </td>
                                            <td>{{ $post->palcity ? $post->palcity->name : ' ' }}</td>
                                            <td>
                                                {{ $post->category ? $post->category->name : ' ' }}
                                            </td>
                                            <td>{{ date('d-m-Y H:i', strtotime($post->created_at)) }}</td>
                                            <td>
                                                {{ $post->author ? $post->author->name : 'Silinmiş kullanıcı ' }}

                                            </td>
                                            <td>
                                                @if ($post->publish == 0)
                                                    <label class="label label-warning">Onay Bekliyor</label>
                                                @elseif($post->publish == 1)
                                                    <label class="label label-primary">Taslak</label>
                                                @elseif($post->publish == 2)
                                                    <label class="label label-success">Yayında</label>
                                                @elseif($post->publish == 3)
                                                    <label class="label label-danger">Süresi Doldu</label>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('post.edit', $post->id) }}"><i
                                                        class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green"></i></a>
                                                <a href="{{ route('post.destroy', $post->id) }}"
                                                    onclick="return confirm('Silme İşlemi onaylıyormusunuz ?')"><i
                                                        class="feather icon-trash-2 f-w-600 f-16 text-c-red"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="float-right mt-1">
                                {{ $posts->links() }}
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('js')
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
    @include('sweetalert::alert')


    <script>
        {{-- $(function() { --}}
        {{--    $('#datatable').DataTable({ --}}
        {{--        processing: true, --}}
        {{--        serverSide: true, --}}
        {{--        ajax: '{{route('post.index_data')}}', --}}
        {{--        columns: [ --}}
        {{--            { data: 'id', name: 'id' }, --}}
        {{--            { data: 'title', name: 'title' }, --}}
        {{--            { data: 'school_name', name: 'school_name' }, --}}
        {{--            { data: 'ilan_turu', name: 'ilan_turu' }, --}}
        {{--            { data: 'category', name: 'category' }, --}}
        {{--            { data: 'created_by', name: 'created_by' }, --}}
        {{--            { data: 'publish', name: 'publish' }, --}}

        {{--            ] --}}

        {{--    }); --}}

        {{-- }); --}}
    </script>
@endsection
