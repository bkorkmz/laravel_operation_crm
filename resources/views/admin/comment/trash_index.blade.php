@extends('layout-admin')
@section('title')
    {{ __('Silinen Yorumlar') }}
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Silinen Yorumlar</h3>
               <a onclick="window.history.back();" type="button" class="btn btn-warning btn-sm float-right rounded mr-1 " data-toggle="tooltip" data-placement="top" title="Geri Dön"><i class="fa fa-reply"></i></a>
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
                                <a href="{{route('user.edit',$comment->author->id )}}">{{ $comment->author->name }}</a>

                            </td>
                            <td>{{$comment->model}} </td>
                            <td >
                                @if($comment->model = 'post')
                                    <a href="{{route('post.edit',$comment->model_id )}}">{{"# ". $comment->post->id }}</a>
                                @else
                                    <a href="{{route('user.edit',$comment->model_id )}}">{{"# ". $comment->post->id }}</a>
                                @endif


                            </td>
                            <td>
                                @if($comment->publish==1)
                                    <label class="label label-success">Yayında</label>
                                @elseif($comment->publish==0)
                                    <label class="label label-danger">Onay bekliyor</label>
                                @endif
                            </td>
                            <td>{{ $comment->ip }}</td>
                            <td>
{{--                                    <a href="{{ route('comment.edit', $comment->id) }}"><i class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green"></i></a>--}}
{{--                                    <a href="{{ route('comment.destroy', $comment->id) }}" onclick="return confirm('Silme İşlemi onaylıyormusunuz ?')" ><i class="feather icon-trash-2 f-w-600 f-16 text-c-red"></i></a>--}}
                                                <a href="{{ route('comment.restore', $comment->id) }}" data-toggle="tooltip" data-placement="top" title="Geri Gönder"><i class="feather icon-refresh-ccw f-w-600 f-16 m-r-15 text-c-blue"></i></a>
                                                <a href="{{ route('comment.trashed', $comment->id) }}" data-toggle="tooltip" data-placement="top" title="Sil" onclick="return confirm('Silme İşlemi onaylıyormusunuz ?')" ><i class="feather icon-trash-2 f-w-600 f-16 text-c-red"></i></a>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $comments->links() }}
            </div>
        </div>
    </div>
@endsection