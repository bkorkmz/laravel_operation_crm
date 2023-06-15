@extends('layouts.layout-admin')
@section('title')
 {{ __('Kullanıcı Kayıt Ekranı ') }}
@endsection

@section('content')


<div class="pcoded-inner-content">
    <div class="main-body">
        <div class="page-wrapper">
            <div class="card">
                <div class="card-header">
                    <h3>Kullanıcı Ekle</h3>
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
                    <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Ad Soyad <span class="text-danger"> *</span></label>
                            <div class="col-sm-10">
                                <input type="text"
                                    class="form-control form-control-normal"
                                    placeholder="" name="name"
                                    value="{{ old('name') }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">E Posta <span class="text-danger"> *</span></label>
                            <div class="col-sm-10">
                                <input id="email" type="email"
                                    class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                    name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Şifre <span class="text-danger"> *</span></label>
                            <div class="col-sm-10">
                                <input id="password"
                                    type="password"
                                    minlength="8"
                                    class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                    name="password" autocomplete="off" required>
                                <small>
                                <span class=" text-danger " readonly>Şifre en az 8 karakter bir büyük harf ve bir küçük harf içermelidir</span>
                                </small>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Şifre Tekrar <span class="text-danger"> *</span></label>
                            <div class="col-sm-10">
                                <input id="password-confirm" type="password" class="form-control" minlength="8" name="password_confirmation" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Yetkisi <span class="text-danger"> *</span></label>
                            <div class="col-sm-10">
                                <select name="status" class="form-control fill" required>
                                    <option value="0">Müşteri</option>
                                    <option value="1">Admin</option>
                                    <option value="2">Firma</option>
                                    <option value="3">Editör</option>
                                </select>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Profil Fotoğrafı</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control form-control-normal" placeholder="" name="avatar" accept="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Cinsiyet</label>
                            <div class="col-sm-10">
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="gender" id="gender-1" value="male" required> @lang('Erkek')
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="gender" id="gender-2" value="female" required> @lang('Kadın')
                                    </label>
                                </div>
                                <span class="messages"></span>
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
    <script>

        $('#select_city').on('change', function (e) {
            $("#county option").remove();
            $("#city option").remove();
            // let optionSelected = $("option:selected", this);
            let valueSelected = this.value;
            console.log('Seçilen şehir '+valueSelected)

            if(!valueSelected){
                $('#country_select').attr('hidden',true);
            }
            else{
                $('#country_select').removeAttr('hidden');
            }
            $.ajax({
                url:'{{ route("sehirler") }}',
                type:'POST',
                data:{
                    "_token": "{{ csrf_token() }}",
                    id:valueSelected
                },
                success: function(veri) {
                    console.log(veri)
                    // $("#county").append('<option>--İlçe seçiniz--</option>');
                    $.each( veri, function(key, value) {
                        $('#county').append($('<option>', {value:value, text:value}));
                    });

                }

            })



        });

    </script>
@endsection
