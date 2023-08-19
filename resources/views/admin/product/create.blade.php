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
                        <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Ürün Adı</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-normal" placeholder=""
                                        name="name" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Ürün Açıklaması</label>
                                <div class="col-sm-10">
                                    <textarea id="detail" class="form-control" name="description" maxlength="255"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Miktar / Stok</label>
                                <div class="col-sm-4">
                                    <input type="number" class="form-control  fill" max="9999" min="0"
                                        name="stock">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Fiyat</label>
                                <div class="col-sm-4">
                                    <input type="number" class="form-control  fill" name="price">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Ürün Durumu</label>
                                <div class="col-sm-4">
                                    <select class="form-control" name="status">
                                        <option value="0">Pasif</option>
                                        <option value="1" selected>Aktif</option>
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
@section('js')
    <script type="text/javascript" src="{{ asset('admin/assets/pages/form-masking/autoNumeric.js') }}"></script>
    <script src="//cdn.ckeditor.com/4.10.1/full/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('detail', {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        });
    </script>
    <script>
        $('.autonumber').autoNumeric('init');
    </script>
@endsection
