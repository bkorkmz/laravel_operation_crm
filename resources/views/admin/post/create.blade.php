@extends('layout-admin')
@section('title')
    {{ __('İlan Ekle ') }}
@endsection

@section('content')
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="card">
                    <div class="card-header">
                        <h3>İlan Ekle</h3>
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
                        <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">İlan Başlığı<span class="text-danger">
                                        *</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-normal" placeholder=""
                                        name="title" maxlength="500" minlength="5" required>
                                </div>
                            </div>




                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Okul - İşyeri Adı<span class="text-danger">
                                        *</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-normal" placeholder=""
                                        name="school_name" maxlength="500" minlength="5">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">ilan Açıklaması<span class="text-danger">
                                        *</span></label>
                                <div class="col-sm-10">
                                    <textarea id="ckeditor" name="detail" minlength="5" required></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Anahtar Kelimeler</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-normal" maxlength="255"
                                        placeholder="" name="keywords">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Başvuru Adresi </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-normal" placeholder=""
                                        maxlength="255" minlength="5" name="address">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Meslek Kategorisi<span class="text-danger">
                                        *</span></label>
                                <div class="col-sm-5">
                                    <select id="category" name="category_id" class="form-control fill " required>
                                        <option value="">--Bir seçim yapınız--</option>

                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>


                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Yerleşke <span class="text-danger"> *</span></label>
                                <div class="col-sm-5">
                                    <select id="select_city" name="city" class="form-control fill" required>
                                        <option value="">İl Seçiniz</option>
                                        @foreach ($cityes as $city)
                                            <option
                                                value="{{ $city['id'] }}"{{ $city['id'] == old('city') ? 'selected' : '' }}>
                                                {{ $city['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-5" id="country_select" hidden>
                                    <select id="county" name="county" class="form-control fill" required>
                                        <option value="">--İlçe seçiniz--</option>
                                    </select>

                                </div>

                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Staj Başlangıç - Bitiş Tarihi </label>
                                <div class="col-sm-3">
                                    <input type="date" name="staj_start" class="form-control " value="">
                                </div>

                                <div class="col-sm-3">
                                    <input type="date" name="staj_finish" class="form-control " value="">
                                </div>
                            </div>
                            <div class="form-group row clearfix">
                                <label class="col-sm-2 col-form-label">Durum<span class="text-danger"> *</span></label>
                                <div class="col-sm-2">
                                    <select name="publish" class="form-control fill">
                                        <option value="0">Yayınla</option>
                                        <option value="1">Taslak</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <select name="ilan_turu" class="form-control fill" required>
                                        <option value="">--İlan türü--</option>
                                        <option value="0">İş yeri</option>
                                        <option value="1">Staj</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <select name="staj_donem" class="form-control fill" required>
                                        <option value="">--Staj Dönemi--</option>
                                        <option value="1">Yaz Dönemi (Haziran-Temmuz-Ağustos)</option>
                                        <option value="2">Kış Dönemi (Aralık-Ocak-Şubat)<< /option>
                                        <option value="3">Diğer</option>
                                    </select>
                                </div>


                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">İlan Fotoğrafı</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control form-control-normal" placeholder=""
                                        name="image">
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
    <script src="//cdn.ckeditor.com/4.10.1/full/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('ckeditor');
    </script>
    <script type="text/javascript" src="{{ asset('admin/assets/js/jquery.marcopolo.min.js') }}"></script>
    {{--    @include('admin.post.fm') --}}
    <script>
        $('#select_city').on('change', function(e) {
            $("#county option").remove();
            $("#city option").remove();
            // let optionSelected = $("option:selected", this);
            let valueSelected = this.value;
            // console.log('Seçilen şehir '+valueSelected)

            if (!valueSelected) {
                $('#country_select').attr('hidden', true);
            } else {
                $('#country_select').removeAttr('hidden');
            }
            $.ajax({
                url: '{{ route('ilceler') }}',
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    id: valueSelected
                },
                success: function(veri) {
                    // console.log(veri)
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



        {{-- $('#category').on('change', function (e) { --}}
        {{--    $("#sub_category option").remove(); --}}
        {{--    // $("#category option").remove(); --}}
        {{--    // let optionSelected = $("option:selected", this); --}}
        {{--    let valueSelected = this.value; --}}
        {{--    console.log('Seçilen Kategori '+valueSelected) --}}

        {{--    if(!valueSelected){ --}}
        {{--        $('#sub_category_select').attr('hidden',true); --}}
        {{--    } --}}
        {{--    else{ --}}
        {{--        $('#sub_category_select').removeAttr('hidden'); --}}
        {{--    } --}}
        {{--    $.ajax({ --}}
        {{--        url:'{{ route("category_get") }}', --}}
        {{--        type:'POST', --}}
        {{--        data:{ --}}
        {{--            "_token": "{{ csrf_token() }}", --}}
        {{--            id:valueSelected --}}
        {{--        }, --}}
        {{--        success: function(veri) { --}}
        {{--            console.log(veri) --}}
        {{--            $.each( veri, function(key, value) { --}}
        {{--                $('#sub_category').append($('<option>', {value:key, text:value})); --}}
        {{--            }); --}}

        {{--        } --}}

        {{--    }) --}}



        {{-- }); --}}
    </script>
@endsection
