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
                <span>Sepetim</span>
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
                                    <h2>Sepetim</h2>
                                </div>
                                <div class="single-content mb-50">
                                    @if(count($cart_content)>0)
                                        @foreach($cart_content as $cart_item)
                                            rowid = {{ $cart_item->rowId }} <br>
                                            id = {{ $cart_item->id }} <br>
                                            qty = {{ $cart_item->qty }} <br>
                                            qty = {{ $cart_item->qty }} <br>
                                            name = {{ $cart_item->name }} <br>
                                            price = {{ $cart_item->price }} <br>
                                            options = {{ $cart_item->options }} <br><br>
                                            <a href="{{ route('frontend.cart_remove',['rowId'=>$cart_item->rowId]) }}">SİL</a>
                                        @endforeach
                                            <hr>
                                            <a href="{{ route('frontend.cart_destroy') }}">SEPETİ BOŞALT</a>
                                            <hr>
                                       Vergi: {{ Cart::tax() }} <br>
                                       Toplam: {{ Cart::total() }}
                                    @else
                                        Sepet boş
                                    @endif
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
