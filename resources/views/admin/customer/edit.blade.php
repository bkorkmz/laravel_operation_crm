@extends('layout-admin')
@section('title')
    {{ __('Kullanıcı Düzenleme Sayfası ') }}
@endsection
@section('content')

    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="card">
                        <div class="card-header">
                            <h3>Kullanıcı Düzenle</h3>
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
                            <form action="{{ route('user.update', $user->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @include('flash::message')
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Ad Soyad<span class="text-danger"> *</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control form-control-normal" placeholder="" minlength="5" maxlength="80" name="name" value="{{ $user->name }}" required>
                                    </div>
                                </div> <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Kullanıcı adı <span class="text-danger"> *</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control form-control-normal" placeholder="" minlength="5" maxlength="80" name="nick_name" value="{{ $user->nick_name }}" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">E Posta<span class="text-danger"> *</span></label>
                                    <div class="col-sm-10">
                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" maxlength="80" autocomplete="off"  value="{{ $user->email }}" required >

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Okul - İşyeri  Adı</label>
                                    <div class="col-sm-10">
                                        <input id="school_name" type="text" class="form-control" name="school_name" placeholder="Okulun / İş yerinin  adını yazınız" value="{{$user->school_name}}" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Telefon Numarası </label>
                                    <div class="col-sm-10">
                                        <input id="phone" type="text" maxlength="10"
                                               pattern="[0-9]{3}[0-9]{3}[0-9]{4}"
                                               oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\.*?)\.*/g, '$1');" class
                                               ="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"
                                               name="phone"
                                               value="{{ $user->phone }}" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Şifre<span class="text-danger"></span></label>
                                    <div class="col-sm-10">
                                        <input id="password"
                                               type="password"
                                               minlength="8"
                                               class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                               autocomplete="off" name="password">

                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Şifre Tekrar</label>
                                    <div class="col-sm-10">
                                        <input id="password-confirm"
                                               type="password"
                                               minlength="8"
                                               class="form-control"
                                               name="password_confirmation"
                                               autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Yetkisi</label>
                                    <div class="col-sm-10">
                                        <select name="status" class="form-control fill">
                                            <option value="0" @if($user->status==0) selected @endif >Stajer </option>
                                            <option value="1" @if($user->status==1) selected @endif >Admin</option>
                                            <option value="2" @if($user->status==2) selected @endif >Firma Yetkilisi</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Yerleşim Yeri </label>
                                    <div class="col-sm-3">
                                        <select name="country" class="form-control fill" >
                                            <option value="" >Ülke Seçiniz</option>
                                            <option value="Türkiye" {{ $user->country =='Türkiye' ? 'selected' : '' }}>Türkiye</option>
                                            <option value="Azerbaycan" {{ $user->country =='Azerbaycan' ? 'selected' : '' }}>Azerbaycan</option>
                                            <option value="KKTC" {{ $user->country == 'KKTC' ? 'selected' : '' }}>KKTC</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <select id="select_city"  name="city" class="form-control fill" >
                                            <option value="">İl Seçiniz</option>
                                            @foreach($citys as $city )
                                                <option value="{{$city['id']}}"{{ $city['id'] == $user->city ? 'selected' : '' }}>{{$city['name']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-3" id="country_select" >
                                        <select id="county" name="county" class="form-control fill" >
                                            <option value="{{$user->county}}">{{$user->county}}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Öğrenim Bilgileri</label>
                                    <div class="col-sm-5">
                                        <select name="birim" class="form-control fill" >
                                            <option value="">Öğrenim Tipi Seçiniz</option>
                                            <option value="Lise" {{  $user->birim =='Lise' ? 'selected' : '' }}>Lise</option>
                                            <option value="Üniversite" {{  $user->birim =='Üniversite' ? 'selected' : '' }}>Üniversite</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-5">
                                        <select name="bolum" class="form-control fill" >
                                            <option value="">Meslek Seçiniz</option>
                                            @foreach($categorys as $category)
                                                <option value="{{ $category->id }}"  {{ $category->id == $user->bolum ? 'selected' : '' }} >{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Cinsiyet</label>
                                    <div class="col-sm-4">
                                        <select name="gender" class="form-control fill" >
                                            <option value="">Seçim Yapınız</option>
                                            <option value="Male" {{  $user->gender =='Male' ? 'selected' : '' }}>Erkek</option>
                                            <option value="Female" {{  $user->gender == 'Female' ? 'selected' : '' }}>Kadın</option>
                                        </select>
                                    </div>

                                    <label class="col-sm-2 col-form-label mr-0">Doğum Günü</label>
                                    <div class="col-sm-4">
                                        <input type="date" name="birthday" class="form-control" value="{{$user->birthday}}" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Biyografi</label>
                                    <div class="col-sm-10">
                                        <textarea data-maxlength="250" rows="5" cols="5" class="form-controlwith-maxlength with-maxlength" placeholder="Staj başvurusu yapıldığında İş Yerine gösterilmektedir.  " name="about" >{{ $user->about }}</textarea>

                                        <div class="char-count-style">
                                            <span class="char-count">0</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Facebook</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control form-control-normal" placeholder="" name="fb" value="{{ $user->fb }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Twitter</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control form-control-normal" placeholder="" name="tw" value="{{ $user->tw }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Google Plus</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control form-control-normal" placeholder="" name="gp" value="{{ $user->gp }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">İnstagram</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control form-control-normal" placeholder="" name="in" value="{{ $user->in }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Youtube</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control form-control-normal" placeholder="" name="yt" value="{{ $user->yt }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Linkedin</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control form-control-normal" placeholder="" name="linkedin" value="{{ $user->linkedin }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Web Adres</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control form-control-normal" placeholder="" name="web_address" value="{{$user->web_address}}" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Profil Fotoğrafı</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control form-control-normal" placeholder="" name="avatar">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Mevcut Fotoğrafı</label>
                                    <div class="col-sm-10">
                                        <img src="{{ $user->avatar }}" alt="" style="width: 200px;">
                                    </div>
                                </div>
                                @if($user->status == 2)
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="form-label">Usta Öğretici Belgeniz Var mı ?</label>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="document" id="document1" value="1"  {{$user->document == 1 ? 'checked' : '' }} >
                                                    <label class="form-check-label" for="document1">
                                                        Belgem var
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="document" id="document2" value="0" {{$user->document == 0 ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="document2">
                                                        Belgem yok
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <div class="text-right m-t-20">
                                    <button class="btn btn-primary rounded">Güncelle</button>
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
                url:'{{ route("ilceler") }}',
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
