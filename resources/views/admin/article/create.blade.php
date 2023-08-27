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
                                href="{{route($modul_name.'.index')}}"><i class="fa fa-reply"></i>Geri Dön</a>

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
                                    <form action="{{ route($modul_name.'.store') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Makale başlığı <span class="text-danger"> *</span></label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control form-control-normal" value="{{old('title')}}"
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
                                            <label class="col-sm-2 col-form-label">Makale özeti <span class="text-danger"> *</span></label>
                                            <div class="col-sm-10">
                                                    <textarea type="text" class="form-control form-control-normal" required
                                                        placeholder="" name="short_detail" maxlength="250">{{old('short_detail')}}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Makale içeriği <span class="text-danger"> *</span></label>
                                            <div class="col-sm-10">
                                                <textarea id="ckeditor" class="form-control form-control-normal" name="detail" rows="5"  >{{old('detail')}}</textarea>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Anahtar kelimeler</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control form-control-normal"
                                                    placeholder="" name="keywords" maxlength="50" value="{{old('keywords')}}">
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
                                                {{-- <a type="button" class="float-right badge badge-inverse-danger"
                                                    href="javascript:void(0)" data-toggle="modal"
                                                    data-target="#addCategoryModal">Kategori Ekle</a> --}}
                                            </div>
                                            {{-- <div class="col-sm-3 float-center">
                                                <label>Manşette Başlık</label>
                                                <div class="form-check text-left">
                                                    <input class="form-check-input" checked type="radio" name="mtitle"
                                                        id="showMtitle" value="0"{{old('mtitle') == 0 ? 'checked' :"" }}>
                                                    <label class="form-check-label" for="showMtitle">Göster</label>
                                                </div>
                                                <div class="form-check text-left">
                                                    <input class="form-check-input" type="radio" name="mtitle"
                                                        id="hideMtitle" value="1"{{old('mtitle') == 1 ? 'checked' :"" }}>
                                                    <label class="form-check-label" for="hideMtitle">Gösterme</label>
                                                </div>
                                            </div> --}}
                                            <div class="col-sm-3">
                                                <label>Durum</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" checked type="radio" name="publish"
                                                        id="showpublish" value="0" {{old('publish') == 0 ? 'checked' :"" }}>
                                                    <label class="form-check-label" for="showpublish">Yayında</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="publish"
                                                        id="hidepublish" value="1" {{old('publish') == 1 ? 'checked' :"" }}>
                                                    <label class="form-check-label" for="hidepublish">Taslak</label>
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
                                       
                                        {{-- <hr>
                                        <div class="form-group has-warning row">
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
                                            <label class="col-sm-2 col-form-label">Makale Fotoğrafı (min:630x470)</label>
                                            <div class="col-sm-5">
                                                <input type="file" class="form-control form-control-normal dropify"
                                                    placeholder="" name="image" accept=".jpg,.jpeg,.png,.tiff,.gif,.svg,.webp,.bmp,.ico">
                                             </div>
                                        </div>

                                  
                                        {{-- <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Tarih</label>
                                            <div class="col-sm-10">
                                                <input type="datetime-local" class="form-control form-control-normal"
                                                    name="date">
                                            </div>
                                        </div> --}}

                                        {{-- <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="pushbildirim" name="pushbildirim">
                                            <label class="form-check-label" for="pushbildirim">Push Bildirim Gönder</label>
                                        </div> --}}

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
    <style>

    </style>
 
    @endsection

    @section('js')
        <script type="text/javascript" src="{{ asset('admin/assets/bower_components/sweetalert/js/sweetalert.min.js') }}">
        <script src="https://cdn.ckeditor.com/ckeditor5/39.0.0/classic/ckeditor.js"></script>
        <script src="https://cdn.ckeditor.com/ckeditor5/39.0.0/classic/translations/tr.js"></script>
        <script>
            $(document).ready(function() {

                $('#category-form').on('submit', function(e) {
                    e.preventDefault();

                    var category_name = $('#category-name').val();
                    if (category_name !== "") {
                        $.ajax({
                            url: "{{ route('category.store') }}",
                            method: 'POST',
                            data: {
                                name: category_name,
                                model: 'article',
                                _token: "{{ csrf_token() }}"
                            },
                            success: function(response) {
                                swal("Kategori başarıyla oluşturuldu!");
                                $('#addCategoryModal').Modal().hide()

                            },
                            error: function(xhr, status, error) {
                                swal("Bir hata oluştu!");
                            }
                        });
                    }
                    swal("Kategori Boş Olamaz!");

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

            ClassicEditor

                .create(document.querySelector('#ckeditor'))
            
                .catch(error => {
                    console.error(error);
                }); 

                

                $('.dropify').dropify({
            messages: {
                'default': 'Resim yükle ya da sürükle',
                'replace': 'Resim değiştir ya da sürükle',
                'remove': 'Kaldır',
                'error': 'Hata! Desteklenen dosya tipinden farklı bir dosya yüklediniz.'
            }
        });

                
                        </script>
        {{-- <script type="text/javascript" src="{{ asset('admin/assets/js/jquery.marcopolo.min.js') }}"></script> --}}
    @endsection
