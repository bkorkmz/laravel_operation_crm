@extends('nest.frontend.layout.layout')
@section('css')

@endsection
@section('title','sepet')

@section('head')

@endsection
@section('breadcrumb')

    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="/" rel="nofollow"><i class="fi-rs-home mr-5"></i>Anasayfa</a>
                <span>Ödeme Başarılı</span>
            </div>
        </div>
    </div>

@endsection

@section('content')
    <div class="page-content pt-50">
        <div class="container">
            <div class="row">
                <div class="col-xl-10 col-lg-12 m-auto">
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="single-page pr-30 mb-lg-0 mb-sm-5">
                                <div class="single-header style-2">
                                    <h2>Ödeme Başarılı</h2>
                                </div>
                                <div class="single-content mb-50">
                                    <div class="alert alert-success">
                                        Ödeme Başarılı. Sipariş onaylandıktan sonra içeriğini görüntülemek için
                                        <a href="{{ route('frontend.myaccount') }}">profilinizi</a>
                                         ziyaret edebilirsiniz.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('js')
@endsection


@section('after-js')

@endsection
