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
                        <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data" id="submit-form" >
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Ürün Adı<span class="text-danger"> *</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-normal" placeholder="Ürün adı" maxlength="250"
                                           onkeypress="slugCopy(this)" name="name" required value="{{old('name')}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Opsiyonel url <span class="text-danger"> *</span></label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-prepend">
                                                <label class="input-group-text">{{"https://".request()->host()."/ürünler/"}}</label>
                                            </span>
                                        <input id="slug_content" type="text" id="slug"
                                               class="form-control text-lowercase" name="slug"
                                               maxlength="100" >
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Ürün Açıklaması</label>
                                <div class="col-sm-10">
                                    <textarea id="detail" class="form-control" name="description" maxlength="1000">{{old('description')}}</textarea>
                                </div>
                            </div>
                            <div class="form-group row my-4">
                                <label for="category_id" class="col-sm-2 col-form-label">Kategori <span class="text-danger"> *</span></label>
                                <div class="col-sm-8">
                                    <select name="category_id" class="form-control fill js-example-basic-hide-search" id="category_id" required>
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
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Miktar / Stok</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control autonumber fill" placeholder="Stok 500"
                                           data-v-max="999999" data-v-min="0" name="stock" value="{{old('stock')}}" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Fiyat</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control autonumber fill" data-v-max="9999999"  data-v-min="0" placeholder="Fiyat 5.000"
                                          name="price"   step="0.01" value="{{old('price')}}"  >
{{--                                    <input   name="price" type="text" class="form-control autonumber fill" data-a-sep="." data-v-max="999999"   >--}}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Ürün Durumu</label>
                                <div class="col-sm-6">
                                    <select class="form-control" name="status">
                                        <option value="0"> Pasif</option>
                                        <option value="1" selected > Aktif</option>
                                    </select>
                                </div>
                            </div>




                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Ürün Fotoğrafı (min:630x470) <span class="text-danger"> *</span></label>
                                <div class="col-sm-6">
                                    <input type="file" class="form-control form-control-normal dropify" multiple
                                           data-show-remove="false" data-default-file=""
                                           accept=".png,.jpg,.jpeg,.gif" placeholder="" name="image" required >
                                </div>

                            </div>
                            <input type="hidden" value="0" hiddeen name="is_next" id="is_next">
                            <div class="text-right m-t-20">
                                <button class="btn btn-success rounded" onclick="return $('#is_next').val('1')">
                                    Kaydet ve Yeni Ürün Ekle</button>
                                <button class="btn btn-primary rounded">Kaydet ve Listele</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.component.create_new_category',['model_name'=>'product'])

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

        $(document).ready(function() {
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
            theme:'bootstrap'
        });

        /* $('#category_id').select2({
             theme: 'light',
             ajax: {
                 url: '{{ route("category.parent_data") }}',
                data: {
                    model: 'product',
                },
                dataType: 'json',
                processResults: function (data) {
                    // Veriyi düzenleme işlemlerini burada yapın
                    function formatData(item) {

                        var formattedData = {
                            id: item.id,
                            text: item.name,
                        };
                        if (item.parent && item.parent.length > 0) {
                            formattedData = item.parent.map(function (child) {
                                return {
                                    id: child.id,
                                    text: child.name,
                                };
                            });
                        }
                        return formattedData;
                    }
                    return {
                        results: data.map(formatData),
                    };
                },
                cache: true
            }
        });*/

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
                $('#category_id').append('<option value="' + item.id + '">'+item.name + '</option>');
                if (item.parent && item.parent.length > 0) {
                    formatData(item.parent);
                }
            });
        }

    </script>
@endsection
