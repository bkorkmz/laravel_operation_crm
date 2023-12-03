@extends('layout-admin')
@section('title')
    {{ __('Tüm Yorumlar ') }}
@endsection
@section('content')
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="card">
        <div class="card-header">
            <h3>Yorum Listesi</h3>
            <a href="{{ route('comment.trashed') }}" type="button" class="btn btn-warning btn-sm float-right rounded mr-1 " data-toggle="tooltip" data-placement="top" title="Çöp Kutusu"><i class="fa fa-trash"></i></a>

        </div>
        <div class="card-block table-border-style">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Yorum</th>
                        <th>Kullanıcı</th>
                        <th>Yorum Türü</th>
                        <th>İlan No</th>
                        <th>Durum</th>
                        <th>İp</th>
                        <th>İşlemler</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($comments as  $comment)

                        <tr>
                            <th scope="row">{{ $comment->id }}</th>
                            <td style="word-break: break-all; white-space: normal; width: 25%;">{{ $comment->comment }}</td>
                            <td>

                                    <a href="{{$comment->post ? route('user.edit',$comment->author->id ) : "" }}">
                               {{ $comment->author->name ?? " Kullanıcı Silinmiş"}}</a>

                            </td>
                            <td>

                               @if($comment->model == 'post')
                                   İlan
                                @elseif($comment->model == 'article')
                                   Makale
                                @elseif($comment->model == 'user')
                                   Kullanıcı
                                @else
                                   Tanımsız
                                @endif



                            </td>
                            <td >
                                @if($comment->model == 'post')
                                    <a href="{{route('post.edit',$comment->model_id )}}">{{"# ". $comment->model_id }}</a>
                                @elseif($comment->model == 'article')
                                    <a href="{{route('article.edit',$comment->model_id )}}">{{"# ". $comment->model_id }}</a>
                                @elseif($comment->model == 'user')
                                    <a href="{{route('user.edit',$comment->model_id )}}">{{"# ". $comment->model_id }}</a>
                                @else
                                    {{"# ". $comment->model_id }}
                                @endif

                            </td>
                            <td>
                                @if($comment->publish==1)
                                    <label class="label label-primary">Yayında</label>
                                @elseif($comment->publish==0)
                                    <label class="label label-danger">Onay bekliyor</label>
                                @endif
                            </td>
                            <td>{{ $comment->ip }}</td>
                            <td>
{{--                                <a class="btn-default rounded  btn-sm btn-mini" href=""  title="Cevapla"><i class="feather icon-message-square f-w-600 f-16 text-c-red"></i>&nbsp;Cevapla</a>--}}
{{--                                    <a class="btn-default rounded  btn-sm btn-mini" href=""> <i class="feather icon-check f-w-600 f-16 text-c-green"></i>&nbsp;Onayla </a>--}}
                                    <a href="{{ route('comment.edit', $comment->id) }}"><i class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green"></i></a>
                                    <a href="{{ route('comment.destroy', $comment->id) }}" onclick="return confirm('Silme İşlemi onaylıyormusunuz ?')" ><i class="feather icon-trash-2 f-w-600 f-16 text-c-red"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $comments->links() }}
            </div>
        </div>
    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
