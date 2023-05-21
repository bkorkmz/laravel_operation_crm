@extends('layout-admin')
@section('title')
    {{ __('Tüm Sayfalar') }}
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Sayfa Listesi</h3>
            <a href="{{ route('page.trashed') }}" type="button" class="btn btn-warning btn-sm float-right rounded mr-1 " data-toggle="tooltip" data-placement="top" title="Çöp Kutusu"><i class="fa fa-trash"></i></a>
            <a href="{{ route('page.create') }}" type="button" class="btn btn-primary btn-sm float-right rounded mr-1 " ><i class="fa fa-plus"></i>Yeni ekle</a>
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
                    @foreach($pages as $page)
                        <tr>
                            <th scope="row">{{ $page->id }}</th>
                            <td>{{ $page->title }}</td>
                            <td>{{ date('d-m-Y', strtotime($page->created_at)) }}</td>
                            <td>
                                @if($page->publish==0)
                                    <label class="label label-success">Yayında</label>
                                @elseif($page->publish==1)
                                    <label class="label label-danger">Taslak</label>
                                @endif
                            </td>
                            <td>
                                @if($page->page_type==1) <label class="label label-inverse-success">Kurumsal</label> @endif
                                @if($page->page_type==2) <label class="label label-inverse-warning">Hizmet</label> @endif
                                @if($page->page_type==3) <label class="label label-inverse-danger">Referans</label>@endif

                            </td>
{{--                            <td><a href="{{ route('admin.translate', ['postId' => $page->id, 'postType' => $page->post_type]) }}" class="btn btn-sm"><i class="icon feather icon-box"></i></a></td>--}}
                            <td>
                                <a href="{{ route('page.edit', $page->id) }}"><i class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green"></i></a>
                                <a href="{{ route('page.destroy', $page->id) }}"  onclick="return confirm('Silme İşlemi onaylıyormusunuz ?')"><i class="feather icon-trash-2 f-w-600 f-16 text-c-red"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $pages->links() }}
            </div>
        </div>
    </div>
@endsection
