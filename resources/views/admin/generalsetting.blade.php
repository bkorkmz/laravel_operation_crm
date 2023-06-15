@extends('layout-admin')
@section('title')
    {{ __('Site Ayarları') }}
@endsection


@section('content')
    <style>
        .panel-logo{
            margin: 0px 0px 17px 53px;
            max-width: 48%;

        }
        .panel-icon{
            margin: 15px 0px 4px 53px;
            max-width: 48%;

        }


    </style>



    <div class="card">
        <div class="card-header">
            <h3>Genel Ayarlar</h3>
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
            <form action="{{ route('generalsetting.update',1) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Site Başlık</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-normal" placeholder="" name="site_title" value="{{ $general->site_title }}" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Site Anahtar Kelime</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-normal" placeholder="" name="site_keywords" value="{{ $general->site_keywords }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Site Açıklama</label>
                    <div class="col-sm-10">
                        <textarea rows="5" cols="5" class="form-control" placeholder="" name="site_description">{{ $general->site_description }}</textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Google News Adı (Sahipse)</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-normal" placeholder="" name="site_newsname" value="{{ $general->site_newsname }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">E Posta</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-normal" placeholder="" name="site_email" value="{{ $general->site_email }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Telefon</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-normal" placeholder="" name="site_phone" value="{{ $general->site_phone }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Adres</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-normal" placeholder="" name="site_address" value="{{ $general->site_address }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Copyright</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-normal" placeholder="" name="site_copyright" value="{{ $general->site_copyright }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Site URL</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-normal" placeholder="" name="site_url" value="{{ $general->site_url }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Facebook APP ID</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-normal" placeholder="" name="site_facebookapp_id" value="{{ $general->site_facebookapp_id }}">
                    </div>
                </div>


                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Google Plus ID</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-normal" placeholder="" name="site_googleplus_id" value="{{ $general->site_googleplus_id }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Facebook URL</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-normal" placeholder="" name="site_facebook_url" value="{{ $general->site_facebook_url }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Twitter URL</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-normal" placeholder="" name="site_twitter_url" value="{{ $general->site_twitter_url }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">İnstagram URL</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-normal" placeholder="" name="site_instagram_url" value="{{ $general->site_instagram_url }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Youtube URL</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-normal" placeholder="" name="site_youtube_url" value="{{ $general->site_youtube_url }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Çerez Politikası Metni</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-normal" placeholder="" name="site_cookie_text" value="{{ $general->site_cookie_text }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Çerez Politikası URL</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-normal" placeholder="" name="site_cookie_url" value="{{ $general->site_cookie_url }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Özel Meta Tag</label>
                    <div class="col-sm-10">
                        <textarea rows="5" cols="5" class="form-control" placeholder="" name="site_meta_tag">{{ $general->site_meta_tag }}</textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Özel Analitik Kod</label>
                    <div class="col-sm-10">
                        <textarea rows="5" cols="5" class="form-control" placeholder="" name="site_analytics">{{ $general->site_analytics }}</textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Sayfa Yenileme Süresi (Saniye )</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control form-control-normal" placeholder="Boş bırakabilirsiniz" name="site_refresh" value="{{ $general->site_refresh }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Logo ( JPG veya PNG tavsiye edilir )</label>
                    <div class="col-sm-3">
                        <input type="file" class="form-control form-control-normal dropify"
                        placeholder="Logo" name="site_logo"
                        data-default-file="{{ $general->site_logo}}"
                        data-height="180"  accept=".jpg,.jpeg,.png,.tiff,.gif,.svg,.webp,.bmp,.ico">
                    </div>
                    {{-- <div class="col-sm-2 float-right">
                       <label for="site_logo"></label>
                         <img class="panel-logo " src="{{ $general->site_logo}}" alt="logo">
                       </div> --}}
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">İcon  ( İco veya PNG tavsiye edilir )</label>
                    <div class="col-sm-3">

                        <input type="file" class="form-control form-control-normal dropify"
                        placeholder="İcon" name="site_icon" title="Site İcon"
                        data-default-file="{{ $general->site_icon}}"
                        data-height="180" accept=".jpg,.ico,.png">
                    </div>
                    {{-- <div class="col-sm-2 float-right">
                        <label for="site_icon"></label>
                        <img class="panel-icon" src="{{ $general->site_icon}}" alt="icon">
                    </div> --}}

                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Site Yayın Durumu</label>
                    <div class="col-sm-2">
                        <select name="site_publish" class="form-control fill">
                            @if($general->site_publish==0)
                                <option value="0" selected>Yayında</option>
                                <option value="1">Yapım Aşamasında</option>
                            @elseif($general->site_publish==1)
                                <option value="0">Yayında</option>
                                <option value="1" selected>Yapım Aşamasında</option>
                            @endif
                        </select>
                    </div>
                </div>

                <div class="text-right m-t-20">
                    <button class="btn btn-primary rounded">Kaydet</button>
                </div>
            </form>
        </div>
    </div>
@endsection
