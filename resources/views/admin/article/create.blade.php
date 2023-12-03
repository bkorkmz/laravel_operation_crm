@extends('layouts.layout-admin')
@section('title')
    {{ __('Makale Ekleme Sayfası  ') }}
@endsection
@section('content')
    <div class="pcoded-inner-content">
        <div class="page-wrapper">
            <div class="page-body">
                <div class="">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3>Makale Ekeleme Sayfası</h3>
                                <a type="button" class="btn btn-grd-warning btn-sm float-right rounded mr-1  "
                                    href="{{ route($modul_name . '.index') }}"><i class="fa fa-reply"></i>Geri Dön</a>

                            </div>
                            <div class="card-block table-border-style">
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
                                    <form action="{{ route($modul_name . '.store') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Makale başlığı <span class="text-danger">
                                                    *</span></label>
                                            <div class="col-sm-10">
                                                
                                                <input  type="text" class="form-control form-control-normal" oninput="slug_copy(this)"
                                                    value="{{ old('title') }}" placeholder="" name="title" maxlength="100"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Opsiyonel url  <span class="text-danger">
                                                    *</span></label>
                                            <div class="col-sm-10">
                                                    <div class="input-group">
                                                                <span class="input-group-prepend">
                                                                    <label class="input-group-text">{{"https://".request()->host()."/blog/"}}</label>
                                                                </span>
                                                        <input id="slug_content" type="text" class="form-control text-lowercase"  name="slug" maxlength="100">
                                                    </div>
                                            </div>
                                        </div>
                                

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Makale özeti <span class="text-danger">
                                                    *</span></label>
                                            <div class="col-sm-10">
                                                <textarea type="text" class="form-control form-control-normal" required placeholder="" name="short_detail"
                                                    maxlength="250">{{ old('short_detail') }}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Makale içeriği <span class="text-danger">
                                                    *</span></label>
                                            <div class="col-sm-10">
                                                <textarea id="ckeditor" class="form-control form-control-normal" name="detail" rows="5">{{ old('detail') }}</textarea>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Anahtar kelimeler</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control form-control-normal"
                                                    placeholder="Etiketleri , ile ayırarak yazınız" name="keywords"
                                                    maxlength="100" value="{{ old('keywords') }}">
                                            </div>
                                        </div>

                                        <div class="form-group row my-4">
                                            <label class="col-sm-2 col-form-label">Kategori</label>
                                            <div class="col-sm-3">
                                                <select name="category_id" class="form-control fill">
                                                    @foreach ($post_category as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>
                                        <div class="form-group row my-4">
                                            <label class="col-sm-2 col-form-label">Durum
                                            </label>
                                            <div class="col-sm-3 row align-self-center">

                                                <div class="form-check m-2">
                                                    <input class="form-check-input" checked type="radio" name="publish"
                                                        id="active" value="1"
                                                        {{ old('publish', 0) == 0 ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="active">Yayında</label>
                                                </div>
                                                <div class="form-check m-2">

                                                    <input class="form-check-input" type="radio" name="publish"
                                                        id="passive" value="0"
                                                        {{ old('publish', 0) == 1 ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="passive">Taslak </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row my-4">
                                            <label class="col-sm-2 col-form-label">Makale Görünümü</label>
                                            <div class="col-5 d-flex ">
                                                <select name="location" class="form-control fill">
                                                    <option value="0" {{ old('location') == 0 ? 'selected' : '' }}>
                                                        Normal Görünüm</option>
                                                    <option value="1"{{ old('location') == 1 ? 'selected' : '' }}>
                                                        Anasayfada Göster</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-3 d-flex">
                                                <div>
                                                    <span class="badge badge-warning ">
                                                        Anasayfa Görünümü seçilen son dört makale Anasayfada görünür.<br>
                                                        Normal Görünümde sadece blog sayfasında görünür.
                                                    </span>
                                                </div>

                                            </div>
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

                    

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Makale Fotoğrafı (min:630x470)</label>
                                            <div class="col-sm-5">
                                                <input type="file" class="form-control form-control-normal dropify"
                                                    placeholder="" name="image"
                                                    accept=".jpg,.jpeg,.png,.tiff,.gif,.svg,.webp,.bmp,.ico" required>
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
            <link href="{{asset('admin/assets/pages/summernote-0.8.18/summernote.css')}}" rel="stylesheet">
        @endsection

    @section('js')
            <script src="{{asset('admin/assets/pages/summernote-0.8.18/summernote.js')}}"></script>
            <script src="{{asset('admin/assets/pages/summernote-0.8.18/lang/summernote-tr-TR.js')}}"></script>
            <script src="{{asset('/admin/assets/pages/summernote-0.8.18/plugin/image2/summernote-image-title.js')}}"></script>
        
        <script>


            $(document).ready(function() {
                $('#ckeditor').summernote({
                    lang: 'tr-TR',
                    height: 300,
                    imageTitle: {
                        specificAltField: true,
                    },
                
                    popover: {
                        image: [
                            ['image', ['resizeFull', 'resizeHalf', 'resizeQuarter', 'resizeNone']],
                            ['imagesize', ['imageSize100', 'imageSize50', 'imageSize25']],
                            ['float', ['floatLeft', 'floatRight', 'floatNone']],
                            ['remove', ['removeMedia']],
                            ['custom', ['imageTitle']],
                        ],
                    },
                    toolbar: [
                        ['style', ['style']],
                        ['fontsize', ['fontsize']],
                        ['fontname', ['fontname']],
                        ['height', ['height']],
                        ['font', ['bold', 'underline','strikethrough', 'superscript', 'subscript', 'clear']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['table', ['table']],
                        ['insert', ['link', 'picture', 'video']],

                        ['view', ['fullscreen', 'codeview', 'help']]
                    ]

                });
            });
            
            function  slug_copy(inputElement){
                let slug = document.getElementById('slug_content');
                 console.log(inputElement.value )
                 slug.value = inputElement.value ;
            }

        </script>
    @endsection
