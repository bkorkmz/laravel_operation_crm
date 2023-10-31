@extends('layouts.layout-admin')
@section('title')
    {{ __('Sayfa Düzenle ') }}
@endsection
@section('content')
    <div class="pcoded-inner-content">
        <div class="page-wrapper">
            <div class="page-body">
                <div class="">
                    <div class="col-12">
                        <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-4">
                    <h3>Sayfa Düzenle</h3>
                </div>
                <div class="col-8">
                    <div class="float-right">
{{--                        <a href="" onclick="return window.history.back()" type="button" class="btn btn-warning btn-sm  rounded"><i class="fa fa-reply"></i></a>--}}
                    </div>
                </div>
            </div>
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
            <form action="{{ route($modul_name.'.update', $model->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Sayfa</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control form-control-normal" value="{{ route('frontend.page', $model->slug) }}" readonly>
                    </div>
                    <div class="col-sm-1" >
                        <a class="btn btn-success btn-sm"  href="{{ route('frontend.page', $model->slug) }}" target="_blank">Tıkla Git</a>
                    </div>
                    <div class="col-sm-2">

                        <a href="{{ route($modul_name.'.create') }}" type="button" class="btn btn-primary btn-sm  rounded ml-1 mr-1 " ><i class="fa fa-plus"></i>Yeni ekle</a>
                        <a href="" onclick="window.history.back()" type="button" class="btn btn-warning btn-sm  rounded"><i class="fa fa-reply"></i></a>

                    </div>

                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Sayfa başlığı</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-normal" placeholder="" name="title" value="{{ $model->title }}" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Sayfa içeriği</label>
                    <div class="col-sm-10">
                        <textarea id="ckeditor" name="detail" required>{{ $model->detail }}</textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Fotoğraf</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control form-control-normal" placeholder="" name="image" accept=".png,.jpg,.jpeg,.gif">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Mevcut Fotoğraf</label>
                    <div class="col-sm-10">
                        <img src="{{ $model->image }}" width="200"  alt="page image">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">PDF Dosyası</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control form-control-normal" placeholder="" name="pdf" accept="application/pdf">
                    </div>
                </div>


                @if($model->pdf!=NULL)
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Mevcut PDF</label>
                        <div class="col-sm-10">
                            <a href="{{ $model->pdf }}" download>PDF indir</a>
                        </div>
                    </div>
                @endif




                <div class="form-group row clearfix">
                    <label class="col-sm-2 col-form-label">Sayfa Türü</label>
                    <div class="col-sm-2">
                        <select name="page_type" class="form-control fill">
                            <option value="1" @if($model->page_type==1) selected @endif>Kurumsal</option>
{{--                            <option value="2" @if($model->page_type==2) selected @endif>Hizmet</option>--}}
{{--                            <option value="3" @if($model->page_type==3) selected @endif>Referans</option>--}}
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <select name="publish" class="form-control fill">
                            @if($model->publish==0)
                                <option value="0" selected>Yayında</option>
                                <option value="1">Taslak</option>
                            @elseif($model->publish==1)
                                <option value="0">Yayında</option>
                                <option value="1" selected>Taslak</option>
                            @endif
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <select name="parentpage" class="form-control fill">
                            <option value="0">Bağlı sayfası</option>
                            @foreach($pages as $item)
                                <option value="{{ $item->id }}" @if($item->id==$model->parentpage) selected @endif >{{ $item->title }}</option>
                            @endforeach
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

    </script>
@endsection