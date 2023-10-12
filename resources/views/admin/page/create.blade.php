@extends('layouts.layout-admin')
@section('title')
    {{ __('Sayfa Ekle ') }}
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Sayfa Ekle</h3>
        </div>
        <div class="card-block">
{{--@dd($modul_name)--}}
            <form action="{{ route($modul_name.'.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Sayfa başlığı</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-normal" placeholder="" name="title" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Sayfa içeriği</label>
                    <div class="col-sm-10">
                        <textarea id="ckeditor" name="detail" required></textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Fotoğraf</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control form-control-normal" placeholder="" name="image">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">PDF Dosyası</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control form-control-normal" placeholder="" name="pdf" accept="application/pdf">
                    </div>
                </div>

                <div class="form-group row clearfix">
                    <label class="col-sm-2 col-form-label">Sayfa Türü</label>
                    <div class="col-sm-2">
                        <select name="page_type" class="form-control fill">
                            <option value="1">Kurumsal</option>
                            <option value="2">Hizmet</option>
                            <option value="3">Referans</option>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <select name="publish" class="form-control fill">
                            <option value="0">Yayında</option>
                            <option value="1">Taslak</option>
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <select name="parentpage" class="form-control fill">
                            <option value="">Bağlı sayfası</option>
                            @foreach($pages as $page)
                                <option value="{{ $page->id }}">{{ $page->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>



                <div class="text-right m-t-20">
                    <button class="btn btn-primary rounded">Kaydet</button>
                </div>
            </form>
        </div>
    </div>
@endsection


@section('css')
@endsection

@section('js')
{{--    <script src="//cdn.ckeditor.com/4.10.1/full/ckeditor.js"></script>--}}
{{--<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>--}}

<script>
        // CKEDITOR.replace( 'ckeditor');

        $('#ckeditor').summernote({
            lang: 'tr-TR', // default: 'en-US'
            height: 300,

        },
        popover: {
            image: [

                // This is a Custom Button in a new Toolbar Area
                ['custom', ['examplePlugin']],
                ['imagesize', ['imageSize100', 'imageSize50', 'imageSize25']],
                ['float', ['floatLeft', 'floatRight', 'floatNone']],
                ['remove', ['removeMedia']]
            ]
        });

        $('#summernote').summernote({
   
        });
    </script>
@endsection
