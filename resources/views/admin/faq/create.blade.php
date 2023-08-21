@extends('layouts.layout-admin')
@section('title')
    {{ __('Soru/Cevap Ekle ') }}
@endsection

@section('content')

<div class="pcoded-inner-content">
    <div class="main-body">
        <div class="page-wrapper">
            <div class="card">
                <div class="card-header">
                    <h3>Soru/Cevap  Ekle</h3>
                    <button type="button" class="btn btn-grd-warning btn-sm float-right rounded mr-1  "
                    onclick="return window.history.back()"><i class="fa fa-reply"></i>Geri Dön</button>
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
                    <form action="{{ route($module_name.'.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Soru Metni  <span class="text-danger"> *</span></label>
                            <div class="col-sm-10">
                                <textarea  class="form-control form-control-normal" placeholder="Soru metni  giriniz" rows="2" cols="2"
                                    name="question"  required></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Bağlantı (Url)</label>
                            <div class="col-sm-10">
                                <textarea  class="form-control form-control-normal" placeholder="Soru metni  giriniz" rows="2" cols="2"
                                name="answer"  required></textarea>
                                
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Sıralama <span class="text-danger">
                                    *</span></label>
                            <div class="col-sm-10">
                               <input type="number" class="form-control form-control-normal" value="0" placeholder="Sıralama için bir sayı giriniz">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Onay Durumu<span class="text-danger">
                                    *</span></label>
                            <div class="col-sm-10">
                                <select name="status" class="form-control fill" required>
                                    <option value="1" {{ old('status', 1) == 1 ? "selected" : "" }}>Yayında</option>
                                    <option value="0" {{ old('status', 1) == 0 ? "selected" : "" }}>Taslak</option>

                                </select>
                            </div>
                        </div>
                       
                        <div class="text-right m-t-20">
                            <button class="btn btn-primary rounded">Kaydet</button>
                        </div>
                    </form>
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
