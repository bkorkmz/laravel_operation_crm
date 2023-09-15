@extends('layouts.layout-admin')
@section('title')
    {{ __('Soru Grubu Ekle ') }}
@endsection
@section('content')
    <div class="pcoded-inner-content">
        <div class="page-wrapper">
            <div class="page-body">
                <div class="">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3>Soru Grubu Ekle</h3>
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
                                    <form action="{{ route($modul_name . '.store') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Başlık <span
                                                    class="text-danger"> *</span></label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control form-control-normal"
                                                    value="{{ old('name') }}" placeholder="" name="name" maxlength="50"
                                                    required>
                                            </div>
                                        </div>
                                        
                             

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Açıklama</label>
                                            <div class="col-sm-10">
                                                <textarea type="text" class="form-control form-control-normal"  placeholder="" name="description"
                                                    maxlength="250">{{ old('description') }}</textarea>
                                            </div>
                                        </div>
                           



                                        <div class="form-group row my-4">
                                            <label class="col-sm-2 col-form-label">Durum
                                               </label>
                                            <div class="col-sm-3 row align-self-center" >
                                                
                                                <div class="form-check m-2">
                                                    <input class="form-check-input" checked type="radio" name="status"
                                                        id="active" value="1"
                                                        {{ old('status',1) == 1 ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="active">Aktif</label>
                                                </div>
                                                <div class="form-check m-2">
                                                   
                                                    <input class="form-check-input"  type="radio" name="status"
                                                        id="passive" value="0"
                                                        {{ old('status',1) == 0 ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="passive">Pasif </label>
                                                </div>
                                            </div>
                                        </div>

                                        <hr>
                                
                                      

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




    @endsection


    @section('css')
        

    @endsection

    @section('js')

    @endsection
