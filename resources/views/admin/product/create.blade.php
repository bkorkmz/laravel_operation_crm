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
                                <label class="col-sm-2 col-form-label">Ürün Adı</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-normal" placeholder="Ürün adı " maxlength="250"
                                        name="name" required value="{{old('name')}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Ürün Açıklaması</label>
                                <div class="col-sm-10">
                                    <textarea id="detail" class="form-control" name="description" maxlength="1000">{{old('description')}}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Miktar / Stok</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control autonumber fill" placeholder="Stok 500"
                                           data-v-max="999999" data-v-min="0" name="stock" value="{{old('stock')}}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Fiyat</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control autonumber fill" data-v-max="9999999"  data-v-min="0" placeholder="Fiyat 5.000" 
                                          name="price"   step="0.01" value="{{old('price')}}" required >
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
                                <label class="col-sm-2 col-form-label">Ürün Fotoğrafı (min:630x470)</label>
                                <div class="col-sm-6">
                                    <input type="file" class="form-control form-control-normal dropify"
                                           data-show-remove="false" data-default-file=""
                                           accept=".png,.jpg,.jpeg,.gif" placeholder="" name="image" required >
                                </div>

                            </div>
                            
                            
                            
                            
                            <input type="hidden" value="0" hiddeen name="is_next" id="is_next">
                            <div class="text-right m-t-20">
                                <button class="btn btn-success rounded" onclick="return $('#is_next').val('1')">Kaydet ve
                                    Yeni Ürün Ekle</button>
                                <button class="btn btn-primary rounded">Kaydet ve Listele</button>
                            </div>
                        </form>
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
    <script type="text/javascript" src="{{ asset('admin/assets/pages/form-masking/autoNumeric.js') }}"></script>

    <script src="{{asset('admin/assets/pages/summernote-0.8.18/summernote.js')}}"></script>
    <script src="{{asset('admin/assets/pages/summernote-0.8.18/lang/summernote-tr-TR.js')}}"></script>
    <script src="{{asset('/admin/assets/pages/summernote-0.8.18/plugin/image2/summernote-image-title.js')}}"></script>
    <script type="text/javascript" src="{{ asset('admin/assets/pages/form-masking/autoNumeric.js') }}"></script>

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

    </script>

    <script>
        $('.autonumber').autoNumeric('init');
    </script>
@endsection
