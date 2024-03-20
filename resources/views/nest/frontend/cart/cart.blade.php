@extends('nest.frontend.layout.layout')
@section('css')

@endsection
@section('title','Sepet')

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


    <div class="container mb-80 mt-50">
        @if(count($cart_content)>0)
            <div class="row">
                <div class="col-lg-8 mb-40">
                    <h1 class="heading-2 mb-10">Sepet</h1>
                    <div class="d-flex justify-content-between">
                        <h6 class="text-body">Sepetinizde <span class="text-brand">{{$cart_content_count}}</span> adet ürün vardır.</h6>
                        <h6 class="text-body"><a href="{{ route('frontend.cart_destroy') }}" class="text-muted"><i class="fi-rs-trash mr-5"></i>SEPETİ BOŞALT</a></h6>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="table-responsive shopping-summery">
                        <table class="table table-wishlist">
                            <thead>
                            <tr class="main-heading">
                                <th scope="col" colspan="2">ÜRÜN</th>
                                <th scope="col">FİYAT</th>
                                <th scope="col">ADET</th>
                                <th scope="col">ARA TOPLAM</th>
                                <th scope="col" class="end">KALDIR</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cart_content as $cart_item)
                                <tr class="pt-30">
                                    <td class="image product-thumbnail pt-40"><img src="{{ json_decode($cart_item->options)->photo }}" alt="#"></td>
                                    <td class="product-des product-name">
                                        <h6 class="mb-5">{{ $cart_item->name }}</h6>
                                    </td>
                                    <td class="price" data-title="Price">
                                        <h4 class="text-body"> {{ $cart_item->price }} TL</h4>
                                    </td>
                                    <td class="text-center detail-info" data-title="Stock">
                                        <div class="detail-extralink mr-15">
                                            <div class="detail-qty border radius">
                                                <a href="#" class="qty-down qtyDown" data-rowid="{{$cart_item->rowId}}"><i class="fi-rs-angle-small-down"></i></a>
                                                <input type="text" name="qty_{{$cart_item->rowId}}" class="qty-val" value="{{ $cart_item->qty }}" min="1">
                                                <a href="#" class="qty-up qtyUp" data-rowid="{{$cart_item->rowId}}"><i class="fi-rs-angle-small-up"></i></a>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="price" data-title="Price">
                                        <h4 class="text-brand">{{ $cart_item->qty * $cart_item->price }} TL</h4>
                                    </td>
                                    <td class="action text-center" data-title="Remove">
                                        <a href="{{ route('frontend.cart_remove',['rowId'=>$cart_item->rowId]) }}" class="text-body"><i class="fi-rs-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="divider-2 mb-30"></div>
                    <div class="cart-action d-flex justify-content-between">
                        <a class="btn" href="{{ route('frontend.index') }}"><i class="fi-rs-arrow-left mr-10"></i>Alışverişe Devam Et</a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="border p-md-4 cart-totals ml-30">
                        <div class="table-responsive">
                            <table class="table no-border">
                                <tbody>
                                <tr>
                                    <td class="cart_total_label">
                                        <h6 class="text-muted">Genel Ara Toplam</h6>
                                    </td>
                                    <td class="cart_total_amount">
                                        <h4 class="text-brand text-end">{{ Cart::total() /*- Cart::tax()*/ }} TL</h4>
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="col" colspan="2">
                                        <div class="divider-2 mt-10 mb-10"></div>
                                    </td>
                                </tr>
{{--                                <tr>--}}
{{--                                    <td class="cart_total_label">--}}
{{--                                        <h6 class="text-muted">Vergi</h6>--}}
{{--                                    </td>--}}
{{--                                    <td class="cart_total_amount">--}}
{{--                                        <h5 class="text-heading text-end">{{ Cart::tax() }} TL</h5></td>--}}
{{--                                </tr>--}}

                                <tr>
                                    <td class="cart_total_label">
                                        <h6 class="text-muted">Genel Toplam</h6>
                                    </td>
                                    <td class="cart_total_amount">
                                        <h4 class="text-brand text-end">{{ Cart::total() }} TL</h4>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                        @if(Auth::check())
                            <a href="{{ route('paytrOdeme') }}" class="btn mb-20 w-100">Ödeme Yap </a>
                        @else
                            <a href="{{ route('login') }}" class="btn mb-20 w-100">Giriş Yap</a>
                            <a class="btn mb-20 w-100" onclick="toggleForm()">Üye Olmadan İlerle</a>

                            <form id="hiddenForm" method="POST" style="display: none;" action="{{ route('paytrOdeme') }}">
                                @csrf
                                <input type="text" name="name" maxlength="50" placeholder="Ad - Soyad Giriniz">
                                <input type="text" name="phone" maxlength="11"
                                       onkeypress="return isNumberKey(event)" pattern="[0-9]*"
                                       inputmode="numeric" placeholder="Telefon Numarası Giriniz">
                                <input type="email" name="email" maxlength="70" placeholder="Email adresi Giriniz">
                                <textarea cols="2" rows="1" name="address"  maxlength="190" placeholder="Adres Giriniz"></textarea>
                                <button class="btn btn-success">Gönder</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        @else
            <div class="row">
                <div class="col-lg-12">
                    <div class="alert alert-warning">Sepet Boş</div>
                </div>
                <div class="divider-2 mb-30"></div>
                <div class="cart-action d-flex justify-content-between">
                    <a class="btn" href="{{ route('frontend.index') }}"><i class="fi-rs-arrow-left mr-10"></i>Alışverişe Devam Et</a>
                </div>
            </div>
        @endif

    </div>



@endsection


@section('js')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(".qtyUp").click(function (){
            datarowId = $(this).data("rowid");
            datarowValue = $('input[name="qty_'+datarowId+'"]').val();
            datanewNumber = parseInt(datarowValue)+1;
            $.ajax({
                type:'POST',
                url:'/sepetguncelle/'+datarowId+'/'+datanewNumber,
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'), 'qty' : datanewNumber},
                success:function(data){ if(data==="ok"){ location.reload();} }
            });
        });

        $(".qtyDown").click(function (){
            datarowId = $(this).data("rowid");
            datarowValue = $('input[name="qty_'+datarowId+'"]').val();
            datanewNumber = parseInt(datarowValue)-1;
            $.ajax({
                type:'POST',
                url:'/sepetguncelle/'+datarowId+'/'+datanewNumber,
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'), 'qty' : datanewNumber},
                success:function(data){ if(data==="ok"){ location.reload();} }
            });
        });


        function toggleForm() {
            let form = document.getElementById("hiddenForm");
            if (form.style.display === "none") {
                form.style.display = "block";
            } else {
                form.style.display = "none";
            }
        }


        function isNumberKey(evt) {
            let charCode = (evt.which) ? evt.which : event.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            }
            return true;
        }

    </script>
@endsection


@section('after-js')

@endsection






















