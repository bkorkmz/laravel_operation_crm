@extends('layout-admin')
@section('title')
    {{ __('İlan Düzenle ') }}
@endsection
@section('content')
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="card">
                    <div class="card-header">
                        <h3>İlanı Düzenleme</h3>
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
                        <form action="{{ route('post.update', $post->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">İlan Sayfasına git ==></label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control form-control-normal"
                                        value="{{ route('frontend.post_detail', ['id' => $post->id, 'slug' => $post->slug]) }}"
                                        readonly>
                                </div>
                                <div class="col-sm-1">
                                    <a class="btn btn-success btn-sm"
                                        href="{{ route('frontend.post_detail', ['id' => $post->id, 'slug' => $post->slug]) }}"
                                        target="_blank">Tıkla Git</a>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">İlan başlığı<span class="text-danger">
                                        *</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-normal" placeholder=""
                                        name="title" value="{{ $post->title }}" maxlength="500" minlength="5" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Okul - İşyeri Adı<span class="text-danger">
                                        *</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-normal" placeholder=""
                                        name="school_name" value="{{ $post->school_name }}" minlength="5" maxlength="500"
                                        required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">İlan Açıklaması<span class="text-danger">
                                        *</span></label>
                                <div class="col-sm-10">
                                    <textarea id="ckeditor" name="detail" minlength="5" required>{{ $post->detail }}</textarea>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Anahtar kelimeler</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-normal" placeholder=""
                                        maxlength="255" name="keywords" value="{{ $post->keywords }}">
                                </div>

                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Başvuru Adresi </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-normal" placeholder=""
                                        maxlength="255" minlength="5" name="address" value="{{ $post->address }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Meslek Kategorisi<span class="text-danger">
                                        *</span></label>
                                <div class="col-sm-3">
                                    <select name="category_id" class="form-control fill" required>
                                        <option value="">--Bir seçim aypınız--</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ $category->id == $post->category_id ? 'selected' : '' }}>
                                                {{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-sm-3">
                                    <select id="select_city" name="city" class="form-control fill" required>
                                        <option value="">İl Seçiniz</option>
                                        @foreach ($cityes as $city)
                                            <option
                                                value="{{ $city['id'] }}"{{ $city['id'] == $post->city ? 'selected' : '' }}>
                                                {{ $city['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-3" id="country_select">
                                    <select id="county" name="county" class="form-control fill">
                                        <option value="{{ $post->county }}">{{ $post->county }}</option>
                                    </select>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Staj Başlangıç -- Bitiş Tarihi </label>
                                <div class="col-sm-3">
                                    <input type="date" name="staj_start" class="form-control "
                                        value="{{ $post->staj_start }}">
                                </div>

                                <div class="col-sm-3">
                                    <input type="date" name="staj_finish" class="form-control "
                                        value="{{ $post->staj_finish }}">
                                </div>
                            </div>


                            <div class="form-group row clearfix">
                                <label class="col-sm-2 col-form-label">Durum<span class="text-danger"> *</span></label>
                                <div class="col-sm-2">
                                    <select name="publish" class="form-control fill" required>
                                        <option value="0" {{ $post->publish == 0 ? 'selected' : '' }}>Onaya Gönder
                                        </option>
                                        <option value="1" {{ $post->publish == 1 ? 'selected' : '' }}>Taslak</option>
                                        <option value="2" {{ $post->publish == 2 ? 'selected' : '' }}>Yayında</option>
                                        <option value="3" {{ $post->publish == 3 ? 'selected' : '' }}>Süresi Doldu
                                        </option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <select name="ilan_turu" class="form-control fill" required>
                                        <option value="">--İlan türü--</option>
                                        <option value="0" {{ $post->ilan_turu == 0 ? 'selected' : '' }}>İş yeri
                                        </option>
                                        <option value="1" {{ $post->ilan_turu == 1 ? 'selected' : '' }}>Staj</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <select name="staj_donem" class="form-control fill" required>
                                        <option value="">--Staj Dönemi--</option>
                                        <option value="1" {{ $post->staj_donem == 1 ? 'selected' : '' }}>Yaz Dönemi
                                            (Haziran-Temmuz-Ağustos)</option>
                                        <option value="2" {{ $post->staj_donem == 2 ? 'selected' : '' }}>Kış Dönemi
                                            (Aralık-Ocak-Şubat)</option>
                                        <option value="3" {{ $post->staj_donem == 3 ? 'selected' : '' }}>Diğer
                                        </option>
                                    </select>
                                </div>

                            </div>
                            <hr>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Mevcut resim</label>
                                <div class="col-sm-10">
                                    <img src="{{ $post->image }}" width="200">
                                </div>
                            </div>

                            <div id="out"></div>

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
    @include('admin.post.fm')
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
                url: '{{ route('ilceler') }}',
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
