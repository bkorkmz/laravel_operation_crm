@extends('layouts.layout-admin')
@section('title')
    {{ __('Ürün Düzenle ') }}
@endsection
@section('content')

    @php
 $attributes = !blank($products->attributes) ? json_decode($products->attributes,true) : [] ; @endphp

    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="card">
                    <div class="card-header">
                        <h3>Ürün Düzenle</h3>
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
                        <form action="{{ route('product.update', [$products]) }}" method="post"
                              enctype="multipart/form-data">
                            @csrf


                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="name">Ürün Adı</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-normal" placeholder="" id="name"
                                           onkeyup="slugCopy(this)"  name="name" value="{{ $products->name }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Opsiyonel url <span class="text-danger"> *</span></label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-prepend">
                                                <label for="slug"
                                                    class="input-group-text">{{"https://".request()->host()."/ürünler/"}}</label>
                                            </span>
                                        <input id="slug_content" type="text" id="slug" value="{{ $products->slug }}"
                                               class="form-control text-lowercase" name="slug"
                                               maxlength="100">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Ürün Kısa Açıklaması</label>
                                <div class="col-sm-10">
                                    <textarea id="short_detail" class="form-control with-maxlength" name="short_detail"
                                              data-maxlength="500">{{ $products->short_detail}}</textarea>
                                    <div class="char-count-style">
                                        <span class="char-count">0</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Ürün Açıklaması</label>
                                <div class="col-sm-10">
                                    <textarea id="detail" class="form-control" name="description"
                                              maxlength="255">{!! $products->description !!}</textarea>
                                </div>
                            </div>

                            <div class="form-group row my-4">
                                <label for="category_id" class="col-sm-2 col-form-label">Kategori</label>
                                <div class="col-sm-8">
                                    <select name="category_id" class="form-control fill js-example-basic-hide-search"
                                            id="category_id" required>
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
                                                <label class="col-sm-4 col-form-label">Miktar / Stok</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control fill"
                                                           placeholder="Stok 500" min="1" max="6"
                                                           data-v-max="9999999" data-v-min="1" name="stock"
                                                           value="{{ $products->stock}}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label" for="price">Fiyat</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control number-mask  fill"
                                                           minlength="1" placeholder="Fiyat 5.000" maxlength="10"
                                                           name="price" step="0000.01"     value="{{ $products->price}}">
                                                </div>

                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label" for="old_price">Eski Fiyat</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control number-mask  fill"
                                                           minlength="1" placeholder="Eski Fiyat 5.000" maxlength="10"
                                                           name="old_price" step="0000.01" value="{{$products->old_price}}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Durum</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control" name="status">
                                                        <option
                                                            value="0" {{ $products->status === 0 ? 'selected' : '' }}>
                                                            Onay Bekliyor
                                                        </option>
                                                        <option
                                                            value="1" {{ $products->status === 1 ? 'selected' : '' }}>
                                                            Aktif
                                                        </option>
                                                        <option
                                                            value="2" {{ $products->status === 2 ? 'selected' : '' }}>
                                                            Tükendi
                                                        </option>
                                                        <option
                                                            value="3" {{ $products->status === 3 ? 'selected' : '' }}>
                                                            Yayından kaldırıldı
                                                        </option>
                                                    </select>
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
                                                    <label class="col-sm-3 col-form-label">@lang('product.add_special_features')</label>
                                                    <select class="form-control" id="attributes">
                                                        <option value="">@lang('product.select_an_attributes')</option>
                                                        <option value="best-sales">@lang('product.best-sales')</option>
                                                        <option value="popular">@lang('product.popular')</option>
                                                        <option value="size">@lang('product.size')</option>
                                                        <option value="color">@lang('product.color')</option>
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
                                                    @php $attrArray =['size','color']; $type = 'text';  $hidden = ""; @endphp

                                                    @forelse($attributes as $attr=>$value)
                                                        @if($attr == "popular" || $attr == "best-sales")
                                                            @php $type = 'number'; $hidden = "hidden" @endphp
                                                        @endif

