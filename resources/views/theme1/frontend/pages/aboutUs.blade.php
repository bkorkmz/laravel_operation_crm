@extends('theme1.layout')

@section('title',"Hakkımızda")

@section('head')
    <meta name="googlebot" content="noindex, nofollow">
    <meta name="robots" content="noindex, nofollow">
    <meta name="bingbot" content="noindex, nofollow">

    <meta name="title" content="Hakkımızda">
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Webpage",
            "url": "{{request()->fullUrl()}}"
            "name": "Hakkımızda",
            "inLanguage":"{{app()->getLocale()}}",

        }
    </script>
    <script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@type": "BreadcrumbList",
          "itemListElement": [{
            "@type": "ListItem",
            "position": 1,
            "name": "Anasayfa",
            "item": "{{route('frontend.index')}}"
          },{
            "@type": "ListItem",
            "position": 2,
            "name": "Hakkımızda",
            "item": " {{request()->fullUrl()}} "
          }]
        }
    </script>
@endsection

@section('css')
    <style>
        .blog .sidebar .recent-posts img {
            height: 66px;
        }

        .blog .entry .entry-img-recent {
            max-height: 440px;
            margin: -17px 1px 7px -11px;
            overflow: hidden;
        }

        .blog .entry {
            padding: 30px;
            margin-bottom: 60px;
            box-shadow: 0 0px 0px rgba(0, 0, 0, 0.1) !important;
        }
    </style>
@endsection


@section('breadcrumbs')
    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="/">Anasayfa</a></li>
                <li>Hakkımızda</li>
            </ol>
            <h1>Hakkımızda</h1>

        </div>
    </section

            @endsection


    @section('content')><!-- End Breadcrumbs -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">

            <div class="row">

                <div class="col-lg-12 entries">

                    <article class="entry entry-single">
                        <h2 class="entry-title">
                            <a>HAKKIMIZDA</a>
                        </h2>
                        <br/>

                        <p>
                            Merhaba! HelloNewMedia, 2023 yılında Türkiye'de kurulan dinamik ve yenilikçi bir dijital medya
                            ajansıyız. Şirketimiz, dijital dünyada marka oluşturmanın ve güçlendirmenin anahtarlarını
                            sunarak iş dünyasının dijital dönüşümüne liderlik etmeyi hedefliyor.
                        </p>

                        <p>
                            HelloNewMedia'nın temelini atan kurucularımız, Betül GÜNAYDIN YILMAZ ve Adem YAMAN dijital medya
                            alanındaki tutkularını ve deneyimlerini bir araya getirerek sektörde kendine sağlam bir yer
                            edinmeyi amaçlamıştır. Bu yolculukta, müşterilerimize dijital dünyada öne çıkma fırsatları
                            sunmayı ve onların başarı öykülerine katkıda bulunmayı kendimize misyon edindik.
                        </p>


                       <h3>HİZMETLERİMİZ</h3>

                        <p>
                            HelloNewMedia olarak sunduğumuz hizmetlerle dijital dünyada iz bırakıyoruz. Şirketimiz, Dijital
                            Ajans Hizmetleri, Marka Danışmanlığı Hizmetleri, Kreatif Ajans Hizmetleri ve Prodüksiyon
                            Hizmetleri gibi geniş bir yelpazede uzmanlık sağlamaktadır. Müşterilerimizin dijital
                            varlıklarını güçlendirmek ve etkileşimlerini artırmak adına özelleştirilmiş çözümler sunuyoruz.
                        </p>


                        <h3>MİSYONUMUZ</h3>

                        <p>
                            HelloNewMedia olarak misyonumuz, müşterilerimizin dijital dünyada öne çıkmasını sağlamak,
                            markalarını güçlendirmek ve etkileyici dijital deneyimler oluşturarak sektöre yön vermektir.
                            Yenilikçi stratejilerimiz ve kreatif yaklaşımımızla müşteri memnuniyetini ön planda tutarak, iş
                            ortaklarımızın başarılarına ortak olmayı amaçlıyoruz.
                        </p>


                        <h3>
                            VİZYONUMUZ
                        </h3>


                        <p>
                            HelloNewMedia olarak vizyonumuz, dijital medya alanında sürdürülebilir bir değişim ve gelişimin
                            lideri olmaktır. Markaların dijital dünyada daha güçlü ve etkili bir şekilde var olmalarını
                            sağlayarak sektörde öncü bir konumda yer almayı hedefliyoruz.
                        </p>


                        <p>
                            Sizinle birlikte, dijital dünyada sınırları zorlamak ve markalarınızı yeni bir medya deneyimiyle
                            buluşturmak için buradayız!
                        </p>



                    </article><!-- End blog entry -->

                </div><!-- End blog entries list -->

            </div>

        </div>
    </section><!-- End Blog Single Section -->

@endsection
@section('js')
@endsection
