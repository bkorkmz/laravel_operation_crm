@extends('layouts.layout-admin')
@section('title')
    {{ __('Kullanıcı Düzenleme Sayfası ') }}
@endsection
@section('content')

<div class="pcoded-inner-content">
    <div class="main-body">
        <div class="page-wrapper">
            <div class="card">
                <div class="card-header">
                    <h3>Kullanıcı Düzenle</h3>
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
                    <form action="{{ route('user.update', $user->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Ad Soyad<span class="text-danger"> *</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control form-control-normal" placeholder="" minlength="5" maxlength="80" name="name" value="{{ $user->name }}" required>
                            </div>
                        </div>
        
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">E Posta <span class="text-danger"> *</span></label>
                            <div class="col-sm-10">
                                <input id="email"  type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" 
                                name="email" maxlength="80" autocomplete="off"  value="{{ $user->email }}"  >
        
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
                                       value="{{ $user->phone }}" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Şifre</label>
                            <div class="col-sm-10">
                                <input id="password" 
                                       type="password"
                                       minlength="8"
                                       class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                       autocomplete="off" name="password">
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
                        {{-- @dd(blank($userrole))   --}}
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Rol Seçiniz<span class="text-danger"> *</span></label>
                            <div class="col-sm-10">
                                <select name="role" class="form-control fill" required>
                                    @foreach ($roles as $role)
                                    <option value="{{ $role->id}}" {{  (!blank($userrole) ? $userrole[0]->id  == $role->id : "") ? "selected" : ""}}>@lang('general.'.$role->name)</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row my-4">
                            <label class="col-sm-2 col-form-label">Durum
                               </label>
                            <div class="col-sm-3 row align-self-center" >
                                
                                <div class="form-check m-2">
                                    <input class="form-check-input" checked type="radio" name="status"
                                        id="active" value="1"
                                        {{ $user->status == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="active">Aktif</label>
                                </div>
                                <div class="form-check m-2">
                                   
                                    <input class="form-check-input"  type="radio" name="status"
                                        id="passive" value="0"
                                        {{$user->status == 0 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="passive">Pasif </label>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="form-group row">
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
                        </div> --}}
        
                       
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Cinsiyet</label>
                                <div class="col-sm-10">
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input"  {{$user->gender=="male" ? 'checked' : ""}} type="radio" name="gender" id="gender-1" value="male" > @lang('Erkek')
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input"  {{$user->gender=="female" ? 'checked' : ""}} type="radio" name="gender" id="gender-2" value="female" > @lang('Kadın')
                                        </label>
                                    </div>
                                    <span class="messages"></span>
                                </div>
                            </div>
                        {{-- <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Biyografi</label>
                            <div class="col-sm-10">
                                <textarea rows="5" cols="5" class="form-control" placeholder="Staj başvurusu yapıldığında İş Yerine gösterilmektedir.  " 
                                          name="about" >{{ $user->about }}</textarea>
                            </div>
                        </div> --}}
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Profil Fotoğrafı (min:300x300)</label>
                            <div class="col-sm-5">
                                <input type="file" class="form-control form-control-normal dropify" placeholder="" 
                                data-show-remove="false"
                                data-default-file="{{ $user->avatar }}"
                                name="avatar">
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
