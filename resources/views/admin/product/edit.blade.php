@extends('layouts.layout-admin')
@section('title')
    {{ __('Ürün Düzenle ') }}
@endsection
@section('content')
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
                        <form action="{{ route('product.update', [$products]) }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label badge badge-secondary" for="slug">Ürün Bağlantı Etiketi</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-normal" placeholder=""
                                           name="slug" value="{{ $products->slug }}" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Ürün Adı</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-normal" placeholder=""
                                        name="name" value="{{ $products->name }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Ürün Açıklaması</label>
                                <div class="col-sm-10">
                                    <textarea id="detail" class="form-control" name="description" maxlength="255">{!! $products->description !!}</textarea>
                                </div>
                            </div>

                            <div class="form-group row my-4">
                                <label for="category_id" class="col-sm-2 col-form-label">Kategori</label>
                                <div class="col-sm-8">
                                    <select name="category_id" class="form-control fill js-example-basic-hide-search" id="category_id" required>
{{--                                        <option value="">Kategori seçiniz</option>--}}
{{--                                        @foreach ($all_categories as $category)--}}
{{--                                            <option value="{{ $category->id }}">{{ $category->name }}</option>--}}
{{--                                        @endforeach--}}
                                    </select>
                                    <a type="button" class="float-right badge badge-inverse-danger"
                                       href="javascript:void(0)" data-toggle="modal"
                                       data-target="#addCategoryModal">Kategori Ekle</a>
                                </div>

                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Miktar / Stok</label>
                                <div class="col-sm-4">

                                    <input type="text" class="form-control autonumber fill" placeholder="Stok 500"
                                           data-v-max="999999" data-v-min="0" name="stock" value="{{ $products->stock ?? ""}}" >

                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Fiyat</label>
                                <div class="col-sm-4">
                                    <input type="number" class="form-control  fill" name="price"
                                        value="{{ $products->price ?? ""}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Ürün Durumu</label>
                                <div class="col-sm-4">
                                    <select class="form-control" name="status">
                                        <option value="0" {{ $products->status === 0 ? 'selected' : '' }}>Onay Bekliyor</option>
                                        <option value="1" {{ $products->status === 1 ? 'selected' : '' }}>Aktif</option>
                                        <option value="2" {{ $products->status === 2 ? 'selected' : '' }}>Tükendi</option>
                                        <option value="3" {{ $products->status === 3 ? 'selected' : '' }}>Yayından kaldırıldı</option>
                                    </select>
                                </div>
                            </div>




                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Ürün Fotoğrafı</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control form-control-normal" placeholder=""
                                        name="image">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Mevcut Fotoğrafı</label>
                                <div class="col-sm-10">
                                    <img src="{{ asset($products->photo) }}" alt="product image" width="200px"
                                        height="200px">
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

@endsection


@section('css')
    <style>
        .select2-container {
            width: 100%!important;
        }
    </style>
@endsection

@section('js')
    <script type="text/javascript" src="{{ asset('admin/assets/pages/form-masking/autoNumeric.js') }}"></script>

    <script src="{{asset('admin/assets/pages/summernote-0.8.18/summernote.js')}}"></script>
    <script src="{{asset('admin/assets/pages/summernote-0.8.18/lang/summernote-tr-TR.js')}}"></script>
{{--    <script src="{{asset('/admin/assets/pages/summernote-0.8.18/plugin/image2/summernote-image-title.js')}}"></script>--}}
{{--    <script type="text/javascript" src="{{ asset('admin/assets/pages/form-masking/autoNumeric.js') }}"></script>--}}

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
                    image: [
                        ['image', ['resizeFull', 'resizeHalf', 'resizeQuarter', 'resizeNone']],
                        ['float', ['floatLeft', 'floatRight', 'floatNone']],
                        ['remove', ['removeMedia']],
                        ['custom', ['imageTitle']],
                    ],
                },
            });
        });

        $('#category_id').select2({
            theme:'bootstrap'
        });

    </script>

    <script>
        $('.autonumber').autoNumeric('init');




        $.ajax({
            url: '{{ route('category.parent_data') }}',
            data: {
                model: 'product',
            },
            dataType: "json",
            success: function (data) {
                let category = @json($products->category->first());
                $('#category_id').empty();
                $('#category_id').append('<option value="">Kategori Seçiniz</option>');

                formatData(data,category);
                $('#category_id').trigger('change');
            }
        });

        function formatData(categories,select_id) {
            let selected = '';
            $.each(categories, function (index, item) {
                if(select_id != null) {
                    if (select_id === item.id){
                        selected = 'selected';
                    }
                }
                $('#category_id').append('<option value="' + item.id + '" '+selected+'>'+item.name + '</option>');


                if (item.parent && item.parent.length > 0) {
                    formatData(item.parent);
                }
            });
        }
    </script>
@endsection
