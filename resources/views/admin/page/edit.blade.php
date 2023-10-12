@extends('layouts.layout-admin')
@section('title')
    {{ __('Sayfa Düzenle ') }}
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Sayfa Düzenle</h3>
        </div>
        <div class="card-block">
{{--            @if ($errors->any())--}}
{{--                <div class="alert alert-danger">--}}
{{--                    <ul>--}}
{{--                        @foreach ($errors->all() as $error)--}}
{{--                            <li>{{ $error }}</li>--}}
{{--                        @endforeach--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            @endif--}}
            <form action="{{ route('page.update', $page->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Sayfa</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control form-control-normal" value="{{ route('frontend.page', ['id' => $page->id, 'slug' => $page->slug]) }}" readonly>
                    </div>
                    <div class="col-sm-1" >
                        <a class="btn btn-success btn-sm"  href="{{ route('frontend.page', ['id' => $page->id, 'slug' => $page->slug]) }}" target="_blank">Tıkla Git</a>
                    </div>
                    <div class="col-sm-2">

                        <a href="{{ route('page.create') }}" type="button" class="btn btn-primary btn-sm  rounded ml-1 mr-1 " ><i class="fa fa-plus"></i>Yeni ekle</a>
                        <a href="" onclick="window.history.back()" type="button" class="btn btn-warning btn-sm  rounded"><i class="fa fa-reply"></i></a>

                    </div>

                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Sayfa başlığı</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-normal" placeholder="" name="title" value="{{ $page->title }}" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Sayfa içeriği</label>
                    <div class="col-sm-10">
                        <textarea id="ckeditor" name="detail" required>{{ $page->detail }}</textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Fotoğraf</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control form-control-normal" placeholder="" name="image" accept=".png,.jpg,.jpeg,.gif">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Mevcut Fotoğraf</label>
                    <div class="col-sm-10">
                        <img src="{{ $page->image }}" width="200"  alt="page image">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">PDF Dosyası</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control form-control-normal" placeholder="" name="pdf" accept="application/pdf">
                    </div>
                </div>


                @if($page->pdf!=NULL)
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Mevcut PDF</label>
                        <div class="col-sm-10">
                            <a href="{{ $page->pdf }}" download>PDF indir</a>
                        </div>
                    </div>
                @endif




                <div class="form-group row clearfix">
                    <label class="col-sm-2 col-form-label">Sayfa Türü</label>
                    <div class="col-sm-2">
                        <select name="page_type" class="form-control fill">
                            <option value="1" @if($page->page_type==1) selected @endif>Kurumsal</option>
                            <option value="2" @if($page->page_type==2) selected @endif>Hizmet</option>
                            <option value="3" @if($page->page_type==3) selected @endif>Referans</option>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <select name="publish" class="form-control fill">
                            @if($page->publish==0)
                                <option value="0" selected>Yayında</option>
                                <option value="1">Taslak</option>
                            @elseif($page->publish==1)
                                <option value="0">Yayında</option>
                                <option value="1" selected>Taslak</option>
                            @endif
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <select name="parentpage" class="form-control fill">
                            <option value="0">Bağlı sayfası</option>
                            @foreach($pages as $item)
                                <option value="{{ $item->id }}" @if($item->id==$page->parentpage) selected @endif >{{ $item->title }}</option>
                            @endforeach
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


@section('css')
@endsection

@section('js')
    <script src="//cdn.ckeditor.com/4.10.1/full/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'ckeditor');
    </script>
@endsection
