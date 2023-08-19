@extends('layouts.layout-admin')
@section('title')
    {{ __('Takım Kayıt Sayfası ') }}
@endsection

@section('content')


    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="card">
                    <div class="card-header">
                        <h3>Takım Ekle</h3>
                        <button type="button" class="btn btn-linkedin btn-sm float-right rounded mr-1 "
                        onclick="return window.history.back()"><i class="fa fa-reply"></i>Geri Dön</button>
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
                        <form action="{{ route('user.teams.update',$user->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Görev Tanımı  <span class="text-danger"> *</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-normal" placeholder="Görev Tanımı Yazpınız"
                                        name="job" value="{{ $user->job}}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Kullanıcı Tanımla<span class="text-danger"> *</span></label>
                                <div class="col-sm-10">
                                    <select name="user_id" class="form-control fill js-example-tags col-sm-12 select2-hidden-accessible" required>
                                        <option value="">Bir Kullanıcı Seçiniz</option>
                                        @foreach ($users as $user_data)
                                        <option value="{{ $user_data->id}}  " {{ $user->user_id == $user_data->id ? "selected":"" }}>{{$user_data->name}} -- {{$user_data->email}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
   

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Durum</label>
                                <div class="col-sm-10">
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" {{  $user->status == 1 ? "checked":"" }} name="status" id="status-1"
                                                value="1" > @lang('Aktif')
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio"  {{  $user->status == 0 ? "checked":"" }} name="status" id="status-2"
                                                value="0" > @lang('Pasif')
                                        </label>
                                    </div>
                                    <span class="messages"></span>
                                </div>
                            </div>
                            <div class="text-right m-t-20">
                                <button class="btn btn-primary rounded">Kaydet</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection



@section('css')
@endsection