@extends('layout-admin')
@section('title')
    {{ __('Firma Düzenleme Sayfası ') }}
@endsection
@section('content')
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="card">
        <div class="card-header">
            <h3>Firma Düzenle</h3>
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
            <form action="{{ route('company.update',$user->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @include('flash::message')
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Ad Soyad<span class="text-danger"> *</span></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-normal" placeholder="" minlength="5" maxlength="80" name="name" value="{{ $user->name }}" required>
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
                        <input id="company" type="text" class="form-control" name="company" placeholder="Okulun / İş yerinin  adını yazınız" value="{{$user->school_name}}" >
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

                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Meslek  Bilgileri</label>

                    <div class="col-sm-5">
                        <select name="category" class="form-control fill" >
                            <option value="">Meslek Seçiniz</option>
                            @foreach($categorys as $category)
                                <option value="{{ $category->id }}"  {{ $category->id == $user->category ? 'selected' : '' }} >{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

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
                <div class="text-right m-t-20">
                    <button class="btn btn-primary rounded">Kaydet</button>
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
