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
                    <form action="{{ route('slider.update',$slider->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">İçerik Adı <span class="text-danger"> *</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control form-control-normal" placeholder="İçerik adı giriniz"
                                    name="name" value="{{ $slider->name }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Bağlantı (Url)</label>
                            <div class="col-sm-10">
                                <input type="url" class="form-control form-control-normal" placeholder="İçerik bağlantısı"
                                    name="link" value="{{ $slider->link }}" >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">İçerik Türü<span class="text-danger"> *</span></label>
                            <div class="col-sm-10">
                                <select name="type" class="form-control fill" required>
                                    {{-- <option value="slider">Slider</option> --}}
                                    <option value="portfolio" {{$slider->type == "portfolio" ? "selected" : "" }} selected>Portfolyo</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Onay Durumu<span class="text-danger">
                                    *</span></label>
                            <div class="col-sm-10">
                                <select name="status" class="form-control fill" required>
                                    <option value="1" {{$slider->status  == 1 ? "selected" : "" }}>Yayında</option>
                                    <option value="0" {{$slider->status  == 0 ? "selected" : "" }}>Taslak</option>

                                </select>
                            </div>
                        </div>

                        

                        

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">İçerik Resmi</label>
                            <div class="col-sm-5">
                                <input type="file" class="form-control form-control-normal dropify" placeholder=""
                                placeholder="" name="image"
                                data-show-remove="false"
                                data-default-file="{{ $slider->image  }}"
                                accept=".png,.jpg,.jpeg,.gif,.webp,.bmp" >
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

@section('js')

    
@endsection
