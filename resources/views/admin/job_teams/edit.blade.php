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
                        <a type="button" class="btn btn-grd-warning btn-sm float-right rounded mr-1  "
                        href="{{route('user.teams.index')}}"><i class="fa fa-reply"></i>Geri Dön</a>
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
                                <label class="col-sm-2 col-form-label">Adı - Soyadı   <span class="text-danger"> *</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-normal" placeholder="Ad-Soyad Giriniz"
                                        name="name" value="{{ $user->name }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Profil Resmi (min:300x300)</label>
                                <div class="col-sm-5">
                                    <input type="file" class="form-control form-control-normal dropify" placeholder=""
                                        name="avatar" 
                                        data-show-remove="false"
                                        data-default-file="{{ $user->avatar  }}"
                                        accept=".png,.jpg,.jpeg,.gif,.webp,.bmp" >
                                </div>
                            </div>
    
    


                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Facebook</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-normal" placeholder="" name="fb" value="{{ $user->fb }}" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Twitter</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-normal" placeholder="" name="tw" value="{{ $user->tw }}" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Google Plus</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-normal" placeholder="" name="gp" value="{{  $user->gp }}" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">İnstagram</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-normal" placeholder="" name="in" value="{{  $user->in }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Youtube</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-normal" placeholder="" name="yt" value="{{  $user->yt }}" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Linkedin</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-normal" placeholder="" name="linkedin" value="{{ $user->linkedin}}" >
                                </div>
                            </div>
   
                            <div class="form-group row my-4">
                                <label class="col-sm-2 col-form-label">Durum
                                   </label>
                                <div class="col-sm-3 row align-self-center" >
                                    
                                    <div class="form-check m-2">
                                        <input class="form-check-input" checked type="radio" name="status"
                                            id="active" value="1"
                                            {{ $user->status == 1 ? 'checked' : '' }}>
                                        <label class="form-check-label" for="active">Aktif</label>
                                    </div>
                                    <div class="form-check m-2">
                                       
                                        <input class="form-check-input"  type="radio" name="status"
                                            id="passive" value="0"
                                            {{ $user->status == 0 ? 'checked' : '' }}>
                                        <label class="form-check-label" for="passive">Pasif </label>
                                    </div>
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