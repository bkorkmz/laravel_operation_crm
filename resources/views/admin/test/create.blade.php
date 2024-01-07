@extends('layouts.layout-admin')
@section('title')
    {{ __('Test Kayıt Sayfası ') }}
@endsection

@section('content')

    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="card">
                    <div class="card-header">
                        <h3>Yeni Test Ekle</h3>
                        <a href="{{route($module_name.'.index')}}"
                           class="btn btn-grd-warning btn-sm float-right rounded mr-1  "><i class="fa fa-reply"></i>Geri
                            Dön</a>
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
                                <label class="col-sm-2 col-form-label">Test Adı <span
                                            class="text-danger"> *</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-normal"
                                           placeholder="Test adı giriniz"
                                           name="name" maxlength="50" value="{{ old('name') }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Test Açıklaması <span
                                            class="text-danger"> </span></label>
                                <div class="col-sm-10">
                                <textarea type="text" class="form-control form-control-normal"
                                          placeholder="Test Açıklaması giriniz"
                                          name="description" maxlength="500"> {{ old('description') ?? "" }} </textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Bağlı Soru Bankası<span
                                            class="text-danger"> *</span></label>
                                <div class="col-sm-8">
                                    <select name="questionbank" class="form-control fill" required>
                                        <option value="">Bir seçim yapınız</option>
                                        @foreach($questionBank as $qbank)
                                            <option {{old('questionbank') == $qbank->id  ? 'selected' : ""}} value="{{$qbank->id}}">{{$qbank->name."  - Soru sayısı :".$qbank->questions_count }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="form-group row my-4 ">
                                <label class="col-sm-2 col-form-label">Durum
                                </label>
                                <div class="col-sm-3 row align-self-center">

                                    <div class="form-check m-2">
                                        <input class="form-check-input" checked type="radio" name="status"
                                               id="active" value="1"
                                                {{ old('status',1) == 1 ? 'checked' : '' }}>
                                        <label class="form-check-label" for="active">Aktif</label>
                                    </div>
                                    <div class="form-check m-2">

                                        <input class="form-check-input" type="radio" name="status"
                                               id="passive" value="0"
                                                {{ old('status',1) == 0 ? 'checked' : '' }}>
                                        <label class="form-check-label" for="passive">Pasif </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row my-4 ">
                                <label class="col-sm-2 col-form-label">Ödeme Seçenekleri </label>
                                <div class="row align-self-center col">

                                    <div class="form-check m-2">
                                        <input class="form-check-input" checked type="radio" name="wage_status"
                                               id="free" value="free" onclick="addPriceInput()"
                                                {{ old('wage_status',"free") == "free" ? 'checked' : '' }}>
                                        <label class="form-check-label" for="free">Ücretsiz</label>
                                    </div>
                                    <div class="form-check m-2">
                                        <input class="form-check-input" type="radio" name="wage_status"
                                               id="pay" value="pay" onclick="addPriceInput()"
                                                {{ old('wage_status',"free") == "pay" ? 'checked' : '' }}>
                                        <label class="form-check-label" for="pay">Ücretli </label>
                                    </div>
                                    <div class="form-check">
                                        <input type="text" class="form-control autonumber fill" data-v-max="9999999"
                                               data-v-min="0" placeholder="Fiyat 5.000"
                                               name="price" id="priceInput" step="0.01" value="{{old('price')}}"
                                               style="{{old('price') ?'visibility: visible' : 'visibility: hidden' }}">

                                    </div>

                                </div>
                            </div>
                            <input type="hidden" value="0" hiddeen name="is_next" id="is_next">

                            <div class="text-right m-t-20">
                                <button class="btn btn-success rounded" onclick="return $('#is_next').val('1')">Kaydet
                                    ve        Yeni Test Ekle
                                </button>
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
@endsection

@section('js')

    <script type="text/javascript" src="{{ asset('admin/assets/pages/form-masking/autoNumeric.js') }}"></script>

    <script>
        $('.autonumber').autoNumeric('init');

        // Radio button değişimini dinle
        function addPriceInput() {
            let payRadio = document.getElementById('pay');
            let priceInput = document.getElementById('priceInput');
            console.log("payRadio", payRadio.checked)
            if (payRadio.checked) {
                priceInput.style.visibility = 'visible'
            } else {
                priceInput.style.visibility = 'hidden'
            }
        };

    </script>

@endsection
