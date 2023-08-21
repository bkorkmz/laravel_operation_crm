@extends('layouts.layout-admin')
@section('title')
    {{ __('Hakkımızda ') }}
@endsection
@section('content')
@php
$page = json_decode($section_page[0]->section_content);
$data = $section_page[0];


 @endphp

{{-- @dd($page->button_text) --}}
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="card">
                    <div class="card-header">
                        <h3>{{$data->section_name== "about" ? "Hakkımızda" :""}} Sayfası </h3>
                        <button type="button" class="btn btn-grd-warning btn-sm float-right rounded mr-1  "
                                    onclick="return window.history.back()"><i class="fa fa-reply"></i>Geri Dön</button>
                    </div>
                    <div class="card-block table-border-style">

                        <section id="about" class="about section-bg">
                            <div class="container" data-aos="fade-up">

                                <div class="row no-gutters">
                                    <div class="content col-xl-5 d-flex align-items-stretch">
                                        <div class="content">
                                            <span class="pcoded-badge label label-info ">Başlık</span>
                                            <h3>{{$page->header_1}} </h3>
                                            <span class="pcoded-badge label label-info ">Alt başlık</span>
                                            <p>{{$page->header_2}} </p>

                                            <a href="{{$page->button_text ?? ""}}" class="about-btn btn btn-dark"><span>{{$page->button_text}}</span> <i
                                                    class="bx bx-chevron-right"></i></a>
                                            <span class="pcoded-badge label label-info ">Buton</span>
                                        </div>
                                    </div>
                                    <div class="col-xl-7 d-flex align-items-stretch">
                                        <div class="icon-boxes d-flex flex-column justify-content-center">
                                            <div class="row">
                                                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="100">
                                                    <!-- <i class="bx bx-receipt"></i> -->
                                                    <img src="{{$page->logo_1  ?? ''}}"   alt="">
                                                    <span class="pcoded-badge label label-info ">Hizmet 1 Logo</span>

                                                    <h4>{{$page->service_1_title}}<span class="pcoded-badge label label-info ">Hizmet 1
                                                            Başlık</span>
                                                    </h4>
                                                    <span class="pcoded-badge label label-info ">Hizmet 1 Açıklama</span>
                                                    <p>{{$page->service_1_description}}</p>
                                                </div>
                                                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="200">
                                                    <!-- <i class="bx bx-cube-alt"></i> -->
                                                    <img src="{{$page->logo_2 ?? ''}}"
                                                        alt="">
                                                    <span class="pcoded-badge label label-info ">Hizmet 2 Logo</span>


                                                    <h4>{{$page->service_2_title}} <span class="pcoded-badge label label-info ">Hizmet 2
                                                            Başlık</span></h4>
                                                    <span class="pcoded-badge label label-info ">Hizmet 2 Açıklama</span>
                                                    <p>{{$page->service_2_description}}</p>
                                                </div>
                                                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="300">
                                                    <!-- <i class="bx bx-images"></i> -->
                                                    <img src="{{$page->logo_3  ?? ''}}"
                                                        alt=""><span class="pcoded-badge label label-info ">Hizmet 3
                                                        Logo</span>

                                                    <h4>{{$page->service_3_title}} <span
                                                            class="pcoded-badge label label-info ">Hizmet 3 Başlık</span>
                                                    </h4>
                                                    <span class="pcoded-badge label label-info ">Hizmet 3 Açıklama</span>
                                                    <p>{{$page->service_3_description}}</p>
                                                </div>
                                                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="400">
                                                    <!-- <i class="bx bx-shield"></i> -->
                                                    <img src="{{$page->logo_4  ?? ''}}"
                                                        alt=""><span class="pcoded-badge label label-info ">Hizmet 4
                                                        Logo</span>

                                                    <h4>{{$page->service_4_title}} <span class="pcoded-badge label label-info ">Hizmet 4
                                                            Başlık</span></h4>
                                                    <span class="pcoded-badge label label-info ">Hizmet 4 Açıklama</span>
                                                    <p>P{{$page->service_4_description}}</p>
                                                </div>
                                            </div>
                                        </div><!-- End .content-->
                                    </div>
                                </div>

                            </div>
                        </section>






                        <div class="card p-20 m-1">
                            <div class="card-header">
                                <h3>Hakkımızda  Sayfası Düzenle</h3>
                                
                            </div>

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="{{ route('page.update', 'about') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Başlık </label>
                                            <input type="text" id="first-title-column" class="form-control"
                                                value="{{$page->header_1}}" placeholder="Başlık " name="header_1" />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">Alt Başlık</label>
                                            <input type="text" id="last-title-column" class="form-control" value="{{$page->header_2}}"
                                                placeholder="Alt Başlık" name="header_2" />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="city-column">Buton Yazısı</label>
                                            <input type="text" id="button_text" class="form-control" value="{{$page->button_text}}"
                                                placeholder="Buton Yazısı" name="button_text" />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="city-column">Buton Url</label>
                                            <input type="text" id="button_url" class="form-control" value="{{$page->button_text ?? ""}}"
                                                placeholder="Buton Url" name="button_url" />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="city-column">Hizmet 1 Başlık</label>
                                            <input type="text" id="city-column" class="form-control" value="{{$page->service_1_title}}"
                                                placeholder="Hizmet 1 Başlık" name="service_1_title" />
                                        </div>
                                    </div>


                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="country-floating">Hizmet 1 Açıklama</label>
                                            <input type="text" id="country-floating" class="form-control"
                                                value="{{$page->service_1_description}}" name="service_1_description" placeholder="Hizmet 1 Başlık" />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="company-column">Hizmet 2 Başlık</label>
                                            <input type="text" id="company-column" class="form-control"
                                                value="{{$page->service_2_title}}" name="service_2_title" placeholder="Hizmet 2 Başlık" />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="company-column">Hizmet 2 Açıklama</label>
                                            <input type="text" id="company-column" class="form-control"
                                                value="{{$page->service_2_description}}" name="service_2_description" placeholder="Hizmet 2 Açıklama" />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="company-column">Hizmet 3 Başlık</label>
                                            <input type="text" id="company-column" class="form-control"
                                                value="{{$page->service_3_title}}" name="service_3_title" placeholder="Hizmet 3 Başlık" />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="company-column">Hizmet 3 Açıklama</label>
                                            <input type="text" id="company-column" class="form-control"
                                                value="{{$page->service_3_description}}" name="service_3_description" placeholder="Hizmet 3 Açıklama" />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="company-column">Hizmet 4 Başlık</label>
                                            <input type="text" id="company-column" class="form-control"
                                                value="{{$page->service_4_title}}" name="service_4_title" placeholder="Hizmet 4 Başlık" />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="company-column">Hizmet 4 Açıklama</label>
                                            <input type="text" id="company-column" class="form-control"
                                                value="{{$page->service_4_description}}" name="service_4_description" placeholder="Hizmet 4 Açıklama" />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="heroImage1">Logo 1</label>
                                            <div class="custom-file" id="customFile">
                                                <input type="file" class="custom-file-input" id="heroImage1"
                                                    name="logo_1" aria-describedby="fileHelp">
                                                <label class="custom-file-label" for="heroImage1">
                                                    Dosya Seç
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="logo_2">Logo 2</label>
                                            <div class="custom-file" id="customFile">
                                                <input type="file" class="custom-file-input" id="logo_2"
                                                    name="logo_2" aria-describedby="fileHelp">
                                                <label class="custom-file-label" for="logo_2">
                                                    Dosya Seç
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="logo_3">Logo 3</label>
                                            <div class="custom-file" id="customFile">
                                                <input type="file" class="custom-file-input" id="logo_3"
                                                    name="logo_3" aria-describedby="fileHelp">
                                                <label class="custom-file-label" for="logo_3">
                                                    Dosya Seç
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="logo_4">Logo 4</label>
                                            <div class="custom-file" id="customFile">
                                                <input type="file" class="custom-file-input" id="logo_4"
                                                    name="logo_4" aria-describedby="fileHelp">
                                                <label class="custom-file-label" for="logo_4">
                                                    Dosya Seç
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="company-column">Onay Durumu</label>
                                        <select name="status" class="form-control" required>
                                            <option value="1" {{ $data->status == 1 ? 'selected' : '' }}>Aktif
                                            </option>
                                            <option value="0" {{ $data->status == 0 ? 'selected' : '' }}>Pasif
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            
                                {{-- <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">İçerik Resmi</label>
                                    <div class="col-sm-5">
                                        <input type="file" class="form-control form-control-normal dropify"
                                            placeholder="" name="image" accept=".png,.jpg,.jpeg,.gif,.webp,.bmp">
                                    </div>
                                </div> --}}
                                <div class="text-right m-t-20">
                                    <button class="btn btn-primary rounded">Kaydet</button>
                                </div>
                            </form>


                        </div>








                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('css')
    <style>
        .label {
            border-radius: 13px;
        }

        .about .container {
            position: relative;
            z-index: 10;
        }

        .about .content {
            padding: 30px 30px 30px 0;
        }

        .about .content h3 {
            font-weight: 700;
            font-size: 34px;
            margin-bottom: 30px;
        }

        .about .content p {
            margin-bottom: 30px;
        }

        .about .content .about-btn {
            padding: 8px 30px 9px 30px;
            color: #fff;
            border-radius: 50px;
            transition: 0.3s;
            text-transform: uppercase;
            font-weight: 600;
            font-size: 13px;
            display: inline-flex;
            align-items: center;
            border: 2px solid var(--current-color);
            ;
        }

        .about .content .about-btn i {
            font-size: 16px;
            padding-left: 5px;
        }

        .about .content .about-btn:hover {
            background: #e35052;
            background: var(--current-color);
            ;
        }

        .about .icon-boxes .icon-box {
            margin-top: 30px;
        }

        .about .icon-boxes .icon-box i {
            font-size: 40px;
            color: var(--current-color);
            ;
            margin-bottom: 10px;
        }

        .about .icon-boxes .icon-box img {
            font-size: 40px;
            color: var(--current-color);
            ;
            margin-bottom: 10px;
            width: 60px;
            background-color: var(--current-color);
            border-radius: var(--bs-border-radius-lg) !important;
        }

        .about .icon-boxes .icon-box h4 {
            font-size: 20px;
            font-weight: 700;
            margin: 0 0 10px 0;
        }

        .about .icon-boxes .icon-box p {
            font-size: 15px;
            color: #848484;
        }

        @media (max-width: 1200px) {
            .about .content {
                padding-right: 0;
            }
        }

        @media (max-width: 768px) {
            .about {
                text-align: center;
            }
        }
    </style>
@endsection
