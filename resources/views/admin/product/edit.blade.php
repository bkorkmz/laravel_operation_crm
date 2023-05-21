@extends('layouts.layout-admin')
@section('title')
    {{ __('Ürün Düzenle ') }}
@endsection
@section('content')
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
            <form action="{{route('product.update',[$products])}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Ürün Adı</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-normal" placeholder="" name="name" value="{{$products->name}}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Ürün Açıklaması</label>
                    <div class="col-sm-10">
                        <textarea id="detail" class="form-control" name="description" maxlength="255">{!! $products->description !!}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Miktar / Stok</label>
                    <div class="col-sm-4">
                        <input type="number" class="form-control  fill" max="9999"  min="0"  name="stock"value="{{$products->quantity}}" >
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Fiyat</label>
                    <div class="col-sm-4">
                        <input type="number" class="form-control  fill"  name="price" value="{{$products->price}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Ürün Durumu</label>
                    <div class="col-sm-4">
                        <select class="form-control" name="status">
                            <option value="0" {{$products->status === 0 ? 'selected' : "" }}>Onay Bekliyor</option>
                            <option value="1" {{$products->status === 1 ? 'selected' : "" }}>Aktif</option>
                            <option value="2" {{$products->status === 2 ? 'selected' : "" }}>Tükendi</option>
                            <option value="3" {{$products->status === 3 ? 'selected' : "" }}>Yayından kaldırıldı</option>
                        </select>
                    </div>
                </div>




                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Ürün Fotoğrafı</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control form-control-normal" placeholder="" name="image">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Mevcut Fotoğrafı</label>
                    <div class="col-sm-10">
                        <img src="{{ asset($products->photo) }}" alt="product image" width="200px" height="200px">
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
    <script src="//cdn.ckeditor.com/4.10.1/full/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'detail', {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        });
    </script>
@endsection