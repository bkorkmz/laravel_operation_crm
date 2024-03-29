@extends('layouts.layout-admin')
@section('title')
    {{ $test->name }}
@endsection

@section('content')

<div class="pcoded-inner-content">
    <div class="main-body">
        <div class="page-wrapper">
            <div class="card">
                <div class="card-header">
                    <h3>Slider  Ekle</h3>
                    <a href="{{route('test.index')}}" class="btn btn-grd-warning btn-sm float-right rounded mr-1  "><i class="fa fa-reply"></i>Geri Dön</a>
                </div>
                <div class="card-block">
                    <div class="row">
                        <div class="col-sm-12 ">
                            <dl class="dl-horizontal row">
                                <dt class="col-sm-3">Test Adı :</dt>
                                <dd class="col-sm-9">{{$test->name}}</dd>

                                <dt class="col-sm-3">Test Açıklaması :</dt>
                                <dd><blockquote class="blockquote">
                                        <p class="m-b-0">{{$test->detail ?? "Açıklama Yok"}}</p>

                                    </blockquote></dd>
                            </dl>
                            

                            <dl class="dl-horizontal row">
{{--                               @dd($test->questionBank)--}}
                                <dt class="col-sm-3">Durum</dt>
                                <dd class="col-sm-9">{{$test->status==1 ? "Aktif":"Pasif"}}</dd>

                                <dt class="col-sm-3">Ücret Durumu</dt>
                                <dd class="col-sm-9">{{$test->wage_status=="pay" ? "Ücretli": "Ücretsiz"  }}</dd>
                            </dl>  
                            <dl class="dl-horizontal row">
                                <dt class="col-sm-3">Sorubankası Adı</dt>
                                <dd class="col-sm-9">{{$test["questionBank"]->name }}</dd>

                                <dt class="col-sm-3">Soru Sayısı   :</dt>
                                <dd class="col-sm-9">{{count($test["questionBank"]->questions)}}</dd>

                            </dl>
                        </div>
                        <div class="col-sm-12 col-xl-12">
                           

                            <div class="card-block table-border-style">
                                <div class="card-header">
                                    <h2 class="card-title">Test Soruları</h2>
                                </div>
                                @foreach($test["questionBank"]->questions as $model)
                                    <div class="card ecommerce-card">
    
                                        <div class="card-body">
                                            <h3>Soru {{$loop->iteration}} </h3>
                                            <p>{{ $model->question }}</p>
                                        </div>
                                    </div>
                                    @php
                                        $sections =json_decode($model->answers,TRUE);
                                    @endphp
                                    @foreach ($sections as $answer )
    
                                        @php $data= array_values($answer); @endphp
                                        <div class="card ecommerce-card choice-card">
                                            <div class="choice-b">
                                                <a class="text-uppercase">
                                                    {{chr(65 + $loop->index	)}}
                                                </a>
                                            </div>
                                            <div class="card-body">
                                                <div class="item-name">
                                                    <h6 class="mb-0">
                                                        <label class="text-body">{{  $data[0]['title'] }}</label>
                                                    </h6>
                                                </div>
                                            </div>
                                            <div class="choice-c">
                                                @if($data[0]['mark']==true)
                                                    <div class="choice_check correct_text">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check font-medium-3"><polyline points="20 6 9 17 4 12"></polyline></svg><br>
                                                        Doğru Yanıt
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                @endforeach
                            </div>
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection



@section('css')
    <style>
        .card {
            border: 1px solid black;
            padding: 10px;
            margin: 10px;
        }

        .options {
            display: flex;
        }


        .option.correct {
            background-color: green;
        }
        .option.wrong {
            background-color: red;
        }

    </style>
    <style>

        .card {
            box-shadow: unset;
            border: 1px solid #ddd;
        }
        .card {
            border: none;
            margin-bottom: 2rem;
            box-shadow: 0 4px 24px 0 rgba(34, 41, 47, 0.1);
            transition: all 0.3s ease-in-out, background 0s, color 0s, border-color 0s;
        }
        .card {
            position: relative;
            display: grid;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid rgba(34, 41, 47, 0.125);
            border-radius: 0.428rem;
        }
        .choice-card{
            grid-template-columns: 0fr 2fr 0fr !important;
            margin-bottom: 10px;
        }
        .choice-b {
            /* display: -webkit-box; */
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: center;
            -webkit-justify-content: center;
            -ms-flex-pack: center;
            justify-content: center;
            -webkit-box-align: center;
            -webkit-align-items: center;
            -ms-flex-align: center;
            align-items: center;
            height: 100%;
            background-color: #e8e8e8;
            font-size: 1.4rem;
            font-weight: 700;
            padding: 1px 10px;
        }

        .choice-c {
            background-color: #c2f18e;
            display: flex;
        }
        .choice_check {
            padding: 1px 11px;
            align-items: center;
            color: black;
            text-align: center;
            font-size: 14px;
            margin: auto;
        }

    </style>
@endsection

@section('js')

    
@endsection
