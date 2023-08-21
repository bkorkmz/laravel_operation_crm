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
                        <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Ad Soyad <span class="text-danger"> *</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-normal" placeholder=""
                                        name="name" value="{{ old('name') }}" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">E Posta <span class="text-danger"> *</span></label>
                                <div class="col-sm-10">
                                    <input id="email" type="email"
                                        class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                        value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Telefon  </label>
                                <div class="col-sm-10">
                                    <input id="phone"  type="text" maxlength="10" pattern="[0-9]{3}[0-9]{3}[0-9]{4}"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\.*?)\.*/g, '$1');"
                                        class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone"
                                        value="{{ old('phone') }}" >

                                    @if ($errors->has('phone'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Şifre <span class="text-danger"> *</span></label>
                                <div class="col-sm-10">
                                    <input id="password" type="password" minlength="8"
                                        class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                        name="password" autocomplete="off" required>
                                    <small>
                                        <span class=" text-danger " readonly>Şifre en az 8 karakter olmalıdır</span>
                                    </small>
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Şifre Tekrar <span class="text-danger">
                                        *</span></label>
                                <div class="col-sm-10">
                                    <input id="password-confirm" type="password" class="form-control" minlength="8"
                                        name="password_confirmation" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Rol Seçiniz<span class="text-danger"> *</span></label>
                                <div class="col-sm-10">
                                    <select name="role" class="form-control fill" required>
                                        @foreach ($roles as $role)
                                        <option value="{{ $role->id}}" {{ old("role") == $role->id ? "selected":"" }}>@lang('general.'.$role->name)</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Onay Durumu<span class="text-danger">
                                        *</span></label>
                                <div class="col-sm-10">
                                    <select name="status" class="form-control fill" required>
                                        <option value="1" {{ old('status') == 1 ? "selected":"" }}>Onaylı</option>
                                        <option value="0" {{ old('status') == 0 ? "selected":"" }}>Onaysız</option>

                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Cinsiyet</label>
                                <div class="col-sm-10">
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="gender" id="gender-1"
                                                value="male" > @lang('Erkek')
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="gender" id="gender-2"
                                                value="female" > @lang('Kadın')
                                        </label>
                                    </div>
                                    <span class="messages"></span>
                                </div>
                            </div>

                            

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Profil Fotoğrafı (min:300x300)</label>
                                <div class="col-sm-5">
                                    <input type="file" class="form-control form-control-normal dropify" placeholder=""
                                        name="avatar" accept="">
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


        $('#select_city').on('change', function(e) {
            $("#county option").remove();
            $("#city option").remove();
            // let optionSelected = $("option:selected", this);
            let valueSelected = this.value;
            console.log('Seçilen şehir ' + valueSelected)

            if (!valueSelected) {
                $('#country_select').attr('hidden', true);
            } else {
                $('#country_select').removeAttr('hidden');
            }
            $.ajax({
                url: '{{ route('sehirler') }}',
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    id: valueSelected
                },
                success: function(veri) {
                    console.log(veri)
                    // $("#county").append('<option>--İlçe seçiniz--</option>');
                    $.each(veri, function(key, value) {
                        $('#county').append($('<option>', {
                            value: value,
                            text: value
                        }));
                    });

                }

            })
        });
    </script>
@endsection
