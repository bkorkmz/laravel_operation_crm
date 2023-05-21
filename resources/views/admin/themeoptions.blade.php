@extends('layout-admin')
@section('title')
    {{ __('Tema Ayarları') }}
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Tema Ayarları</h3>
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
            <form action="{{ route('themeoptionsupdate', $themeoptions->id) }}" method="post">
                @csrf
{{--                <div class="form-group row">--}}
{{--                    <div class="col-sm-3">--}}
{{--                        <input type="color" id="menu_bg" name="menu_bg" value="{{ $themeoptions->menu_bg }}">--}}
{{--                        <label for="menu_bg">Menü Arkaplan Rengi</label>--}}
{{--                    </div>--}}
{{--                    <div class="col-sm-3">--}}
{{--                        <input type="color" id="menu_color" name="menu_color" value="{{ $themeoptions->menu_color }}">--}}
{{--                        <label for="menu_color">Menü Yazı Rengi</label>--}}
{{--                    </div>--}}
{{--                    <div class="col-sm-3">--}}
{{--                        <input type="color" id="footer_bg" name="footer_bg" value="{{ $themeoptions->footer_bg }}">--}}
{{--                        <label for="footer_bg">Footer Arkaplan Rengi</label>--}}
{{--                    </div>--}}
{{--                    <div class="col-sm-3">--}}
{{--                        <input type="color" id="footer_color" name="footer_color" value="{{ $themeoptions->footer_color }}">--}}
{{--                        <label for="footer_color">Footer Yazı Rengi</label>--}}
{{--                    </div>--}}
{{--                </div>--}}


{{--                <div class="form-group row">--}}
{{--                    <div class="card-header w-100" style="margin-bottom: 20px;">--}}
{{--                        <h3>Font Ayarları</h3>--}}
{{--                    </div>--}}
{{--                    <label for="body_font" class="col-md-2">Body Font Tipi</label>--}}
{{--                    <div class="col-sm-3">--}}
{{--                        <select name="body_font" id="body_font" class="form-control">--}}
{{--                            <option value="Roboto" {{ $themeoptions->body_font=="Roboto" ? "selected" : "" }} >Roboto</option>--}}
{{--                            <option value="Raleway" {{ $themeoptions->body_font=="Raleway" ? "selected" : "" }} >Raleway</option>--}}
{{--                            <option value="Open+Sans" {{ $themeoptions->body_font=="Open+Sans" ? "selected" : "" }} >Open+Sans</option>--}}
{{--                            <option value="Bodoni+Moda" {{ $themeoptions->body_font=="Bodoni+Moda" ? "selected" : "" }} >Bodoni+Moda</option>--}}
{{--                            <option value="Noto+Sans+JP" {{ $themeoptions->body_font=="Noto+Sans+JP" ? "selected" : "" }} >Noto+Sans+JP</option>--}}
{{--                            <option value="Lato" {{ $themeoptions->body_font=="Lato" ? "selected" : "" }}>Lato</option>--}}
{{--                            <option value="Montserrat" {{ $themeoptions->body_font=="Montserrat" ? "selected" : "" }}>Montserrat</option>--}}
{{--                            <option value="Oswald" {{ $themeoptions->body_font=="Oswald" ? "selected" : "" }}>Oswald</option>--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--                </div>--}}

            <div class="form-group row">
{{--                    <div class="card-header w-100" style="margin-bottom: 20px;">--}}
{{--                        <h3>Tema Ayarları</h3>--}}
{{--                    </div>--}}
                    <label for="body_font" class="col-md-2">Tema stil</label>
                    <div class="col-sm-3">
                        <select name="body_style" id="body_style" class="form-control">
                            <option value="color1" {{ $themeoptions->body_style=="color1" ? "selected" : "" }} >Tema 1</option>
                            <option value="color2" {{ $themeoptions->body_style=="color2" ? "selected" : "" }} >Tema 2</option>
                            <option value="color3" {{ $themeoptions->body_style=="color3" ? "selected" : "" }} >Tema 3</option>
                            <option value="color4" {{ $themeoptions->body_style=="color4" ? "selected" : "" }} >Tema 4</option>
                            <option value="color5" {{ $themeoptions->body_style=="color5" ? "selected" : "" }} >Tema 5</option>
                            <option value="color6" {{ $themeoptions->body_style=="color6" ? "selected" : "" }} >Tema 6</option>
                            <option value="color7" {{ $themeoptions->body_style=="color7" ? "selected" : "" }} >Tema 7</option>
                            <option value="color8" {{ $themeoptions->body_style=="color8" ? "selected" : "" }} >Tema 8</option>
                            <option value="color9" {{ $themeoptions->body_style=="color9" ? "selected" : "" }} >Tema 9</option>
                            <option value="color10" {{ $themeoptions->body_style=="color10" ? "selected" : "" }} >Tema 10</option>
                            <option value="color11" {{ $themeoptions->body_style=="color11" ? "selected" : "" }} >Tema 11</option>
                            <option value="color12" {{ $themeoptions->body_style=="color12" ? "selected" : "" }} >Tema 12</option>

                        </select>
                    </div>
                </div>

                <div class="text-right m-t-20">
                    <button class="btn btn-primary rounded">Kaydet</button>
                </div>
            </form>




                @php
                    $link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']
          === 'on' ? "https" : "http") . "://" .
          $_SERVER['HTTP_HOST'] /*. $_SERVER['PHP_SELF']*/;
                    @endphp
                <div class="card-header w-100   ">
                    <h3>Site Görünümü</h3>
                    <iframe name="frame_adi" src="{{$link}}" scrolling="no" width="100%" height="500" style="cursor: none;pointer-events: none; "></iframe>
                </div>
        </div>






    </div>
@endsection
