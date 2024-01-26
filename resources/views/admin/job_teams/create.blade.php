@extends('layouts.layout-admin')
@section('title')
    {{ __('Takım Kayıt Sayfası ') }}
@endsection

@section('content')


    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="card">
                    <div class="card-header">
                        <h3>Takım Ekle</h3>
                        <a type="button" class="btn btn-grd-warning btn-sm float-right rounded mr-1  "
                        href="{{route('user.teams.index')}}"><i class="fa fa-reply"></i>Geri Dön</a>
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
                        <form action="{{ route('user.teams.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Görev Tanımı  <span class="text-danger"> *</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-normal" placeholder="Görev Tanımı Yazpınız"
                                        name="job" value="{{ old('job') }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Adı - Soyadı   <span class="text-danger"> *</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-normal" placeholder="Ad-Soyad Giriniz"
                                        name="name" value="{{ old('name ') }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Profil Resmi (min:300x300)</label>
                                <div class="col-sm-5">
                                    <input type="file" class="form-control form-control-normal dropify" placeholder=""
                                        name="avatar" accept=".png,.jpg,.jpeg,.gif,.webp,.bmp" >
                                </div>
                            </div>
    
    


                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Facebook</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-normal" placeholder="" name="fb" value="{{ old('fb') }}" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Twitter</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-normal" placeholder="" name="tw" value="{{ old('tw') }}" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Google Plus</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-normal" placeholder="" name="gp" value="{{ old('gp') }}" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">İnstagram</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-normal" placeholder="" name="in" value="{{ old('in') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Youtube</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-normal" placeholder="" name="yt" value="{{ old('yt') }}" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Linkedin</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-normal" placeholder="" name="linkedin" value="{{ old('linkedin') }}" >
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
{{-- <script type="text/javascript" src="{{asset('admin/bower_components/jquery/js/jquery.min.js')}}"></script> --}}
<script type="text/javascript" src="{{asset('admin/assets/pages/advance-elements/select2-custom.js')}}"></script>
{{-- <script type="text/javascript" src="{{asset('admin/bower_components/select2/js/select2.full.min.js')}}"></script> --}}
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
