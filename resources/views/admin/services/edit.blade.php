@extends('layouts.layout-admin')
@section('title')
    {{ __('Hizmeti Düzenle ') }}
@endsection

@section('content')

<div class="pcoded-inner-content">
    <div class="main-body">
        <div class="page-wrapper">
            <div class="card">
                <div class="card-header">
                    <h3>Hizmeti Düzenle</h3>
                    <button type="button" class="btn btn-grd-warning btn-sm float-right rounded mr-1  "
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
{{-- @dd($model->id) --}}
                    <form action="{{ route($modul_name.'.update',$model->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Hizmet Başlığı <span class="text-danger"> *</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control form-control-normal" value="{{$model->title}}"
                                    placeholder="" name="title" maxlength="50" required>
                            </div>
                        </div>
                        {{--                         
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Seo başlık ( URL - Opsiyonel )</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control form-control-normal" placeholder="" name="slug" maxlength="50">
                            </div>
                        </div> --}}

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Hizmet Özeti <span class="text-danger"> *</span></label>
                            <div class="col-sm-10">
                                    <textarea type="text" class="form-control form-control-normal" required
                                        placeholder="" name="short_detail" maxlength="250">{{$model->short_detail}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Hizmet Açıklaması <span class="text-danger"> *</span></label>
                            <div class="col-sm-10">
                                <textarea id="ckeditor" class="form-control form-control-normal" name="detail" rows="5"  >{{$model->detail}}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Anahtar Kelimeler</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control form-control-normal"
                                    placeholder="" name="keywords" maxlength="50" value="{{$model->keywords}}">
                            </div>
                        </div>

                        {{-- @dd($model) --}}
                        <div class="form-group row my-4">
                            <label class="col-sm-2 col-form-label">Kategori</label>
                            <div class="col-sm-3">
                                <select name="category_id" class="form-control fill">
                                    @foreach ($category as $cat)
                                        <option value="{{ $cat->id }} {{$model->category_id == $cat->id ? 'selected': '' }}">{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                              
                            </div>
                           
                             <div class="form-group row my-4 col-12">
                                <label class="col-sm-2 col-form-label">Durum
                                </label>
                                <div class="col-sm-3 row align-self-center">

                                    <div class="form-check m-2">

                                        <input class="form-check-input"
                                            {{ $model->publish == '1' ? 'checked' : '' }} type="radio"
                                            name="publish" id="passive"
                                            value="0"{{ $model->publish == '0' ? 'checked' : '' }}
                                            {{-- @dd($model->publish)      --}}>
                                        <label class="form-check-label" for="passive">Yayında </label>
                                    </div>

                                    <div class="form-check m-2">
                                        <input class="form-check-input"
                                            {{ $model->publish == '1' ? 'checked' : '' }} type="radio"
                                            name="publish" id="active" value="1">
                                        <label class="form-check-label" for="active">Taslak</label>
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="col-sm-3">
                                <select name="source_id" class="form-control fill">
                                    <option value="">Kaynak seçin</option>
                                        @foreach ($sources as $source)
                                        <option value="{{ $source->id }}">{{ $source->title }}</option>
                                    @endforeach -
                                </select>
                            </div> --}}
                        </div>


                        @canany(['view_photogallery', 'view_videogallery'])
                             <div class="form-group row clearfix my-4">
                            <label class="col-sm-2 col-form-label">Fotograf Galeri / Video Galeri</label>
                            @canany('view_photogallery')
                                <div class="col-sm-5">
                                    <select name="photogallery_id" class="form-control fill">
                                        <option value="0">Foto Galeri Seçilmedi</option>
                                        @if (!empty($photogalleries))
                                            @foreach ($photogalleries as $photogallery)
                                                <option value="{{ $photogallery->id }}">
                                                    {{ $photogallery->title }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            @endcanany
                            @canany('view_videogallery')
                                <div class="col-sm-5">
                                    <select name="videogallery_id" class="form-control fill">
                                        <option value="0">Video Galeri Seçilmedi</option>
                                        @if (!empty($photogalleries))
                                            @foreach ($videogalleries as $videogallery)
                                                <option value="{{ $videogallery->id }}">
                                                    {{ $videogallery->title }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>

                                </div>
                            @endcanany

                        </div>

                        @endcanany
                       
                        {{-- <hr> --}}
                        {{-- <div class="form-group has-warning row">
                            <div class="col-sm-2">
                                <label class="col-form-label" for="meta1">Meta anahtar kelimeler
                                    (Opsiyonel)</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control form-control-warning"  maxlength="80"
                                    id="meta1" name="meta_keywords">
                                <div class="col-form-label">Arama motorları için kelime bazlı önem
                                    taşır.</div>
                            </div>
                        </div>
                        <div class="form-group has-warning row">
                            <div class="col-sm-2">
                                <label class="col-form-label" for="meta2">Meta açıklama
                                    (Opsiyonel)</label>
                            </div>
                            <div class="col-sm-10">
                                <textarea rows="2" cols="5" class="form-control form-control-warning" placeholder=""
                                    name="meta_description" id="meta2"  maxlength="200"> </textarea>
                                <div class="col-form-label">Arama motorları maksimum 200 karakteri
                                    geçmeyecek şekilde doldurulabilir.</div>
                            </div>
                        </div>
                        <hr> --}}

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Hizmet Fotoğrafı (min:630x470)</label>
                            <div class="col-sm-5">
                                <input type="file" class="form-control form-control-normal dropify"
                                data-show-remove="false" data-default-file="{{ $model->image }}"
                                accept=".jpg,.jpeg,.png,.tiff,.gif,.svg,.webp,.bmp,.ico"
                                placeholder="" name="image">
                             </div>
                        </div>

                        <div class="text-right m-t-20">
                            <button class="btn btn-primary">Kaydet</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Kategori Ekle</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form class="form-group " id="category-form">

                    <div class="form-group ">
                        <label class="col-form-label">Kategori Adı</label>
                        <div class="">
                            <input type="text" id="category-name" name="name"
                                class="form-control form-control-normal">
                        </div>
                    </div>
                    <button class="btn btn-success float-right" type="submit">Kaydet</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection



@section('css')
@endsection

@section('js')


<script>
    $(document).ready(function() {

  $('#ckeditor').summernote({
                lang: 'tr-TR' // default: 'en-US'
            });


    });

   
        



    // function addCategory() {

    //     swal({
    // 		title: "Ajax request example",
    // 		text: "Submit to run ajax request",
    // 		type: "info",
    // 		showCancelButton: true,
    // 		closeOnConfirm: false,
    // 		showLoaderOnConfirm: true
    // 	}, function () {
    // 		setTimeout(function () {
    // 			swal("Ajax request finished!");
    // 		}, 2000);
    // 	});

    // }

    // ClassicEditor

    //     .create(document.querySelector('#ckeditor'))
    
    //     .catch(error => {
    //         console.error(error);
    //     }); 

        

    //     $('.dropify').dropify({
    // messages: {
    //     'default': 'Resim yükle ya da sürükle',
    //     'replace': 'Resim değiştir ya da sürükle',
    //     'remove': 'Kaldır',
    //     'error': 'Hata! Desteklenen dosya tipinden farklı bir dosya yüklediniz.'
    // }
// });

        
                </script>
{{-- <script type="text/javascript" src="{{ asset('admin/assets/js/jquery.marcopolo.min.js') }}"></script> --}}
@endsection
