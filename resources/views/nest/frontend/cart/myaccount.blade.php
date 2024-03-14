@extends('nest.frontend.layout.layout')
@section('css')

@endsection
@section('title','Hesap Bilgilerim')

@section('head')

@endsection
@section('breadcrumb')

    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="/" rel="nofollow"><i class="fi-rs-home mr-5"></i>Anasayfa</a>
                <span>Hesap Bilgileri</span>
            </div>
        </div>
    </div>

@endsection

@section('content')
    <div class="page-content pt-150 pb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 m-auto">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="dashboard-menu">
                                <ul class="nav flex-column" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="dashboard-tab" data-bs-toggle="tab"
                                           href="#dashboard" role="tab" aria-controls="dashboard"
                                           aria-selected="true"><i class="fi-rs-shopping-cart mr-10"></i>Siparişlerim</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " id="dashboard-tab" data-bs-toggle="tab"
                                           href="#address" role="tab" aria-controls="address"
                                           aria-selected="true"><i class="fi-rs-settings-sliders mr-10"></i>Adres Bİlgilerim</a>
                                    </li>
{{--                                    <li class="nav-item">--}}
{{--                                        <a class="nav-link " id="dashboard-tab" data-bs-toggle="tab"--}}
{{--                                           href="#track-orders" role="tab" aria-controls="track-orders"--}}
{{--                                           aria-selected="true"><i class="fi-rs-settings-sliders mr-10"></i>Kargo Takibi</a>--}}
{{--                                    </li>--}}
                                    <li class="nav-item">
                                        <a class="nav-link d-none" id="dashboard-tab" data-bs-toggle="tab"
                                           href="#account" role="tab" aria-controls="account"
                                           aria-selected="true"><i class="fi-rs-settings-sliders mr-10"></i>Hesap Bİlgilerim</a>
                                    </li>
{{--                                    <li class="nav-item">--}}
{{--                                        <a class="nav-link" id="orders-tab" data-bs-toggle="tab" href="#orders"--}}
{{--                                           role="tab" aria-controls="orders" aria-selected="false"><i--}}
{{--                                                class="fi-rs-shopping-bag mr-10"></i>Hesap Güvenliği</a>--}}
{{--                                    </li>--}}
                                    <li class="nav-item">
                                        <a href="{{ route('logout') }}" class="nav-link"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();"><i
                                                class="fi fi-rs-sign-out mr-10"></i>{{ __('auth.loguth') }}</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                              class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="tab-content account dashboard-content pl-50">
                                <div class="tab-pane fade active show" id="dashboard" role="tabpanel"
                                     aria-labelledby="dashboard-tab">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                @if(count($orders)>0)
                                                    <table class="table">
                                                        <thead>
                                                        <tr>
                                                            <th>Sip. No</th>
                                                            <th>Tarih</th>
                                                            <th>Durum</th>
                                                            <th>Görüntüle</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($orders as $order)
                                                            <tr>
                                                                <td>#{{$order->id}}</td>
                                                                <td>{{ date('d/m/Y', strtotime($order->order_date)) }}</td>
                                                                <td>
                                                                    @if($order->status=="completed")
                                                                        Onaylandı
                                                                    @elseif($order->status=="pending")
                                                                        Bekliyor
                                                                    @elseif($order->status=="cancelled")
                                                                        İptal
                                                                    @else
                                                                        Başarısız İşlem
                                                                    @endif
                                                                </td>
                                                                <td><a href="#" class="btn-small d-block">Görüntüle</a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                @else
                                                    <div class="alert alert-warning">Siparişiniz bulunmuyor.</div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="mb-0">Your Orders</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                    <tr>
                                                        <th>Order</th>
                                                        <th>Date</th>
                                                        <th>Status</th>
                                                        <th>Total</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>#1357</td>
                                                        <td>March 45, 2020</td>
                                                        <td>Processing</td>
                                                        <td>$125.00 for 2 item</td>
                                                        <td><a href="#" class="btn-small d-block">View</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td>#2468</td>
                                                        <td>June 29, 2020</td>
                                                        <td>Completed</td>
                                                        <td>$364.00 for 5 item</td>
                                                        <td><a href="#" class="btn-small d-block">View</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td>#2366</td>
                                                        <td>August 02, 2020</td>
                                                        <td>Completed</td>
                                                        <td>$280.00 for 3 item</td>
                                                        <td><a href="#" class="btn-small d-block">View</a></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="track-orders" role="tabpanel"
                                     aria-labelledby="track-orders-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="mb-0">Orders tracking</h3>
                                        </div>
                                        <div class="card-body contact-from-area">
                                            <p>To track your order please enter your OrderID in the box below and press
                                                "Track" button. This was given to you on your receipt and in the
                                                confirmation email you should have received.</p>
                                            <div class="row">
                                                <div class="col-lg-8">
                                                    <form class="contact-form-style mt-30 mb-50" action="#"
                                                          method="post">
                                                        <div class="input-style mb-20">
                                                            <label>Order ID</label>
                                                            <input name="order-id"
                                                                   placeholder="Found in your order confirmation email"
                                                                   type="text">
                                                        </div>
                                                        <div class="input-style mb-20">
                                                            <label>Billing email</label>
                                                            <input name="billing-email"
                                                                   placeholder="Email you used during checkout"
                                                                   type="email">
                                                        </div>
                                                        <button class="submit submit-auto-width" type="submit">Track
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="address-tab">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="card mb-3 mb-lg-0">
                                                <div class="card-header">
                                                    <h3 class="mb-0">Geçerli Adres</h3>
                                                </div>
                                                <div class="card-body">
                                                    <address>
                                                       {{auth()->user()->address}}
                                                    </address>
                                                    <p>{{auth()->user()->state ." / ".auth()->user()->palcity?auth()->user()->palcity->name :""}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5 class="mb-0">Teslimat Adresi</h5>
                                                </div>
                                                <div class="card-body">
                                                    <address>
                                                        {{auth()->user()->address}}
                                                    </address>
                                                    <p>{{auth()->user()->state ." / ".auth()->user()->palcity?auth()->user()->palcity->name :""}}</p>
                                                    <a href="#" class="btn-small">Düzenle</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="account" role="tabpanel"
                                     aria-labelledby="account-detail-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Hesap Detayları</h5>
                                        </div>
                                        <div class="card-body">
{{--                                            <p>Already have an account? <a href="/page-login">Log in instead!</a></p>--}}
                                            <form method="post" name="enq">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label>First Name <span class="required">*</span></label>
                                                        <input required="" class="form-control" name="name" type="text">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Last Name <span class="required">*</span></label>
                                                        <input required="" class="form-control" name="phone">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Display Name <span class="required">*</span></label>
                                                        <input required="" class="form-control" name="dname"
                                                               type="text">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Email Address <span class="required">*</span></label>
                                                        <input required="" class="form-control" name="email"
                                                               type="email">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Current Password <span class="required">*</span></label>
                                                        <input required="" class="form-control" name="password"
                                                               type="password">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>New Password <span class="required">*</span></label>
                                                        <input required="" class="form-control" name="npassword"
                                                               type="password">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Confirm Password <span class="required">*</span></label>
                                                        <input required="" class="form-control" name="cpassword"
                                                               type="password">
                                                    </div>
                                                    <div class="col-md-12">
                                                        <button type="submit"
                                                                class="btn btn-fill-out submit font-weight-bold"
                                                                name="submit" value="Submit">Save Change
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
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
    <script>

    </script>
@endsection


@section('after-js')

@endsection
