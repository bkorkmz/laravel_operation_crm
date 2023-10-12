@extends('layouts.layout-admin')
@section('title')
    {{ __('Makale Düzenle Sayfası  ') }}
@endsection
@section('content')
    <div class="pcoded-inner-content">
        <div class="page-wrapper">
            <div class="page-body">
                <div class="">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3>Makale Düzenle</h3>
                                {{-- <a href="{{ route('post.trashed_index') }}" type="button" class="btn btn-warning btn-sm float-right rounded mr-1 " data-toggle="tooltip" data-placement="top" title="Çöp Kutusu"><i class="fa fa-trash"></i></a> --}}
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
                                    <form action="{{ route($modul_name . '.update', ['model' => $model->id]) }}"
                                        method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Makale başlığı <span class="text-danger">
                                                    *</span></label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control form-control-normal"
                                                    placeholder="" name="title" maxlength="100"
                                                    value="{{ $model->title }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Makale özeti <span class="text-danger">
                                                    *</span></label>
                                            <div class="col-sm-10">
                                                <textarea type="text" class="form-control form-control-normal" placeholder="" name="short_detail" maxlength="250">{{ $model->short_detail }}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Makale içeriği <span class="text-danger">
                                                    *</span></label>
                                            <div class="col-sm-10">
                                                <textarea id="ckeditor" name="detail" rows="5">{{ $model->detail }}</textarea>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Anahtar kelimeler</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control form-control-normal"
                                                    placeholder="Etiketleri , ile ayırarak yazınız" name="keywords"
                                                    maxlength="50" value="{{ $model->keywords }}">
                                            </div>
                                        </div>

                                        <div class="form-group row my-4">
                                            <label class="col-sm-2 col-form-label">Kategori</label>
                                            <div class="col-sm-3">
                                                <select name="category_id" class="form-control fill">
                                                    @foreach ($post_category as $category)
                                                        <option {{ $model->category_id == $category->id ? 'selected' : '' }}
                                                            value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                                {{-- <a type="button" class="float-right badge badge-inverse-danger"
                                                    href="javascript:void(0)" data-toggle="modal"
                                                    data-target="#addCategoryModal">Kategori Ekle</a> --}}
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
                                        <div class="form-group row my-4">
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
                                        <div class="form-group row my-4">
                                            <label class="col-sm-2 col-form-label">Makale Görünümü</label>
                                            <div class="col-5 d-flex ">
                                                <select name="location" class="form-control fill">
                                                    <option value="0" {{ $model->location == 0 ? 'selected' : '' }}>
                                                        Normal Görünüm</option>
                                                    <option value="1"{{ $model->location == 1 ? 'selected' : '' }}>
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

                                        <hr>
                                        {{-- <div class="form-group has-warning row">
                                            <div class="col-sm-2">
                                                <label class="col-form-label" for="meta1">Meta anahtar kelimeler
                                                    (Opsiyonel)</label>
                                            </div>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control form-control-warning"
                                                    id="meta1" name="meta_keywords" value="{{$model->meta_keywords}}" maxlength="80">
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
                                                    name="meta_description" id="meta2">{{$model->meta_description}}</textarea>
                                                <div class="col-form-label">Arama motorları maksimum 200 karakteri
                                                    geçmeyecek şekilde doldurulabilir.</div>
                                            </div>
                                        </div> --}}
                                        <hr>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Makale Fotoğrafı (min:630x470)</label>
                                            <div class="col-sm-6">
                                                <input type="file" class="form-control form-control-normal dropify"
                                                    data-show-remove="false" data-default-file="{{ $model->image }}"
                                                    accept=".png,.jpg,.jpeg,.gif" placeholder="" name="image" >
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




    @endsection


        @section('css')
            {{--            <link href="{{asset('admin/assets/pages/summernote/dist/summernote.css')}}" rel="stylesheet">--}}
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

            </script>
@endsection
