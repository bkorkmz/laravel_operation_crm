@extends('layout-admin')
@section('title')
    {{ __('Yorum Düzenle ') }}
@endsection
@section('content')
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="card">
        <div class="card-header">
            <h3>Yorumu Düzenle</h3>
        </div>
        <div class="card-block">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('comment.update', $comment->id) }}" method="post">
                @csrf



                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Yorum</label>
                    <div class="col-sm-10">
                        <textarea rows="5" data-maxlength="250" cols="5" class="form-control" placeholder="" name="comment">{{ $comment->comment }}</textarea>
                        <div class="char-count-style">
                            <span class="char-count">0</span>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Diğer ayarlar</label>
                    <div class="col-sm-10">
                        <select name="publish" class="form-control fill">
                            @if($comment->publish==0)
                                <option value="0" selected>Onay bekliyor</option>
                                <option value="1">Yayında</option>
                            @elseif($comment->publish==1)
                                <option value="0">Onay bekliyor</option>
                                <option value="1" selected>Yayında</option>
                            @endif
                        </select>
                    </div>
                </div>

                <div class="text-right m-t-20">
                    <button class="btn btn-primary rounded">Güncelle</button>
                </div>
            </form>
        </div>
    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



@section('css')
@endsection

@section('js')
@endsection
