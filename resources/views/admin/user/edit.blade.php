@extends('layouts.layout-admin')
@section('title')
    {{ __('Kullanıcı Düzenleme Sayfası ') }}
@endsection
@section('content')


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
{{--            {{dd($user)}}--}}
            <form action="{{ route('user.update', $user->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Ad Soyad<span class="text-danger"> *</span></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-normal" placeholder="" minlength="5" maxlength="80" name="name" value="{{ $user->name }}" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">E Posta</label>
                    <div class="col-sm-10">
                        <input id="email" readonly type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" maxlength="80" autocomplete="off"  value="{{ $user->email }}"  >

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
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
                            <option value="0" @if($user->status==0) selected @endif >Müşteri</option>
                            <option value="1" @if($user->status==1) selected @endif >Admin</option>
                            <option value="2" @if($user->status==2) selected @endif >Firma</option>
                            <option value="3" @if($user->status==3) selected @endif >Editör</option>{{--                            <option value="3" @if($user->status==3) selected @endif >İçerik Editörü</option>--}}
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Yerleşim Yeri </label>
                    <div class="col-sm-3">
                        <select name="country" class="form-control fill" required >
                            <option value="" >Ülke Seçiniz</option>
                            <option value="Türkiye" {{ $user->country =='Türkiye' ? 'selected' : '' }}>Türkiye</option>
                         
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <select id="select_city"  name="city" class="form-control fill"  required>
                            <option value="">İl Seçiniz</option>
                            @foreach($citys as $city )
                                <option value="{{$city->id}}"{{ $city->id == $user->city ? 'selected' : '' }}>{{$city->name}}</option>
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
                        <label class="col-sm-2 col-form-label">Cinsiyet</label>
                        <div class="col-sm-10">
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input"  {{$user->gender=="male" ? 'checked' : ""}} type="radio" name="gender" id="gender-1" value="male" required> @lang('Erkek')
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input"  {{$user->gender=="female" ? 'checked' : ""}} type="radio" name="gender" id="gender-2" value="female" required> @lang('Kadın')
                                </label>
                            </div>
                            <span class="messages"></span>
                        </div>
                    </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Biyografi</label>
                    <div class="col-sm-10">
                        <textarea rows="5" cols="5" class="form-control" placeholder="Staj başvurusu yapıldığında İş Yerine gösterilmektedir.  " 
                                  name="about" >{{ $user->about }}</textarea>
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
                        <img src="{{asset($user->avatar)}}" alt="" style="width: 200px;">
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
