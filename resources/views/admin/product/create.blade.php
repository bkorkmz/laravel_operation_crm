@extends('layouts.layout-admin')
@section('title')
    {{ __('Ürün Ekleme Sayfası  ') }}
@endsection
@section('content')
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="card">
                    <div class="card-header">
                        <h3>Ürün Ekle</h3>
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
                        <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data"
                              id="submit-form">
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Ürün Adı<span
                                        class="text-danger"> *</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-normal" placeholder="Ürün adı"
                                           maxlength="200"
                                           onkeypress="slugCopy(this)" name="name" required value="{{old('name')}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Opsiyonel url <span class="text-danger"> *</span></label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-prepend">
                                                <label
                                                    class="input-group-text">{{"https://".request()->host()."/ürünler/"}}</label>
                                            </span>
                                        <input id="slug_content" type="text" id="slug"
                                               class="form-control text-lowercase" name="slug"
                                               maxlength="200">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Ürün Kısa Açıklaması</label>
                                <div class="col-sm-10">
                                    <textarea id="short_detail" class="form-control with-maxlength" name="short_detail"
                                              data-maxlength="500">{{old('short_detail')}}</textarea>
                                    <div class="char-count-style">
                                        <span class="char-count">0</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Ürün Açıklaması</label>
                                <div class="col-sm-10">
                                    <textarea id="detail" class="form-control " name="description"
                                              maxlength="5000">{{old('description')}}</textarea>

                                </div>
                            </div>
                            <div class="form-group row my-4">
                                <label for="category_id" class="col-sm-2 col-form-label">Kategori <span
                                        class="text-danger"> *</span></label>
                                <div class="col-sm-8">
                                    <select name="category_id" class="form-control fill js-example-basic-hide-search"
                                            id="category_id" required>
                                        <option value="">Kategori seçiniz</option>
                                        @foreach ($all_categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    <a type="button" class="float-right badge badge-inverse-danger"
                                       href="javascript:void(0)" data-toggle="modal"
                                       data-target="#addCategoryModal">Kategori Ekle</a>
                                </div>

                            </div>


                            <div class="row">
                                <div class="col-xl-6 col-sm-12 col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Miktar / Stok</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control autonumber fill"
                                                           placeholder="Stok 500"
                                                           data-v-max="999999" data-v-min="0" name="stock"
                                                           value="{{old('stock')}}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Fiyat</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control autonumber fill"
                                                           data-v-max="9999999" data-v-min="0" placeholder="Fiyat 5.000"
                                                           name="price" step="0000.01" value="{{old('price')}}">
                                                    {{--                                    <input   name="price" type="text" class="form-control autonumber fill" data-a-sep="." data-v-max="999999"   >--}}
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Durum
                                                </label>
                                                <div class="col-sm-10 row align-self-center">

                                                    <div class="form-check m-2">
                                                        <input class="form-check-input" checked type="radio"
                                                               name="publish"
                                                               id="active" value="1"
                                                            {{ old('publish', 1) == 0 ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="active">Pasif</label>
                                                    </div>
                                                    <div class="form-check m-2">

                                                        <input class="form-check-input" type="radio" name="publish"
                                                               id="passive" value="0"
                                                            {{ old('publish', 1) == 1 ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="passive">Aktif </label>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-sm-12 col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <div class="input-group mb-3">
                                                    <label class="col-sm-3 col-form-label">Ek Özellikler</label>
                                                    <select class="form-control" id="attributes">
                                                        <option value="">Özellik seçiniz</option>
                                                        <option value="popular">Popüler Ürün</option>
                                                        <option value="size">Boyut</option>
                                                        <option value="color">Renk</option>
                                                    </select>
                                                    <div class="input-group-append">
                                                        <button type="button" class="btn btn-success btn-sm add-attr"> Ekle
                                                        </button>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="form-group ">
                                                <h4>Ürün Ek Özellikleri </h4>
                                                <div class="product-attributes">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Ürün Fotoğrafı (min:188x188)<span
                                        class="text-danger"> *</span></label>
                                <div class="col-sm-6">
                                    <input type="file" class="form-control form-control-normal dropify" multiple
                                           data-show-remove="false" data-default-file=""
                                           accept=".png,.jpg,.jpeg,.gif" placeholder="" name="image" required>
                                </div>

                            </div>
                            <input type="hidden" value="0" hiddeen name="is_next" id="is_next">
                            <div class="text-right m-t-20">
                                <button class="btn btn-success rounded" onclick="return $('#is_next').val('1')">
                                    Kaydet ve Yeni Ürün Ekle
                                </button>
                                <button class="btn btn-primary rounded">Kaydet ve Listele</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.component.create_new_category',['model_name'=>'product','modalName'=>'addCategoryModal'])

@endsection
@section('css')
    {{--            <link href="{{asset('admin/assets/pages/summernote/dist/summernote.css')}}" rel="stylesheet">--}}
    <link href="{{asset('admin/assets/pages/summernote-0.8.18/summernote.css')}}" rel="stylesheet">
    {{--    <link rel="stylesheet" href="{{asset('admin/bower_components/select2/css/select2.min.css')}}" />--}}

@endsection

@section('js')
    <script type="text/javascript" src="{{ asset('admin/assets/pages/form-masking/autoNumeric.js') }}"></script>

    <script src="{{asset('admin/assets/pages/summernote-0.8.18/summernote.js')}}"></script>
    <script src="{{asset('admin/assets/pages/summernote-0.8.18/lang/summernote-tr-TR.js')}}"></script>
    <script src="{{asset('/admin/assets/pages/summernote-0.8.18/plugin/image2/summernote-image-title.js')}}"></script>
    <script type="text/javascript" src="{{ asset('admin/assets/pages/form-masking/autoNumeric.js') }}"></script>
    <script type="text/javascript" src="{{asset('admin/bower_components/select2/js/select2.full.min.js')}}"></script>

    {{--    <script src="{{asset('admin/assets/js/page-build/submit.js')}}"></script>--}}

    <script>

        $(document).ready(function () {
            $('#detail').summernote({
                lang: 'tr-TR',
                height: 200,
                imageTitle: {
                    specificAltField: true,
                },
                popover: {
                    // image: [
                    //     ['image', ['resizeFull', 'resizeHalf', 'resizeQuarter', 'resizeNone']],
                    //     ['float', ['floatLeft', 'floatRight', 'floatNone']],
                    //     ['remove', ['removeMedia']],
                    //     ['custom', ['imageTitle']],
                    // ],
                },
            });


            $('.add-attr').click(function () {
                let random_id = randomId();
                let selectedAttr = $('select[id="attributes"]').val();
                if(selectedAttr === '') {
                    toastr.warning('Lütfen bir seçenek seçiniz');
                    return false;
                }
                if (selectedAttr === 'popular') {
                    let hiddenInputs = $('.product-attributes').find('input[name^="attributes[popular]"]');
                    if (hiddenInputs.length > 0) {
                        console.log('add popular attr')
                        toastr.warning('Uyarı: Üründe popüler özelliği bulunuyor. Tekrar ekleyemez siziniz!');
                        return false;
                    }
                }

                let selectedText = $('select[id="attributes"] option:selected').text();
                if (selectedAttr === 'popular') {
                    input =
                        '<div class="row m-2 input-group mb-3" id="attr_' + random_id + '">' +
                        '<div class="input-group-prepend"><span class="input-group-text" id="inputGroup-sizing-default">' + selectedText + ' </span></div>' +
                        '<input type="hidden" aria-label="Default" aria-describedby="inputGroup-sizing-default" class="form-control" name="attributes[' + selectedAttr + ']" value="1" placeholder="Değer giriniz" required>' +
                        ' <div class="input-group-append"> <button type="button" class="btn btn-danger p-2 remove-attr" data-id="' + random_id + '">Sil</button></div>' +
                        '</div>';
                } else {
                    input = '<div class="row m-2 input-group mb-3" id="attr_' + random_id + '">' +
                                '<div class="input-group-prepend"><span class="input-group-text" id="inputGroup-sizing-default">' + selectedText + ' </span></div>' +
                                   '<input type="text" aria-label="Default" aria-describedby="inputGroup-sizing-default" class="form-control" name="attributes[' + selectedAttr + ']" value="" placeholder="Değer giriniz" required>' +
                                ' <div class="input-group-append"> <button type="button" class="btn btn-danger btn-sm remove-attr" data-id="' + random_id + '">Sil</button></div>' +
                            '</div>';
                }


                $('.product-attributes').append(input);

                let lastInput = $('#attr_' + random_id).find('input');

                if (lastInput.length > 0) {
                    lastInput.focus();
                }
            });



            $(document).on('click', '.remove-attr', function () {
                var id = $(this).data('id');
                console.log(id);
                $('#attr_' + id).remove();
            });


        });


        function slugCopy(inputElement) {
            let slug = document.getElementById('slug_content');
            console.log(inputElement.value)
            slug.value = inputElement.value;
        }
    </script>

    <script>
        $('.autonumber').autoNumeric('init');
        $('#category_id').select2({
            theme: 'bootstrap'
        });

        $.ajax({
            url: '{{ route('category.parent_data') }}',
            data: {
                model: 'product',
            },
            dataType: "json",
            success: function (data) {
                $('#category_id').empty();
                $('#category_id').append('<option value="">Kategori Seçiniz</option>');

                formatData(data);
                $('#category_id').trigger('change');
            }
        });

        function formatData(categories) {

            $.each(categories, function (index, item) {
                $('#category_id').append('<option value="' + item.id + '">' + item.name + '</option>');
                if (item.parent && item.parent.length > 0) {
                    formatData(item.parent);
                }
            });
        }

        function randomId() {
            return Math.random().toString(36).substr(2, 9);

        }
    </script>
@endsection