{{--                                                        <div class="row m-2 input-group mb-3" id="attr_' + random_id + '">--}}
{{--                                                            <div class="input-group-prepend"><span class="input-group-text" id="inputGroup-sizing-default">' + selectedText + ' </span></div>--}}
{{--                                                            <input type="hidden" aria-label="Default" aria-describedby="inputGroup-sizing-default" class="form-control" name="attributes[' + selectedAttr + ']" value="1" placeholder="Değer giriniz" required>--}}
{{--                                                             <div class="input-group-append"> <button type="button" class="btn btn-danger p-2 remove-attr" data-id="' + random_id + '">Sil</button></div>--}}
{{--                                                            </div>--}}

                                                            <div class="row m-2 input-group mb-3" id="{{'attr_'.$loop->iteration}}">
                                                                <div class="input-group-prepend"><span class="input-group-text" id="inputGroup-sizing-default"> @lang('product.'.$attr) </span></div>
                                                                <input type="{{$type}}" {{$hidden}} aria-label="Default" aria-describedby="inputGroup-sizing-default"
                                                                       class="form-control" name="attributes[{{$attr}}]" value="{{$value}}" placeholder="Değer giriniz" required>
                                                                 <div class="input-group-append">
                                                                     <button type="button" class="btn btn-danger p-2 remove-attr" data-id="{{$loop->iteration}}">Sil</button>
                                                                 </div>
                                                            </div>

{{--                                                        <div class="row m-2" id="{{'attr_'.$loop->iteration}}">--}}
{{--                                                            <label class="col-4"> @lang('product.'.$attr)</label>--}}
{{--                                                            <div class="col-6">--}}
{{--                                                                <input type="{{$type}}" {{$hidden}} class="form-control"--}}
{{--                                                                       name="attributes[{{$attr}}]" value="{{$value}}"--}}
{{--                                                                       {{$type = 'number' ? 'min = 0 max = 1' : ''}}--}}
{{--                                                                       placeholder="Değer giriniz" required></div>--}}
{{--                                                            <button type="button"--}}
{{--                                                                    class="btn btn-danger btn-sm remove-attr"--}}
{{--                                                                    data-id="{{$loop->iteration}}">Sil--}}
{{--                                                            </button>--}}
{{--                                                        </div>--}}
                                                        @empty
                                                    @endforelse
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Ürün Fotoğrafı (min:188x188)</label>
                                <div class="col-sm-6">
                                    <input type="file" class="form-control form-control-normal dropify"
                                           data-show-remove="false" data-default-file="{{ asset($products->photo) }}"
                                           accept=".png,.jpg,.jpeg,.gif" placeholder="" name="image">
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
    {{--    @dd($products)--}}


    @include('admin.component.create_new_category',['model_name'=>'product','modalName'=>'addCategoryModal'])

@endsection


@section('css')
    <style>
        .select2-container {
            width: 100% !important;
        }
    </style>
@endsection

@section('js')
    <script type="text/javascript" src="{{ asset('admin/assets/pages/form-masking/autoNumeric.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/assets/pages/form-masking/autoNumeric.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/assets/pages/form-masking/autoNumeric.js') }}"></script>

    <script src="{{asset('admin/assets/pages/summernote-0.8.18/summernote.js')}}"></script>
    <script src="{{asset('admin/assets/pages/summernote-0.8.18/lang/summernote-tr-TR.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.6/jquery.inputmask.min.js"></script>

    <script>

        $(document).ready(function () {

            // $('.autonumber').autoNumeric('init');


            $('#detail').summernote({
                lang: 'tr-TR',
                height: 200,
                imageTitle: {
                    specificAltField: true,
                },
                popover: {
                    image: [
                        ['image', ['resizeFull', 'resizeHalf', 'resizeQuarter', 'resizeNone']],
                        ['float', ['floatLeft', 'floatRight', 'floatNone']],
                        ['remove', ['removeMedia']],
                        ['custom', ['imageTitle']],
                    ],
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
                if (selectedAttr === 'popular'|| selectedAttr === 'best-sales') {
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


    </script>

    <script>
        // $('.autonumber').autoNumeric('init');
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
                let category = @json($products->category[0]->id);
                $('#category_id').empty();
                $('#category_id').append('<option value="">Kategori Seçiniz</option>');
                formatData(data);
                $('#category_id').val(category).trigger('change');
            }
        });

        function formatData(categories) {
            let selected = '';
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

        $(document).ready(function() {
            $('.number-mask').inputmask({
                alias: 'numeric',
                rightAlign: false,
            });
        });
    </script>
@endsection
