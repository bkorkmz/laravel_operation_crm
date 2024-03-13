@extends('layouts.layout-admin')
@section('title')
    {{ __('Çözüm Ortakları Düzenleme ') }}
@endsection

@section('content')

<div class="pcoded-inner-content">
    <div class="main-body">
        <div class="page-wrapper">
            <div class="card">
                <div class="card-header">
                    <h3>Çözüm Ortağı Düzenle</h3>
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
                    <form action="{{ route($module_name.'.update',$slider->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">İçerik Adı <span class="text-danger"> </span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control form-control-normal" placeholder="İçerik adı giriniz"
                                    name="name" value="{{ $slider->name }}" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Slogan Mesajı  <span class="text-danger"> </span></label>
                            <div class="col-sm-10">
                                <textarea type="text" class="form-control form-control-normal" placeholder="İçerik Mesajı giriniz"
                                          name="value" maxlength="500" > {{ $slider->value }} </textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Bağlantı (Url)</label>
                            <div class="col-sm-10">
                                <input type="url" class="form-control form-control-normal" placeholder="İçerik bağlantısı"
                                    name="link" value="{{ $slider->link }}" >
                            </div>
                        </div>



                        {{-- <div class="form-group row">
                            <label class="col-sm-2 col-form-label">İçerik Türü<span class="text-danger"> *</span></label>
                            <div class="col-sm-10">
                                <select name="type" class="form-control fill" required>
                                    <option value="portfolio" {{$slider->type == "portfolio" ? "selected" : "" }} selected>Portfolyo</option>
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
                                        {{$slider->status == 1 ? "checked" : "" }}>
                                    <label class="form-check-label" for="active">Aktif</label>
                                </div>
                                <div class="form-check m-2">

                                    <input class="form-check-input"  type="radio" name="status"
                                        id="passive" value="0"
                                        {{$slider->status == 0 ? "checked" : "" }}>
                                    <label class="form-check-label" for="passive">Pasif </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row my-4">
                            <label class="col-sm-2 col-form-label">Slider Tipi <span class="text-danger"> *</span></label>

                            <div class="card slider_type mr-2">
                                <label for="flexRadioDefault1">
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" checked
                                                   name="banner_image"  {{ $slider->banner_image == 0 ? 'checked' : '' }}
                                                   id="flexRadioDefault1" value="0" required>
                                            <label class="form-check-label" >Ana Slider</label>
                                            <p class="mb-0"><i class="fa fa-info fa-2x mr-2"></i>Resim boyutu 2370x800  </p>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            <div class="card slider_type mr-2">
                                <label for="flexRadioDefault2">
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" {{ $slider->banner_image == 1 ? 'checked' : '' }}
                                            type="radio" name="banner_image"
                                                   id="flexRadioDefault2" value="1" required>
                                            <label class="form-check-label" >Sağ Blok Slider</label>
                                            <p class="mb-0"><i class="fa fa-info fa-2x mr-2"></i>Resim boyutu 1024x1070 </p>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            <div class="card slider_type mr-2">
                                <label for="flexRadioDefault3">
                                    <div class="card-body">
                                        <div class="form-check">
                                            <input class="form-check-input" {{$slider->banner_image == 2 ? 'checked' : '' }}
                                            type="radio" name="banner_image"
                                                   id="flexRadioDefault3" value="2" required>
                                            <label class="form-check-label" >Alt Üçlü Blok Slider</label>
                                            <p class="mb-0"><i class="fa fa-info fa-2x mr-2"></i>Resim boyutu 460x270 </p>
                                        </div>
                                    </div>
                                </label>
                            </div>
                        </div>


                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">İçerik Resmi (min:2370x800</label>
                            <div class="col-sm-5">
                                <input type="file" class="form-control form-control-normal dropify" placeholder=""
                                placeholder="" name="image"
                                data-show-remove="false"
                                data-default-file="{{ $slider->image  }}"
                                accept=".png,.jpg,.jpeg,.gif,.webp,.bmp" >
                            </div>
                        </div>

                        <input type="hidden" name="type" value="{{$module_name}}">


                        <div class="text-right m-t-20">
                            <button class="btn btn-primary rounded">Güncelle</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection



@section('css')
    <style>
        .slider_type {
            background-color: beige;
            border: 1px solid #28a745;
        }
        .slider_type input[type="radio"]:checked + label  {
            background-color: #d4edda;
            border: 1px solid #28a745;
        }

    </style>
@endsection

@section('js')


@endsection
