@extends('layouts.layout-admin')
@section('title')
    {{ __('Ürün Düzenle ') }}
@endsection
@section('content')
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="card">
                        <div class="card-header">
                            <h3>Rol İzinlerini Düzenle</h3>
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
                            <form action="{{route('roles.update',['1'])}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Rol Adı</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-normal" placeholder="" name="name" value="{{$role->name}}" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="card col-4 m-3">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <span>İzin Grubu</span>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input js-small" type="checkbox" id="select-all-toggle">
                                                <label class="form-check-label" for="select-all-toggle">Tümünü Seç</label>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input js-small" type="checkbox" id="permission-toggle">
                                                <label class="form-check-label" for="permission-toggle">Bu izni ver</label>
                                                <p class="card-text">Bu iznin açıklaması burada yer alacak.</p>
                                            </div>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input js-small" type="checkbox" id="permission-toggle">
                                                <label class="form-check-label" for="permission-toggle">Bu izni ver</label>
                                                <p class="card-text">Bu iznin açıklaması burada yer alacak.</p>
                                            </div>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input js-small" type="checkbox" id="permission-toggle">
                                                <label class="form-check-label" for="permission-toggle">Bu izni ver</label>
                                                <p class="card-text">Bu iznin açıklaması burada yer alacak.</p>
                                            </div>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input js-small" type="checkbox" id="permission-toggle">
                                                <label class="form-check-label" for="permission-toggle">Bu izni ver</label>
                                                <p class="card-text">Bu iznin açıklaması burada yer alacak.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card col-4 m-3">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <span>İzin Grubu</span>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input js-small" type="checkbox" id="select-all-toggle">
                                                <label class="form-check-label" for="select-all-toggle">Tümünü Seç</label>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input js-small" type="checkbox" id="permission-toggle">
                                                <label class="form-check-label" for="permission-toggle">Bu izni ver</label>
                                                <p class="card-text">Bu iznin açıklaması burada yer alacak.</p>
                                            </div>
                                        </div>
                                    </div>
                                    

                                    

                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
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