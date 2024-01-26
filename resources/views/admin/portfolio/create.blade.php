@extends('layouts.layout-admin')
@section('title')
    {{ __('Potfolyo Kayıt Sayfası ') }}
@endsection

@section('content')

    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="card">
                    <div class="card-header">
                        <h3>Potfolyo Ekle</h3>
                        <a type="button" class="btn btn-grd-warning btn-sm float-right rounded mr-1  "
                        href="{{route($module_name.'.index')}}"><i class="fa fa-reply"></i>Geri Dön</a>
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
                                <label class="col-sm-2 col-form-label">İçerik Adı <span class="text-danger">
                                        *</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-normal"
                                        placeholder="İçerik adı giriniz" name="name" value="{{ old('name') }}"
                                        required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Bağlantı (Url)</label>
                                <div class="col-sm-10">
                                    <input type="url" class="form-control form-control-normal"
                                        placeholder="İçerik bağlantısı" name="link" value="{{ old('link') }}">
                                </div>
                            </div>

                            <div class="form-group row my-4">
                                <label class="col-sm-2 col-form-label">Kategori <i
                                        class="feather icon-info  text-c-blue"></i></label>
                                <div class="col-sm-3">
                                    <select name="category_id" class="form-control fill">
                                        <option value="">Kategori seçiniz</option>
                                        @foreach ($category as $cat)
                                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>

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
                                <label class="col-sm-2 col-form-label">İçerik Resmi (800x600)</label>
                                <div class="col-sm-5">
                                    <input type="file" class="form-control form-control-normal dropify" placeholder=""
                                        name="image" accept=".png,.jpg,.jpeg,.gif,.webp,.bmp">
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
