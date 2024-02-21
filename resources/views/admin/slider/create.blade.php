@extends('layouts.layout-admin')
@section('title')
    {{ __('Slider Kayıt Sayfası ') }}
@endsection

@section('content')

<div class="pcoded-inner-content">
    <div class="main-body">
        <div class="page-wrapper">
            <div class="card">
                <div class="card-header">
                    <h3>Slider  Ekle</h3>
                    <a href="{{route('slider.index')}}" class="btn btn-grd-warning btn-sm float-right rounded mr-1  "><i class="fa fa-reply"></i>Geri Dön</a>
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
                    <form action="{{ route($module_name.'.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Slogan Adı <span class="text-danger"> </span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control form-control-normal" placeholder="İçerik adı giriniz"
                                    name="name" maxlength="50" value="{{ old('name') }}" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Slogan Mesajı  <span class="text-danger"> </span></label>
                            <div class="col-sm-10">
                                <textarea type="text" class="form-control form-control-normal" placeholder="İçerik Mesajı giriniz"
                                    name="value" maxlength="500" > {{ old('value') ?? "" }} </textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Bağlantı (Url)</label>
                            <div class="col-sm-10">
                                <input type="url" class="form-control form-control-normal" placeholder="İçerik bağlantısı"
                                    name="link" value="{{ old('url') }}" >
                            </div>
                        </div>

                        {{-- <div class="form-group row">
                            <label class="col-sm-2 col-form-label">İçerik Türü<span class="text-danger"> *</span></label>
                            <div class="col-sm-10">
                                <select name="type" class="form-control fill" required>
                                    <option value="slider" selected>slider</option>
                                </select>
                            </div>
                        </div> --}}
                        <div class="form-group row my-4">
                            <label class="col-sm-2 col-form-label">Durum
                               </label>
                            <div class="col-sm-3 row align-self-center" >

                                <div class="form-check m-2">
                                    <input class="form-check-input" checked type="radio" name="status"
                                        id="active" value="1"
                                        {{ old('status',1) == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="active">Aktif</label>
                                </div>
                                <div class="form-check m-2">

                                    <input class="form-check-input"  type="radio" name="status"
                                        id="passive" value="0"
                                        {{ old('status',1) == 0 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="passive">Pasif </label>
                                </div>
                            </div>
                        </div>





                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">İçerik Resmi (min: 2370x800)</label>
                            <div class="col-sm-5">
                                <input type="file" class="form-control form-control-normal dropify" placeholder=""
                                    name="image" accept=".png,.jpg,.jpeg,.gif,.webp,.bmp" >
                            </div>
                        </div>
                        <input type="hidden" name="type" value="{{$module_name}}">




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

@section('js')


@endsection
