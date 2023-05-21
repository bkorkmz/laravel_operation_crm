@extends('layouts.layout-admin')
@section('title')
 {{ __('Kullanıcı Kayıt Ekranı ') }}
@endsection

@section('content')
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
{{--                <div class="form-group row">--}}
{{--                    <label class="col-sm-2 col-form-label">Kullanıcı adı <span class="text-danger"> *</span></label>--}}
{{--                    <div class="col-sm-10">--}}
{{--                        <input type="text"--}}
{{--                               class="form-control form-control-normal"--}}
{{--                               placeholder="" name="nick_name"--}}
{{--                               value="{{ old('nick_name') }}" required>--}}
{{--                    </div>--}}
{{--                </div>--}}
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
{{--                <div class="form-group row">--}}
{{--                    <label class="col-sm-2 col-form-label">Firma Adı  </label>--}}
{{--                    <div class="col-sm-10">--}}
{{--                        <input id="school_name" type="text" class="form-control" name="school_name" minlength="5" value="{{ old('school_name') }}"    >--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="form-group row">--}}
{{--                    <label class="col-sm-2 col-form-label" for="phone">Telefon Numarası </label>--}}
{{--                    <div class="col-sm-10">--}}
{{--                        <input id="phone" type="text" maxlength="10" placeholder="555-555-5555"--}}
{{--                               pattern="[5][0-9]{2}[0-9]{3}[0-9]{4}"--}}
{{--                               oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\.*?)\.*/g, '$1');"--}}
{{--                               class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"--}}
{{--                               name="phone" value="{{ old('phone') }}" required>--}}

{{--                        @if ($errors->has('phone'))--}}
{{--                            <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $errors->first('phone') }}</strong>--}}
{{--                                    </span>--}}
{{--                        @endif--}}
{{--                    </div>--}}
{{--                </div>--}}
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

{{--                <div class="form-group row">--}}
{{--                    <label class="col-sm-2 col-form-label">Yerleşim Yeri </label>--}}
{{--                    <div class="col-sm-3">--}}
{{--                        <select name="country" class="form-control fill" >--}}
{{--                            <option value="">Ülke Seçiniz</option>--}}
{{--                            <option selected value="Türkiye">Türkiye</option>--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--          --}}
{{--                    <div class="col-sm-3">--}}
{{--                        <select id="select_city"  name="city" class="form-control fill js-example-basic-single select2-hidden-accessible" >--}}
{{--                            <option value="">İl Seçiniz</option>--}}
{{--                             @foreach($citys as $city )--}}
{{--                                <option value="{{$city->id}}"{{ $city->id == old('city') ? 'selected' : '' }}>{{$city->name}}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--                    <div class="col-sm-3" id="country_select" hidden>--}}
{{--                        <select id="county" name="county" class="form-control fill" >--}}
{{--                                   <option value="">--İlçe seçiniz--</option>--}}
{{--                        </select>--}}

{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="form-group row">--}}
{{--                    <label class="col-sm-2 col-form-label"></label>--}}
{{--                    <div class="col-sm-4">--}}
{{--             --}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="form-group row">--}}
{{--                    <label class="col-sm-2 col-form-label">Biyografi</label>--}}
{{--                    <div class="col-sm-10">--}}
{{--                        <textarea rows="5" cols="5" class="form-control" maxlength="255" placeholder="Başvuru yapıldığında ön yazı olarak gönderilecektir. " name="about">@if(old('about')){{old('about')}} @endif</textarea>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="form-group row">--}}
{{--                    <label class="col-sm-2 col-form-label">Facebook</label>--}}
{{--                    <div class="col-sm-10">--}}
{{--                        <input type="text" class="form-control form-control-normal" placeholder="" name="fb" value="{{ old('fb') }}" >--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="form-group row">--}}
{{--                    <label class="col-sm-2 col-form-label">Twitter</label>--}}
{{--                    <div class="col-sm-10">--}}
{{--                        <input type="text" class="form-control form-control-normal" placeholder="" name="tw" value="{{ old('tw') }}" >--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="form-group row">--}}
{{--                    <label class="col-sm-2 col-form-label">Google Plus</label>--}}
{{--                    <div class="col-sm-10">--}}
{{--                        <input type="text" class="form-control form-control-normal" placeholder="" name="gp" value="{{ old('gp') }}" >--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="form-group row">--}}
{{--                    <label class="col-sm-2 col-form-label">İnstagram</label>--}}
{{--                    <div class="col-sm-10">--}}
{{--                        <input type="text" class="form-control form-control-normal" placeholder="" name="in" value="{{ old('in') }}">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="form-group row">--}}
{{--                    <label class="col-sm-2 col-form-label">Youtube</label>--}}
{{--                    <div class="col-sm-10">--}}
{{--                        <input type="text" class="form-control form-control-normal" placeholder="" name="yt" value="{{ old('yt') }}" >--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="form-group row">--}}
{{--                    <label class="col-sm-2 col-form-label">Linkedin</label>--}}
{{--                    <div class="col-sm-10">--}}
{{--                        <input type="text" class="form-control form-control-normal" placeholder="" name="linkedin" value="{{ old('linkedin') }}" >--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="form-group row">--}}
{{--                    <label class="col-sm-2 col-form-label">Web Adres</label>--}}
{{--                    <div class="col-sm-10">--}}
{{--                        <input type="text" class="form-control form-control-normal" placeholder="" name="web_address" value="{{ old('web_address') }}" >--}}
{{--                    </div>--}}
{{--                </div>--}}
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
