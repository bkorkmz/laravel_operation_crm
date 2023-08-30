@extends('layouts.layout-admin')
@section('title')
    {{ __('Profilim') }}
@endsection

@section('content')
<link rel="stylesheet" type="text/css" href='{{asset('admin/assets/pages/notfound/css/style.css')}}'/>
<meta name="robots" content="noindex, nofollow">
{{-- <script nonce="533d98be-ddf7-42f2-a4a4-57483642083e">(function(w,d){!function(db,dc,dd,de){db[dd]=db[dd]||{};db[dd].executed=[];db.zaraz={deferred:[],listeners:[]};db.zaraz.q=[];db.zaraz._f=function(df){return async function(){var dg=Array.prototype.slice.call(arguments);db.zaraz.q.push({m:df,a:dg})}};for(const dh of["track","set","debug"])db.zaraz[dh]=db.zaraz._f(dh);db.zaraz.init=()=>{var di=dc.getElementsByTagName(de)[0],dj=dc.createElement(de),dk=dc.getElementsByTagName("title")[0];dk&&(db[dd].t=dc.getElementsByTagName("title")[0].text);db[dd].x=Math.random();db[dd].w=db.screen.width;db[dd].h=db.screen.height;db[dd].j=db.innerHeight;db[dd].e=db.innerWidth;db[dd].l=db.location.href;db[dd].r=dc.referrer;db[dd].k=db.screen.colorDepth;db[dd].n=dc.characterSet;db[dd].o=(new Date).getTimezoneOffset();if(db.dataLayer)for(const dp of Object.entries(Object.entries(dataLayer).reduce(((dq,dr)=>({...dq[1],...dr[1]})),{})))zaraz.set(dp[0],dp[1],{scope:"page"});db[dd].q=[];for(;db.zaraz.q.length;){const ds=db.zaraz.q.shift();db[dd].q.push(ds)}dj.defer=!0;for(const dt of[localStorage,sessionStorage])Object.keys(dt||{}).filter((dv=>dv.startsWith("_zaraz_"))).forEach((du=>{try{db[dd]["z_"+du.slice(7)]=JSON.parse(dt.getItem(du))}catch{db[dd]["z_"+du.slice(7)]=dt.getItem(du)}}));dj.referrerPolicy="origin";dj.src="https://colorlib.com/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(db[dd])));di.parentNode.insertBefore(dj,di)};["complete","interactive"].includes(dc.readyState)?zaraz.init():db.addEventListener("DOMContentLoaded",zaraz.init)}(w,d,"zarazData","script");})(window,document);</script></head> --}}





    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="card">

                    <div class="card-block ">
                        <div class="image"></div>

                        <div class="content">
                        <div class="content-box">
                        <div class="big-content">
                        
                        <div class="list-square">
                        <span class="square"></span>
                        <span class="square"></span>
                        <span class="square"></span>
                        </div>
                        
                        <div class="list-line">
                        <span class="line"></span>
                        <span class="line"></span>
                        <span class="line"></span>
                        <span class="line"></span>
                        <span class="line"></span>
                        <span class="line"></span>
                        </div>
                        
                        <i class="fa fa-search" aria-hidden="true"></i>
                        
                        <div class="clear"></div>
                        </div>
                        
                        <h1>Oops! Bulunamadı .</h1>
                        <p>Aradığınız Sayfa Şu anda Burada Yok.<br>
                       Lütfen Yönetici ile İletişime Geçininiz</p>
                        </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>





@endsection


@section('css')

@endsection
@section('js')

@endsection
