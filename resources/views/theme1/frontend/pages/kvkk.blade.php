@extends('theme1.layout')
@section('title',"Kvkk Politikamız")


@section('head')

    <meta name="googlebot" content="noindex, nofollow">
    <meta name="robots" content="noindex, nofollow">
    <meta name="bingbot" content="noindex, nofollow">
    <meta name="title" content="Kvkk Politikamız">
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Webpage",
            "url": "{{request()->fullUrl()}}"
            "name": "Kvkk Politikamız",
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
            "name": "Kvkk Politikamız",
            "item": "{{request()->fullUrl()}}"
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
                <li>{{ "Kvkk Politikamız" }}</li>
            </ol>
            <h1>{{ "Kvkk Politikamız" }}</h1>

        </div>
    </section
            @endsection
    @section('content')>
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">

            <div class="row">

                <div class="col-lg-12 entries">

                    <article class="entry entry-single">
                        <h2 class="entry-title">
                            <a>KVKK Politikamız</a>
                        </h2>
                        <br/>

                        <ol>
                            <li><strong>Veri Sorumlusu Sıfatıyla Bilgilendirme</strong></li>
                        </ol>
                        <p>Maslak Mah. AOS 55. Sok. 42 MASLAK No:2 İ&ccedil; Kapı No: 25 Maslak / İSTANBUL /&nbsp;
                            adresinde mukim numaralı BET&Uuml;L G&Uuml;NAYDIN YILMAZ olarak kişisel verilerinizin g&uuml;venliği
                            hususuna azami hassasiyet g&ouml;stermekteyiz. Kişisel verileriniz 6698 sayılı Kişisel
                            Verilerin Korunması Kanunu&rsquo;na (bundan b&ouml;yle &ldquo;KVKK&rdquo; olarak
                            anılacaktır) uygun olarak işlenmekte ve muhafaza edilmektedir. KVKK, 7 Nisan 2016 tarihli ve
                            29677 sayılı Resmi Gazete&rsquo;de yayımlanmıştır. İlgili kanun, kişisel verileri işlenen
                            ger&ccedil;ek kişilerin Anayasamız ve T&uuml;rk Ceza Kanunlarımız tarafından da korunan
                            &ouml;zel hayatın gizliliği de dahil olmak &uuml;zere ger&ccedil;ek kişilerin temel hak ve
                            &ouml;zg&uuml;rl&uuml;klerini korumak ve kişisel verileri işleyen ger&ccedil;ek ve t&uuml;zel
                            kişilerin y&uuml;k&uuml;ml&uuml;l&uuml;klerini belirlemek i&ccedil;in
                            d&uuml;zenlenmiştir.</p>
                        <p>Kişisel verilerin korunması ve işlenmesi politikamızın (&ldquo;KVK Politikası&rdquo;) d&uuml;zenlenmesindeki
                            ama&ccedil; HelloNewMedia&rsquo;nın kişisel verilerin KVKK'ya uyumlu bir şekilde işlenmesini
                            ve korunmasını sağlamak i&ccedil;in y&ouml;netim talimatlarını ve prosed&uuml;r şartlarını
                            oluşturmaktır.</p>
                        <p>KVKK uyarınca, kişisel verileriniz; veri sorumlusu olarak tarafımızdan aşağıda a&ccedil;ıklanan
                            kapsamda toplanacak ve işlenebilecektir. HelloNewMedia olarak, KVKK uyarınca ve Veri
                            Sorumlusu sıfatıyla, kişisel verileriniz bu sayfada a&ccedil;ıklandığı &ccedil;er&ccedil;evede;
                            kaydedilecek, saklanacak, g&uuml;ncellenecek, mevzuatın izin verdiği durumlarda 3. kişilere
                            a&ccedil;ıklanabilecek/devredilebilecek, sınıflandırılabilecek ve KVKK&rsquo;da sayılan
                            şekillerde işlenebilecektir.</p>
                        <ol start="2">
                            <li><strong>Tanımlar</strong></li>
                        </ol>
                        <table width="745" class="table-bordered table-sm" >
                            <tbody>
                            <tr>
                                <td width="198">
                                    <p><strong>A&ccedil;ık Rıza</strong></p>
                                </td>
                                <td width="548">
                                    <p>Belirli bir konuya ilişkin, bilgilendirilmeye dayanan ve &ouml;zg&uuml;r iradeyle
                                        a&ccedil;ıklanan rızayı ifade eder.</p>
                                </td>
                            </tr>
                            <tr>
                                <td width="198">
                                    <p><strong>Aydınlatma Y&uuml;k&uuml;ml&uuml;l&uuml;ğ&uuml;</strong></p>
                                </td>
                                <td width="548">
                                    <p>KVKK m. 10 kapsamında kişisel verilerin elde edilmesi sırasında veri sorumlusu
                                        veya yetkilendirdiği kişi tarafından, ilgili kişilere;&nbsp; Veri sorumlusunun
                                        ve varsa temsilcisinin kimliği, kişisel verilerin hangi ama&ccedil;la
                                        işleneceği, işlenen kişisel verilerin kimlere ve hangi ama&ccedil;la
                                        aktarılabileceği, kişisel veri toplamanın y&ouml;ntemi ve hukuki sebebi, KVKK m.
                                        11 kapsamındaki hakları, konularındanda bilgi verme y&uuml;k&uuml;ml&uuml;l&uuml;ğ&uuml;d&uuml;r.</p>
                                </td>
                            </tr>
                            <tr>
                                <td width="198">
                                    <p><strong>İlgili Kişi</strong></p>
                                </td>
                                <td width="548">
                                    <p>Kişisel verisi işlenen ger&ccedil;ek kişiyi ifade eder.</p>
                                </td>
                            </tr>
                            <tr>
                                <td width="198">
                                    <p><strong>Kanun/KVKK&nbsp;</strong></p>
                                </td>
                                <td width="548">
                                    <p>6698 Sayılı Kişisel Verilerin Korunması Kanunu&rsquo;nu ifade eder.</p>
                                </td>
                            </tr>
                            <tr>
                                <td width="198">
                                    <p><strong>Kişisel Veri</strong></p>
                                </td>
                                <td width="548">
                                    <p>Kimliği belirli veya belirlenebilir ger&ccedil;ek kişiye ilişkin her t&uuml;rl&uuml;
                                        bilgi&rsquo;yi ifade eder.</p>
                                </td>
                            </tr>
                            <tr>
                                <td width="198">
                                    <p><strong>Kişisel Verilerin İşlenmesi</strong></p>
                                </td>
                                <td width="548">
                                    <p>Kişisel verilerin elde edilmesi, kaydedilmesi, depolanması, muhafaza edilmesi,
                                        değiştirilmesi, yeniden d&uuml;zenlenmesi, a&ccedil;ıklanması, aktarılması,
                                        devralınması, elde edilebilir h&acirc;le getirilmesi, sınıflandırılması ya da
                                        kullanılmasının engellenmesi gibi veriler &uuml;zerinde ger&ccedil;ekleştirilen
                                        her t&uuml;rl&uuml; işlemi ifade eder.</p>
                                </td>
                            </tr>
                            <tr>
                                <td width="198">
                                    <p><strong>Kurul</strong></p>
                                </td>
                                <td width="548">
                                    <p>Kişisel Verileri Koruma Kurulu&rsquo;nu ifade eder.</p>
                                </td>
                            </tr>
                            <tr>
                                <td width="198">
                                    <p><strong>Kurum</strong></p>
                                </td>
                                <td width="548">
                                    <p>Kişisel Verileri Koruma Kurumu&rsquo;nu ifade eder.</p>
                                </td>
                            </tr>
                            <tr>
                                <td width="198">
                                    <p><strong>Veri İşleyen&nbsp;&nbsp;</strong></p>
                                </td>
                                <td width="548">
                                    <p>Veri sorumlusunun verdiği yetkiye dayanarak onun adına kişisel veri işleyen ger&ccedil;ek
                                        veya t&uuml;zel kişiyi ifade eder.</p>
                                </td>
                            </tr>
                            <tr>
                                <td width="198">
                                    <p><strong>Veri Sorumlusu</strong></p>
                                </td>
                                <td width="548">
                                    <p>Kişisel verilerin işleme ama&ccedil;larını ve vasıtalarını belirleyen, veri kayıt
                                        sisteminin kurulmasından ve y&ouml;netilmesinden sorumlu olan ger&ccedil;ek veya
                                        t&uuml;zel kişiyi, ifade eder.</p>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <ol start="3">
                            <li><strong>Kişisel Verilerin İşlenmesi</strong></li>
                        </ol>
                        <p>KVKK uyarınca HelloNewMedia ile paylaştığınız kişisel verileriniz, tamamen veya kısmen,
                            otomatik olarak veyahut herhangi bir veri kayıt sisteminin par&ccedil;ası olmak kaydıyla
                            otomatik olmayan yollarla elde edilerek, kaydedilerek, depolanarak, değiştirilerek, yeniden
                            d&uuml;zenlenerek, kısacası veriler &uuml;zerinde ger&ccedil;ekleştirilen her t&uuml;rl&uuml;
                            işleme konu olarak tarafımızdan işlenebilecektir. KVKK kapsamında veriler &uuml;zerinde ger&ccedil;ekleştirilen
                            her t&uuml;rl&uuml; işlem &ldquo;kişisel verilerin işlenmesi&rdquo; olarak kabul
                            edilmektedir.</p>
                        <p>HelloNewMedia, web sayfaları, etkinlikler, eğitimler veya portal &uuml;zerinden, &uuml;yelik
                            işlemleri, satış işlemleri ile topladığı kişisel verileri genel olarak aşağıdaki ama&ccedil;lar
                            ile toplayabilecek ve işleyebilecektir:</p>
                        <ul>
                            <li>Web sayfaları, etkinlikler, eğitimler veya portal &uuml;zerinden etkileşimi sağlamak
                                adına kişisel bilgilerini toplamak,
                            </li>
                            <li>Alışveriş işleminin ger&ccedil;ekleştirilmesi,&nbsp;sipariş hazırlamanması, sipariş
                                paketleme, siparişinizin size ulaştırılabilmesi,&nbsp;alışverişinize ilişkin
                                e-fatura/e-arşiv faturanın d&uuml;zenlenmesi, faturanın tarafınıza g&ouml;nderilmesi,
                                siparişinizin&nbsp;kargolanması, teslimat bilgilerinin g&uuml;ncellenmesi&nbsp;ve
                                tarafınıza g&ouml;nderilebilmesi, sistemimizde oluşturduğumuz size ait kayıtların diğer
                                m&uuml;şterilere ilişkin kayıtlardan ayırt edilebilmesi, almış olduğunuz &uuml;r&uuml;n&uuml;n
                                tarafınıza iletilmesi, iadesi, incelenmesi vs. hizmetlerden faydalanabilmenizi sağlamak
                                ve bu operasyonel işlemlerin yerine getirilebilmesi, satın almış olduğunuz &uuml;r&uuml;nlerin
                                tedarik edilerek doğrudan size ulaştırılabilmesi ama&ccedil;larıyla ad-soyad, T.C.Kimlik
                                numarası ve iletişim bilgilerinizi (adres, e-posta adresi, telefon numarası) ve
                                alışveriş (alışveriş tarihi, miktarı, alışveriş i&ccedil;eriği, &ouml;deme şekli ve
                                &ouml;deme detayları) bilgilerinizi,
                            </li>
                            <li>Gerekli olduğu hallerde iade s&uuml;re&ccedil;lerinde iadenin banka hesabınıza/kredi
                                kartınıza yapılabilmesi i&ccedil;in banka hesap/kredi kartı bilgilerinizi,
                            </li>
                            <li>E-fatura/e-arşiv&nbsp;fatura d&uuml;zenlenebilmesi ve bazı durumlarda cari hesap ve
                                mutabakat işlemlerinin yapılabilmesi amacıyla kimlik, iletişim ve fatura bilgilerinizi,
                                ayrıca vergi m&uuml;kellefi iseniz ek bazı fatura bilgilerinizi (T.C. kimlik/ vergi
                                numarası, şahıs şirketi bilgileri),
                            </li>
                            <li>&Uuml;yelik işlemlerinin ger&ccedil;ekleştirilmesini sağlamak, sizinle akdedeceğimiz
                                &uuml;yelik s&ouml;zleşmesinin gereğini yerine getirmek, &uuml;ye girişinin
                                yapılabilmesi, &uuml;yelik bilgilendirmesinin yapılabilmesi, &uuml;ye olarak site/mobil
                                uygulama &uuml;zerinden alışveriş yapılmak istendiğinde &uuml;ye bilgilerinizi
                                kullanarak alışveriş yapmanızı sağlayabilmek ama&ccedil;larıyla ad-soyad, T.C.kimlik
                                numarası, iletişim (e-posta adresi, telefon numarası, teslimat ve fatura adres
                                bilgilerinizi) ve parola bilgilerinizi, &uuml;ye olarak tarafınıza sipariş ge&ccedil;mişinizi
                                g&ouml;r&uuml;nt&uuml;leme hizmeti verebilmek amacıyla alışveriş bilgilerinizi
                                (alışveriş tarihi, zamanı, miktarı, alışveriş i&ccedil;eriği, &ouml;deme detayları),&nbsp;
                            </li>
                            <li>Kampanyalar, promosyonlar, sms/elektronik posta ile b&uuml;lten g&ouml;ndermek ya da
                                tanıtım veya bildirimlerde bulunmak,&nbsp;reklamlar, &ccedil;ekiliş ve diğer
                                etkinliklerin d&uuml;zenlenmesi, haberdar edilmesi, raporlanması, pazarlama, analiz
                                &ccedil;alışmalarının yapılması, mobil uygulama, web sitesi veya diğer ortamlarında
                                reklamların ve pazarlama/iletişim faaliyetlerinin d&uuml;zenlenmesi, kullanıcı
                                ekranlarının &ouml;zelleştirilmesi, reklam, arama, anket vs. yapılması ama&ccedil;larıyla
                                pazarlama bilgilerinizi&nbsp;(doğum tarihi, cinsiyet, il, il&ccedil;e, Site ve Mobil
                                Uygulama i&ccedil;i bildirimlere/anketlere/tekliflere/kampanyalara karşı yaklaşımlar,
                                alışkanlıklar, favoriler, beğeniler, davranışlar, tercihler, arama hareketleri, ge&ccedil;miş
                                alışverişler, &ccedil;erez kayıtları, &ccedil;erez ve reklam tanıtıcısı/kimliği
                                bilgileri ve cihaz ID, &ouml;deme y&ouml;ntemleri ve tercihleri, Mobil Uygulama kullanım
                                s&uuml;resi, Mobil Uygulama versiyon bilgisi, iletişim tercihleri, alışveriş tutarı,
                                &ouml;deme kanalları, &ouml;demenin ger&ccedil;ekleştiği banka bilgisi, kullanılan
                                cihaza ilişkin marka, model, teknik &ouml;zellik ve işletim sistemi bilgileri,
                                kullandığınız operat&ouml;r bilgisi, anket cevapları vb.),
                            </li>
                            <li>Kullanıcılarımıza kişiselleştirilmiş hizmetler sunmak,&nbsp;S&ouml;zleşmeler uyarınca
                                sunduğumuz hizmetleri ger&ccedil;ekleştirmek,
                            </li>
                            <li>Gelen &ccedil;ağrıları karşılamak ve destek ihtiya&ccedil;larınıza cevap vermek,</li>
                            <li>G&uuml;ncel ve Ar-Ge aşamasındaki uygulamalarımızı geliştirmek ve y&ouml;netim s&uuml;recini
                                oluşturmak,
                            </li>
                            <li>Talebiniz doğrultusunda veya sosyal medyada yer alan şikayetlerin olması halinde veya
                                verdiğimiz hizmetlere ilişkin bir şik&acirc;yet olduğu takdirde s&ouml;z konusu şik&acirc;yeti
                                sonu&ccedil;landırmak,
                            </li>
                            <li>Kullanıcının kimliğini ifşa etmeden &ccedil;eşitli istatistiksel değerlendirmeler, veri
                                tabanı oluşturma ve pazar araştırmalarında kullanmak amacıyla verilerinizi toplamakta ve
                                işlemekteyiz.
                            </li>
                        </ul>
                        <ol start="4">
                            <li><strong>Kişisel Verilerin Kimlere ve Hangi Ama&ccedil;la Aktarılabileceği</strong></li>
                        </ol>
                        <p>Kişisel Verilerin Korunması Politikası'nı kabul etmekle, HelloNewMedia uygulamaları ve
                            hizmetleri kapsamında HelloNewMedia yurt i&ccedil;indeki hizmet sağlayıcıları, platformun
                            kullanıcılarıyla ve iş ortaklarıyla&nbsp;(Site ve Mobil Uygulama hizmeti sağlayanlar,
                            pazarlama/reklam/analiz hizmeti sağlayıcıları, veri tabanı ve sunucu hizmeti sağlayıcıları,
                            lojistik hizmetleri, e-posta sunucu hizmeti sağlayıcıları, e-fatura ve e-arşiv fatura
                            hizmeti sağlayıcıları, elektronik ileti aracı hizmet sağlayıcıları, kargo ve kurye
                            firmaları, depo hizmeti sağlayıcısı, banka ve elektronik &ouml;deme kuruluşları, hukuki ve
                            mali danışmanlık hizmeti verenler, bağımsız denetim hizmeti sağlayıcıları, arşivleme hizmeti
                            verenler, tedarik&ccedil;iler, uzmanlık gerektiren danışmanlık vb., yetkili kamu kurum ve
                            kuruluşları ile adli makamlara karşı olan bilgi, belge verme ve ilgili sair y&uuml;k&uuml;ml&uuml;l&uuml;klerimizi
                            yerine getirmek ve dava ve cevap hakları gibi yasal haklarımızı kullanabilmek amacıyla
                            bizden istenen bilgileri anılan bu kurum, kuruluş ve makamlar ile)&nbsp;paylaşılmasına a&ccedil;ık
                            rıza g&ouml;stermiş olduğunuz kişisel verilerinizin, toplanmasına, saklanmasına,
                            işlenmesine, kullanılmasına, yurt i&ccedil;ine aktarımına, s&ouml;zleşme ilişkisi i&ccedil;inde
                            olduğumuz, veri koruması ve g&uuml;venliği konusunda bizimle hukuken ve teknik olarak aynı
                            sorumlulukları taşıyan, ilgili mevzuat h&uuml;k&uuml;mlerine riayet eden &uuml;&ccedil;&uuml;nc&uuml;
                            kişilerle aktarımına izin vermiş bulunmaktasınız.</p>
                        <p>HelloNewMedia web sitesi ziyaretinize veya başvurunuza ilişkin verilerinizi ve gezinme
                            bilgileriniz gibi trafik bilgilerinizi; g&uuml;venliğiniz ve HelloNewMedia&rsquo;nın yasalar
                            karşısındaki y&uuml;k&uuml;ml&uuml;l&uuml;ğ&uuml;n&uuml; ifa etmesi amacıyla (su&ccedil;la m&uuml;cadele
                            ve devlet ve kamu g&uuml;venliğinin tehdidi benzeri ve fakat bununla sınırlı olmamak &uuml;zere
                            HelloNewMedia&rsquo;nın yasal veya idari olarak bildirim veya bilgi verme y&uuml;k&uuml;ml&uuml;l&uuml;ğ&uuml;n&uuml;n
                            mevcut olduğu durumlarda) yasal olarak bu bilgileri talep etmeye yetkili olan kamu kurum ve
                            kuruluşları ile paylaşabilecektir.</p>
                        <ol start="5">
                            <li><strong>Kişisel Veri Toplamanın Y&ouml;ntemi ve Hukuki Sebepleri</strong></li>
                        </ol>
                        <p>KVKK uyarınca&nbsp;HelloNewMedia&nbsp;ile paylaştığınız kişisel verileriniz, tamamen veya
                            kısmen, otomatik olarak veyahut herhangi bir veri kayıt sisteminin par&ccedil;ası olmak
                            kaydıyla otomatik olmayan yollarla elde edilerek, kaydedilerek, depolanarak, değiştirilerek,
                            yeniden d&uuml;zenlenerek, kısacası veriler &uuml;zerinde ger&ccedil;ekleştirilen her t&uuml;rl&uuml;
                            işleme konu olarak tarafımızdan işlenebilecektir.&nbsp;Kişisel verileriniz&nbsp;HelloNewMedia&rsquo;dan
                            hizmet veya &uuml;r&uuml;n aldığınızda, eğitimlere, etkinliklere katıldığınızda,&nbsp;HelloNewMedia&nbsp;hizmetlerini
                            kullandığınızda, reklam veya pazarlama ilanlarına giriş/başvuru yaptığınızda,&nbsp;Site ve
                            Mobil Uygulama&nbsp;&uuml;ye veya kayıt olduğunuzda,&nbsp;Site ve Mobil Uygulamada alışveriş
                            yaptığınızda&nbsp;ve &ccedil;erezlerle yazılı/fiziksel veya elektronik ortamda
                            toplanabilir.</p>
                        <table width="776" class="table-bordered table-sm">
                            <tbody>
                            <tr>
                                <td width="210">
                                    <p><strong><br/> VERİ KATEGORİLERİ</strong></p>
                                </td>
                                <td width="566">
                                    <p><strong><br/> BU KAPSAMDA ALINAN KİŞİSEL VERİ TİPLERİ VE DAYANAKLARI</strong></p>
                                </td>
                            </tr>
                            <tr>
                                <td width="210">
                                    <p><strong>Kimlik Bilgisi</strong></p>
                                </td>
                                <td width="566">
                                    <p><br/> &nbsp;HelloNewMedia&rsquo;dan &uuml;r&uuml;n veya hizmet almanız,&nbsp;
                                        eğitimlere, etkinliklere kaydolmanız , reklam veya pazarlama ilanlarına
                                        giriş/başvuru yapmanız, &uuml;ye veya kayıt olmanız&nbsp; ile birlikte &ldquo;Adınız&rdquo;,
                                        &ldquo;Soyadınız&rdquo;, &ldquo;Doğum Tarihiniz&rdquo;,&ldquo;T.C.Kimlik
                                        numaranız&rdquo; gibi bilgileri &nbsp;&nbsp;&nbsp; HelloNewMedia &nbsp;&nbsp;
                                        ile kendi isteğiniz ile paylaşmaktasınız.&nbsp; Kimlik bilgisini; mevzuat
                                        kapsamındaki y&uuml;k&uuml;ml&uuml;l&uuml;klerimizi yerine getirmek gerekli
                                        operasyonel faaliyetleri y&uuml;r&uuml;tebilmek ve etkileşime ge&ccedil;irmek i&ccedil;in
                                        işlemekteyiz.</p>
                                </td>
                            </tr>
                            <tr>
                                <td width="210">
                                    <p><strong>İletişim Bilgisi</strong></p>
                                </td>
                                <td width="566">
                                    <p><br/> &nbsp;HelloNewMedia&rsquo;dan &uuml;r&uuml;n veya hizmet almanız,&nbsp;
                                        eğitimlere, etkinliklere kaydolmanız , reklam veya pazarlama ilanlarına
                                        giriş/başvuru yapmanız, &uuml;ye veya kayıt olmanız&nbsp; ile birlikte &ldquo;Elektronik
                                        Posta Adresiniz&rdquo;,&ldquo;Adresiniz&rdquo;, &ldquo;Yaşadığınız İl ve İl&ccedil;e&rdquo;
                                        ve &ldquo;Cep Telefonu&rdquo; gibi bilgileri &nbsp;&nbsp;&nbsp; HelloNewMedia
                                        &nbsp;&nbsp;&nbsp;&nbsp;ile kendi isteğiniz ile paylaşmaktasınız.</p>
                                </td>
                            </tr>
                            <tr>
                                <td width="210">
                                    <p><strong>G&ouml;rsel<br/> ve Multimedya Verileri</strong></p>
                                </td>
                                <td width="566">
                                    <p>HelloNewMedia &nbsp;&rsquo;dan &uuml;r&uuml;n veya hizmet almanız, eğitimlere,
                                        etkinliklere kaydolmanız, reklam veya pazarlama ilanlarına giriş/başvuru
                                        yapmanız, &uuml;ye veya kayıt olmanız&nbsp; ile birlikte fotoğraflarınızı,
                                        multimedya kayıtlarınızı ve &ccedil;alışmalarınıza ilişkin g&ouml;rselleri kendi
                                        isteğinizle&nbsp;&nbsp;&nbsp; HelloNewMedia &nbsp;&nbsp;ile paylaşmaktasınız.&nbsp;</p>
                                </td>
                            </tr>
                            <tr>
                                <td width="210">
                                    <p><strong>M&uuml;şteri İşlem Verileri</strong></p>
                                </td>
                                <td width="566">
                                    <p>HelloNewMedia &rsquo;dan &uuml;r&uuml;n veya hizmet almanız, eğitimlere,
                                        etkinliklere kaydolmanız, reklam veya pazarlama ilanlarına giriş/başvuru
                                        yapmanız, &uuml;ye veya kayıt olmanız&nbsp; ile birlikte &ccedil;ağrı merkezi
                                        kayıtları, fatura, senet, &ccedil;ek bilgileri gibi verileri kendi isteğinizle
                                        &nbsp;&nbsp; HelloNewMedia &nbsp;&nbsp; ile paylaşmaktasınız.</p>
                                </td>
                            </tr>
                            <tr>
                                <td width="210">
                                    <p><strong>Pazarlama Verileri</strong></p>
                                </td>
                                <td width="566">
                                    <p>HelloNewMedia &rsquo;dan &uuml;r&uuml;n veya hizmet almanız, eğitimlere,
                                        etkinliklere kaydolmanız, reklam veya pazarlama ilanlarına giriş/başvuru
                                        yapmanız, &uuml;ye veya kayıt olmanız&nbsp; ile birlikte alışveriş ge&ccedil;mişi
                                        bilgileri, anket, &ccedil;erez kayıtları, gibi verileri kendi isteğinizle &nbsp;&nbsp;
                                        HelloNewMedia &nbsp;&nbsp; ile paylaşmaktasınız.</p>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <table width="776" class="table-bordered table-sm">
                            <tbody>
                            <tr>
                                <td width="210">
                                    <p><strong>Kişisel Veriniz Olmayan ve Otomatik Olarak Topladığımız Bilgiler</strong>
                                    </p>
                                </td>
                                <td width="568">
                                    <p>&Ccedil;erezler veya diğer program ve yazılımlarımız vasıtasıyla site i&ccedil;i
                                        kullanımlarınıza bağlı olarak tıklama sayınız, sekmeleri a&ccedil;ma sıklığınız
                                        veya ilgi g&ouml;sterdiğiniz başlıklara ilişkin dijital ortamdaki
                                        davranışlarınız hakkında bilgi toplayabiliriz.</p>
                                </td>
                            </tr>
                            <tr>
                                <td width="210">
                                    <p><strong>Cihaz Bilgisi</strong></p>
                                </td>
                                <td width="568">
                                    <p>Kullandığınız elektronik cihazlar (bilgisayar, diz &uuml;st&uuml; bilgisayar,
                                        tabletler, akıllı telefonlar, akıllı televizyonlar vb.) &uuml;zerinden
                                        cihazınıza ait sizle eşleştirilemeyecek veya eşleştirilebilecek veriler (&ouml;rn.
                                        konum bilgisi gibi) toplayabiliriz.</p>
                                </td>
                            </tr>
                            <tr>
                                <td width="210">
                                    <p><strong>&Ccedil;erezler Bilgisi</strong></p>
                                </td>
                                <td width="568">
                                    <p>&Ccedil;erezler, bilgisayarınız ya da mobil cihazınız &uuml;zerinden ziyaret
                                        ettiğiniz internet siteleri tarafından cihazınıza veya ağ sunucusuna depolanan k&uuml;&ccedil;&uuml;k
                                        metin dosyalarıdır. İnternet sitelerinde yer alan &ccedil;erezlerde, t&uuml;r&uuml;ne
                                        bağlı olarak, siteyi ziyaret ettiğiniz cihazdaki tarama ve kullanım
                                        tercihlerinize ilişkin veriler toplanmaktadır. Bu veriler, eriştiğiniz sayfalar,
                                        incelediğiniz hizmet ve &uuml;r&uuml;nler, tercih ettiğiniz dil se&ccedil;eneği
                                        ve diğer tercihlerinize dair pek &ccedil;ok bilgiyi kapsamaktadır. Pek &ccedil;ok
                                        &ccedil;erez t&uuml;r&uuml;n&uuml; kullanıcılarımıza ve ziyaret&ccedil;ilerimize
                                        daha iyi bir deneyim yaşatmak amacıyla kullanmaktayız. Bu kapsamda;</p>
                                    <p>&bull; web sayfalarının d&uuml;zg&uuml;n &ccedil;alışabilmesi i&ccedil;in oturum,
                                        y&uuml;k dengeleme kullanıcı kimliği ve g&uuml;venlik &ccedil;erezleri gibi
                                        zorunlu ve &ouml;nemli olan &ccedil;erezleri,</p>
                                    <p>&bull; kullanıcıların, ziyaret&ccedil;ilerin tercihleri doğrultusunda kullanım
                                        verimliliğini arttıran parola, dil, konum, ge&ccedil;miş, flash ve mobil
                                        &ccedil;erezleri gibi tercihe ilişkin &ccedil;erezleri,</p>
                                    <p>&bull; analitik veri toplayarak web sayfasının ziyareti hakkında bilgi
                                        edinilebilmesini sağlayan işlevsel ve analitik &ccedil;erezleri,</p>
                                    <p>&bull; &ouml;zellikle reklamlar i&ccedil;in g&uuml;n&uuml;m&uuml;zde sıklıkla
                                        kullanılan reklam, pazar analizi, hedefleme, dolandırıcılık tespiti, kampanya
                                        promosyon &ccedil;erezlerini i&ccedil;eren hedefleme ve pazarlamaya ilişkin
                                        &ccedil;erezleri,</p>
                                    <p>&bull; genellikle web sayfalarına reklam alan sitelerde karşımıza &ccedil;ıkan
                                        başka bir web sayfasına ilişkin reklam veya eklentilerindeki &ccedil;erezleri i&ccedil;eren
                                        &uuml;&ccedil;&uuml;nc&uuml; parti &ccedil;erezleri web sayfamızda
                                        kullanmaktayız. Kullanıcının, işbu ayarları değiştirmediği s&uuml;rece &ccedil;erez
                                        kullanımına a&ccedil;ık onay verdiği kabul edilir.</p>
                                    <p>HelloNewMedia&nbsp;&uuml;zerinden 3. kişi internet siteleri veya mobil
                                        uygulamalara verilen linkler 3. kişilere ait internet sitelerine, portallara
                                        veya mobil uygulamalara linkler verebiliriz. Fakat bu sitelerde yer alan veya 3.
                                        kişilerin tabi olduğu gizlilik politikalarının uygulanması hususunda hi&ccedil;bir
                                        sorumluluğumuz bulunmamaktadır. 3. kişilere ait internet siteleri veya mobil
                                        uygulamalar kapsamındaki gizlilik politikaları işbu Kişisel Verilerin Korunması
                                        Politikası&rsquo;ndan farklı olabilir.</p>
                                </td>
                            </tr>
                            <tr>
                                <td width="210">
                                    <p><strong>Diğer Bilgiler</strong></p>
                                </td>
                                <td width="568">
                                    <p>Kullanıcı veya ziyaret&ccedil;i tarafından tercih edilen bilgileri
                                        Smatch(otomatik eşleştirme) bilgisi ve benzer diğer bilgileri&nbsp;HelloNewMedia&nbsp;ile
                                        kendi isteğiniz doğrultusunda paylaşmaktasınız.&nbsp;</p>
                                    <p>Kamuya ifşa etmeyi tercih ettiğiniz ve diğer &uuml;yelerin ulaşabileceği ve g&ouml;rebileceği
                                        şekilde bilgi veya verilerinizi paylaşmanız durumunda tarafınızdan ifşa edilmiş
                                        olarak kabul edilir ve istatistiki, reklam veya promosyonel ama&ccedil;larla
                                        kullanılabilir. İfşa ettiğiniz kişisel verilerinizin 3. kişiler veya başka
                                        siteler tarafından kullanıldığı hallerde herhangi bir sorumluluğumuz
                                        bulunmamaktadır.</p>
                                </td>
                            </tr>
                            <tr>
                                <td width="210">
                                    <p><strong>M&uuml;şteri İşlem</strong></p>
                                </td>
                                <td width="568">
                                    <p>Bu veri kategorisi &Ccedil;ağrı merkezi kayıtları, e-fatura/e-arşiv fatura,
                                        senet, &ccedil;ek bilgileri, Gişe dekontlarındaki bilgiler, Sipariş bilgisi,
                                        Talep bilgisi gibi veri t&uuml;rlerini ifade etmektedir.</p>
                                    <p>Bu veriler, bir s&ouml;zleşmenin kurulması veya ifasıyla doğrudan doğruya ilgili
                                        olması, veri sorumlusunun hukuki y&uuml;k&uuml;ml&uuml;l&uuml;ğ&uuml;n&uuml;
                                        yerine getirebilmesi i&ccedil;in zorunlu olması, s&ouml;zleşmenin taraflarına
                                        ait kişisel verilerin işlenmesinin gerekli olması,&nbsp; bir hakkın tesisi,
                                        kullanılması veya korunması i&ccedil;in veri işlemenin zorunlu olması ve veri
                                        sorumlusunun meşru menfaatleri i&ccedil;in veri işlenmesinin zorunlu olması
                                        sebepleriyle işlenmektedir</p>
                                </td>
                            </tr>
                            <tr>
                                <td width="210">
                                    <p><strong>Pazarlama</strong></p>
                                </td>
                                <td width="568">
                                    <p>Bu veri kategorisi Alışveriş ge&ccedil;mişi bilgileri, Anket, &Ccedil;erez
                                        kayıtları, Kampanya &ccedil;alışmasıyla elde edilen bilgiler gibi veri t&uuml;rlerini
                                        ifade etmektedir.</p>
                                    <p>Bu veriler, bir s&ouml;zleşmenin kurulması veya ifasıyla doğrudan doğruya ilgili
                                        olması, veri sorumlusunun hukuki y&uuml;k&uuml;ml&uuml;l&uuml;ğ&uuml;n&uuml;
                                        yerine getirebilmesi i&ccedil;in zorunlu olması, s&ouml;zleşmenin taraflarına
                                        ait kişisel verilerin işlenmesinin gerekli olması,&nbsp; bir hakkın tesisi,
                                        kullanılması veya korunması i&ccedil;in veri işlemenin zorunlu olması ve veri
                                        sorumlusunun meşru menfaatleri i&ccedil;in veri işlenmesinin zorunlu olması
                                        sebepleriyle işlenmektedir.</p>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <ol start="6">
                            <li><strong> Kişisel Veri Saklama ve İmha Politikası</strong></li>
                        </ol>
                        <p><strong>6.1. Ama&ccedil;</strong></p>
                        <p>HelloNewMedia, KVKK&rsquo;ya, ilgili y&ouml;netmeliklere ve sair kişisel verileri koruma,
                            işleme ve imha d&uuml;zenlemelerine uymayı taahh&uuml;t etmektedir.&nbsp;HelloNewMedia&nbsp;kişisel
                            verilerin silinmesi, yok edilmesi veya anonim hale getirilmesi hususlarında gerek KVKK&rsquo;nın
                            7. maddesi ve&nbsp; 28 Ekim 2017 tarihli ve 30224 sayılı kişisel verilerin silinmesi, yok
                            edilmesi veya anonim hale getirilmesi hakkındaki y&ouml;netmelik kapsamında ilgili kişileri
                            aydınlatmayı istemektedir.</p>
                        <p><strong>6.2. Tanımlar</strong></p>
                        <p><strong>İmha:</strong>&nbsp;Kişisel verilerin silinmesi, yok edilmesi veya anonim hale
                            getirilmesi.</p>
                        <p><strong>Kayıt Ortamı:</strong>&nbsp;Tamamen veya kısmen otomatik olan ya da herhangi bir veri
                            kayıt sisteminin par&ccedil;ası olmak kaydıyla otomatik olmayan yollarla işlenen kişisel
                            verilerin bulunduğu her t&uuml;rl&uuml; ortam.</p>
                        <p><strong>Kişisel Verilerin Anonim Hale Getirilmesi:</strong>&nbsp;Kişisel verilerin, başka
                            verilerle eşleştirilerek dahi hi&ccedil;bir surette kimliği belirli veya belirlenebilir bir
                            ger&ccedil;ek kişiyle ilişkilendirilemeyecek h&acirc;le getirilmesi.</p>
                        <p><strong>Kişisel Verilerin Silinmesi:</strong>&nbsp;Kişisel verilerin silinmesi; kişisel
                            verilerin İlgili Kullanıcılar i&ccedil;in hi&ccedil;bir şekilde erişilemez ve tekrar
                            kullanılamaz hale getirilmesi.</p>
                        <p><strong>Kişisel Verilerin Yok Edilmesi:</strong>&nbsp;Kişisel verilerin hi&ccedil; kimse
                            tarafından hi&ccedil;bir şekilde erişilemez, geri getirilemez ve tekrar kullanılamaz hale
                            getirilmesi işlemi.</p>
                        <p><strong>Periyodik İmha:&nbsp;</strong>Kanun&rsquo;da yer alan kişisel verilerin işlenme
                            şartlarının tamamının ortadan kalkması durumunda kişisel verileri saklama ve imha
                            politikasında belirtilen ve tekrar eden aralıklarla resen ger&ccedil;ekleştirilecek silme,
                            yok etme veya anonim hale getirme işlemi.</p>
                        <p><strong>6.3. Kapsam ve Kayıt Ortamları</strong></p>
                        <p>Kişisel verileriniz, ilgili yasal mevzuatlarda belirtilen saklama s&uuml;relerince, ilgili
                            yasal mevzuatlarda herhangi bir s&uuml;re belirlenmemişse işlenme ama&ccedil;larının gerekli
                            kıldığı s&uuml;re boyunca, HelloNewMedia&rsquo;ya&nbsp;kayıt olma veya HelloNewMedia&rsquo;nın&nbsp;hizmetlerinden
                            yararlanma s&uuml;recinde elde edilen kişisel veriler,&nbsp;kişisel veri envanterimiz ve
                            KVKK mevzuatında belirtilen y&uuml;k&uuml;ml&uuml;l&uuml;kler kapsamında saklanmakta ve
                            sonrasında KVKK&rsquo;ya uygun olarak silinmekte, yok edilmekte ya da anonim hale
                            getirilmektedir.</p>
                        <p><br/> Kişisel verilere ilişkin kayıt ortamlarımız aşağıdaki gibidir.</p>
                        <table width="763" class="table-bordered table-sm">
                            <tbody>
                            <tr>
                                <td width="369">
                                    <p>Elektronik Ortamlar</p>
                                </td>
                                <td width="395">
                                    <p>Elektronik Olmayan Ortamlar</p>
                                </td>
                            </tr>
                            <tr>
                                <td width="369">
                                    <p>Sunucular (Etki alanı, yedekleme, e-posta, veritabanı, web, dosya paylaşım,
                                        vb.)</p>
                                    <ul>
                                        <li>Yazılımlar&nbsp;(ofis yazılımları, portal, VERBİS.)</li>
                                        <li>Bilgi g&uuml;venliği cihazları (g&uuml;venlik duvarı, saldırı tespit ve
                                            engelleme,&nbsp;g&uuml;nl&uuml;k&nbsp;kayıt dosyası, antivir&uuml;s vb. )
                                        </li>
                                        <li>Kişisel bilgisayarlar (Masa&uuml;st&uuml;, diz&uuml;st&uuml;)</li>
                                        <li>Mobil cihazlar (telefon, tablet vb.)</li>
                                        <li>Optik diskler (CD, DVD vb.)</li>
                                        <li>&Ccedil;ıkartılabilir bellekler (USB, Hafıza Kart vb.)</li>
                                        <li>Yazıcı,&nbsp;tarayıcı, fotokopi makinesi</li>
                                    </ul>
                                </td>
                                <td width="395">
                                    <ul>
                                        <li>Eğitimler</li>
                                        <li>Kağıt</li>
                                        <li>Manuel veri kayıt sistemleri (anket formları, ziyaret&ccedil;i giriş
                                            defteri)
                                        </li>
                                        <li>Yazılı,&nbsp;basılı, g&ouml;rsel ortamlar</li>
                                    </ul>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <p><strong>6.4. Kişisel Verilerin Saklanmasında Hukuki ve Teknik Dayanaklar</strong></p>
                        <p>HelloNewMedia, KVKK&rsquo;nın 7. maddesi ve T&uuml;rk Ceza Kanunu&rsquo;nun 138. maddesi
                            uyarınca işlediği kişisel verileri yalnızca ilgili mevzuatta &ouml;ng&ouml;r&uuml;len veya
                            mevzuatta bir s&uuml;re &ouml;ng&ouml;r&uuml;lmemiş ise kişisel veri işleme amacının
                            gerektirdiği s&uuml;re kadar muhafaza eder. Kişisel verilerin işlenme amacı sona ermiş veya
                            saklama s&uuml;relerinin sonuna gelinmişse kişisel veriler yalnızca olası hukukun zorunlu g&ouml;rd&uuml;ğ&uuml;
                            ve gerektirdiği &ouml;l&ccedil;&uuml;de saklanabilecektir.</p>
                        <p>KVKK ve ilgili diğer kanun h&uuml;k&uuml;mlerine uygun olarak işlenmiş olan kişisel veriler,
                            işlenmesini gerektiren sebeplerin ortadan kalkması halinde resen veya ilgili kişinin talebi
                            &uuml;zerine&nbsp;HelloNewMedia&nbsp;tarafından, bu verilerin hi&ccedil;bir şekilde
                            kullanılmayacak ve geri getirilmeyecek şekilde silinmesi, yok edilmesi veya anonim hale
                            getirilmesi gerekmektedir. Kişisel verilerin hukuka uygun olarak yok edilmesi veya anonim
                            hale getirilmesine ilişkin usul ve esaslar y&ouml;netmelikte belirtilen ilke ve kurallara
                            uygun şekilde yerine getirilecektir.</p>
                        <p><strong>6.5. Kişisel Verilerin Saklanma ve İmha S&uuml;releri</strong></p>
                        <table width="719" class="table-bordered table-sm">
                            <tbody>
                            <tr>
                                <td width="281">
                                    <p><strong>Kayıtlar</strong></p>
                                </td>
                                <td width="244">
                                    <p><strong>S&uuml;re</strong></p>
                                </td>
                                <td width="194">
                                    <p><strong>Dayanak</strong></p>
                                </td>
                            </tr>
                            <tr>
                                <td width="281">
                                    <p>&Uuml;yelik ve satışlara ilişkin kayıtlar</p>
                                </td>
                                <td width="244">
                                    <p>10 yıl</p>
                                </td>
                                <td width="194">
                                    <p>6698 Sayılı Kanun</p>
                                </td>
                            </tr>
                            <tr>
                                <td width="281">
                                    <p>Muhasebe ve finansal işlemlere ilişkin t&uuml;m kayıtlar</p>
                                </td>
                                <td width="244">
                                    <p>10 yıl</p>
                                </td>
                                <td width="194">
                                    <p>6102 Sayılı Kanun, 213 Sayılı Kanun</p>
                                </td>
                            </tr>
                            <tr>
                                <td width="281">
                                    <p>&Ccedil;erezler</p>
                                </td>
                                <td width="244">
                                    <p>En fazla 540 g&uuml;n</p>
                                </td>
                                <td width="194">
                                    <p>AB &Ccedil;erez Yasası</p>
                                </td>
                            </tr>
                            <tr>
                                <td width="281">
                                    <p>Ticari elektronik ileti onay kayıtları</p>
                                </td>
                                <td width="244">
                                    <p>Onayın geri alındığı tarihten itibaren 3 yıl</p>
                                </td>
                                <td width="194">
                                    <p>6563 Sayılı Kanun ve ilgili ikincil mevzuat</p>
                                </td>
                            </tr>
                            <tr>
                                <td width="281">
                                    <p>&Ccedil;evrimi&ccedil;i ziyaret&ccedil;ilere ilişkin trafik bilgileri</p>
                                </td>
                                <td width="244">
                                    <p>2 yıl</p>
                                </td>
                                <td width="194">
                                    <p>5651 Sayılı Kanun</p>
                                </td>
                            </tr>
                            <tr>
                                <td width="281">
                                    <p>HelloNewMedia&rsquo;a&nbsp;&nbsp;ilişkin kişisel veriler</p>
                                </td>
                                <td width="244">
                                    <p>Hukuki ilişki sona erdikten sonra 10 yıl</p>
                                </td>
                                <td width="194">
                                    <p>6102 Sayılı Kanun, 6098 Sayılı Kanun ve 213 Sayılı Kanun</p>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <ol start="7">
                            <li><strong> Kişisel Verilere İlişkin Teknik ve İdari Tedbirler</strong></li>
                        </ol>
                        <p>KVKK&rsquo;nın 12. maddesi uyarınca, veri sorumlusu sıfatıyla&nbsp;HelloNewMedia&rsquo;nın&nbsp;veri
                            g&uuml;venliğine ilişkin y&uuml;k&uuml;ml&uuml;l&uuml;kleri;</p>
                        <ul>
                            <li>Kişisel verilerin;</li>
                            <li>Hukuka aykırı işlenmesini &ouml;nlemek,</li>
                            <li>Hukuka aykırı erişimi &ouml;nlemek,</li>
                            <li>Muhafazasını sağlamak i&ccedil;in her t&uuml;rl&uuml; teknik ve idari tedbir almak,</li>
                            <li>Kuruluşu i&ccedil;inde gerekli denetimleri yapmak veya yaptırmak şeklindedir.</li>
                        </ul>
                        <p>HelloNewMedia, yukarıdaki y&uuml;k&uuml;ml&uuml;l&uuml;klere uygun olarak veri işlenmesine ve
                            vergi g&uuml;venliğine dikkat etmektedir.&nbsp;HelloNewMedia&nbsp;b&uuml;nyesinde &ccedil;alışanların,
                            kişisel verileri 3. kişilerle paylaşmaması i&ccedil;in gerekli &ouml;nlemleri alır ve aksi
                            bir durumda ilgili kişiye ve Kurul&rsquo;a bildirimde bulunur.</p>
                        <p>HelloNewMedia&rsquo;da<strong>;</strong></p>
                        <ul>
                            <li>Ağ g&uuml;venliği ve uygulama g&uuml;venliği sağlanmaktadır.</li>
                            <li>Ağ yoluyla kişisel veri aktarımlarında kapalı sistem ağ kullanılmaktadır.</li>
                            <li>Anahtar y&ouml;netimi uygulanmaktadır.</li>
                            <li>Bilgi teknolojileri sistemleri tedarik, geliştirme ve bakımı kapsamındaki g&uuml;venlik
                                &ouml;nlemleri alınmaktadır.
                            </li>
                            <li>Bulutta depolanan kişisel verilerin g&uuml;venliği sağlanmaktadır.</li>
                            <li>&Ccedil;alışanlar i&ccedil;in veri g&uuml;venliği h&uuml;k&uuml;mleri i&ccedil;eren
                                disiplin d&uuml;zenlemeleri mevcuttur.
                            </li>
                            <li>&Ccedil;alışanlar i&ccedil;in veri g&uuml;venliği konusunda belli aralıklarla eğitim ve
                                farkındalık &ccedil;alışmaları yapılmaktadır.
                            </li>
                            <li>&Ccedil;alışanlar i&ccedil;in yetki matrisi oluşturulmuştur.</li>
                            <li>Erişim logları d&uuml;zenli olarak tutulmaktadır.</li>
                            <li>Erişim, bilgi g&uuml;venliği, kullanım, saklama ve imha konularında kurumsal politikalar
                                hazırlanmış ve uygulamaya başlanmıştır.
                            </li>
                            <li>Gerektiğinde veri maskeleme &ouml;nlemi uygulanmaktadır.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
                            <li>Gizlilik taahh&uuml;tnameleri yapılmaktadır.</li>
                            <li>G&ouml;rev değişikliği olan ya da işten ayrılan &ccedil;alışanların bu alandaki
                                yetkileri kaldırılmaktadır.
                            </li>
                            <li>G&uuml;ncel anti-vir&uuml;s sistemleri kullanılmaktadır.</li>
                            <li>G&uuml;venlik duvarları kullanılmaktadır.</li>
                            <li>İmzalanan s&ouml;zleşmeler veri g&uuml;venliği h&uuml;k&uuml;mleri
                                i&ccedil;ermektedir.
                            </li>
                            <li>Kağıt yoluyla aktarılan kişisel veriler i&ccedil;in ekstra g&uuml;venlik tedbirleri
                                alınmakta ve ilgili evrak gizlilik dereceli belge formatında g&ouml;nderilmektedir.
                            </li>
                            <li>Kişisel veri g&uuml;venliği politika ve prosed&uuml;rleri belirlenmiştir.</li>
                            <li>Kişisel veri g&uuml;venliği sorunları hızlı bir şekilde raporlanmaktadır.</li>
                            <li>Kişisel veri g&uuml;venliğinin takibi yapılmaktadır.</li>
                            <li>Kişisel veri i&ccedil;eren fiziksel ortamlara giriş &ccedil;ıkışlarla ilgili gerekli
                                &nbsp;&nbsp; g&uuml;venlik &ouml;nlemleri alınmaktadır.
                            </li>
                            <li>Kişisel veri i&ccedil;eren fiziksel ortamların dış risklere (yangın, sel vb.) karşı
                                &nbsp;&nbsp; g&uuml;venliği sağlanmaktadır.
                            </li>
                            <li>Kişisel veri i&ccedil;eren ortamların g&uuml;venliği sağlanmaktadır.</li>
                            <li>Kişisel veriler m&uuml;mk&uuml;n olduğunca azaltılmaktadır.</li>
                            <li>Kişisel veriler yedeklenmekte ve yedeklenen kişisel verilerin g&uuml;venliği de
                                sağlanmaktadır.
                            </li>
                            <li>Kullanıcı hesap y&ouml;netimi ve yetki kontrol sistemi uygulanmakta olup bunların takibi
                                de yapılmaktadır.
                            </li>
                            <li>Kurum i&ccedil;i periyodik ve/veya rastgele denetimler yapılmakta ve yaptırılmaktadır.
                            </li>
                            <li>Log kayıtları kullanıcı m&uuml;dahalesi olmayacak şekilde tutulmaktadır.</li>
                            <li>Mevcut risk ve tehditler belirlenmiştir.</li>
                            <li>&Ouml;zel nitelikli kişisel veri g&uuml;venliğine y&ouml;nelik protokol ve prosed&uuml;rler
                                belirlenmiş ve uygulanmaktadır.
                            </li>
                            <li>&Ouml;zel nitelikli kişisel veriler elektronik posta yoluyla g&ouml;nderilecekse mutlaka
                                şifreli olarak ve KEP veya kurumsal posta hesabı kullanılarak g&ouml;nderilmektedir.
                            </li>
                            <li>&Ouml;zel nitelikli kişisel veriler i&ccedil;in g&uuml;venli şifreleme / kriptografik
                                anahtarlar kullanılmakta ve farklı birimlerce y&ouml;netilmektedir.
                            </li>
                            <li>Saldırı tespit ve &ouml;nleme sistemleri kullanılmaktadır.</li>
                            <li>Sızma testi uygulanmaktadır.</li>
                            <li>Siber g&uuml;venlik &ouml;nlemleri alınmış olup uygulanması s&uuml;rekli takip
                                edilmektedir.
                            </li>
                            <li>Şifreleme yapılmaktadır.</li>
                            <li>Taşınabilir bellek, CD, DVD ortamında aktarılan &ouml;zel nitelikli kişiler veriler
                                şifrelenerek aktarılmaktadır.
                            </li>
                            <li>Veri işleyen hizmet sağlayıcılarının veri g&uuml;venliği konusunda belli aralıklarla
                                denetimi sağlanmaktadır.
                            </li>
                            <li>Veri işleyen hizmet sağlayıcılarının, veri g&uuml;venliği konusunda farkındalığı
                                sağlanmaktadır.
                            </li>
                            <li>Veri kaybı &ouml;nleme yazılımları kullanılmaktadır.</li>
                        </ul>
                        <p>HelloNewMedia, kanunda, kurul kararlarında belirtilen ve kişisel verilere hukuka aykırı
                            erişimi engellemek i&ccedil;in rehberlerde belirtilen teknik ve idari tedbirleri, &uuml;&ccedil;&uuml;nc&uuml;
                            kişilerin kişisel verilere ilişkin siber saldırıya ilişkin teknik ve idari t&uuml;m
                            tedbirleri almaktadır.&nbsp;HelloNewMedia, mevzuata uygun şekilde oluşturduğu veri
                            envanterinin g&uuml;venliğini, sistem ve yazılım g&uuml;venliğini denetler ve bu konuda
                            yetkili kılınan kişi veya istenilmesi halinde kurula raporlama yapar, kişisel verilerin
                            mevzuatlarda &ouml;ng&ouml;r&uuml;len şekilde korunmasını sağlar.</p>
                        <ol start="8">
                            <li><strong> Kişisel Verilerin G&uuml;ncel ve Doğru Tutulması</strong></li>
                        </ol>
                        <p>KVKK&rsquo;nın 4. maddesi uyarınca kişisel verilerinizi doğru ve g&uuml;ncel olarak tutma y&uuml;k&uuml;ml&uuml;l&uuml;ğ&uuml;
                            bulunmaktadır. Bu kapsamda&nbsp;web sitesi&nbsp;/mobil uygulama &uuml;zerinden&nbsp;y&uuml;r&uuml;rl&uuml;kteki
                            mevzuattan doğan y&uuml;k&uuml;ml&uuml;l&uuml;klerini yerine getirebilmesi i&ccedil;in
                            &uuml;yelerimizin doğru ve g&uuml;ncel verilerini paylaşması veya web sitesi / mobil
                            uygulama &uuml;zerinden g&uuml;ncellemesi gerekmektedir.</p>
                        <ol start="9">
                            <li><strong> İlgili Kişi&rsquo;nin Hakları</strong></li>
                        </ol>
                        <p>6698 sayılı KVKK 11. Maddesi 07 Ekim 2016 tarihinde y&uuml;r&uuml;rl&uuml;ğe girmiş olup
                            ilgili madde gereğince, İlgili Kişi&rsquo;nin bu tarihten sonraki hakları aşağıdaki
                            gibidir:</p>
                        <p>İlgili Kişi,&nbsp;HelloNewMedia&rsquo;ya&nbsp;başvurarak kendisiyle ilgili;</p>
                        <ol>
                            <li>Kişisel veri işlenip işlenmediğini &ouml;ğrenme,</li>
                            <li>Kişisel verileri işlenmişse buna ilişkin bilgi talep etme,</li>
                            <li>Kişisel verilerin işlenme amacını ve bunların amacına uygun kullanılıp kullanılmadığını
                                &ouml;ğrenme,
                            </li>
                            <li>Yurt&nbsp;i&ccedil;inde kişisel verilerin aktarıldığı &uuml;&ccedil;&uuml;nc&uuml;
                                kişileri bilme,
                            </li>
                            <li>Kişisel verilerin eksik veya yanlış işlenmiş olması h&acirc;linde bunların d&uuml;zeltilmesini
                                isteme,
                            </li>
                            <li>KVKK&rsquo;nun 7. Maddesinde &ouml;ng&ouml;r&uuml;len şartlar &ccedil;er&ccedil;evesinde
                                kişisel verilerin silinmesini veya yok edilmesini isteme,
                            </li>
                            <li>Kişisel verilerin d&uuml;zeltilmesi, silinmesi, yok edilmesi halinde bu işlemlerin,
                                kişisel verilerin aktarıldığı &uuml;&ccedil;&uuml;nc&uuml; kişilere de bildirilmesini
                                isteme,
                            </li>
                            <li>İşlenen verilerin m&uuml;nhasıran otomatik sistemler vasıtasıyla analiz edilmesi
                                suretiyle kişinin kendisi aleyhine bir sonucun ortaya &ccedil;ıkmasına itiraz etme,
                            </li>
                            <li>Kişisel verilerin kanuna aykırı olarak işlenmesi sebebiyle zarara uğraması h&acirc;linde
                                zararın giderilmesini talep etme, haklarına sahiptir.
                            </li>
                            <li><strong> Veri Sorumlusu&rsquo;na Başvuru ve Başvuru Y&ouml;ntemi</strong></li>
                        </ol>
                        <p>Kişisel Veri Sahipleri,&nbsp;bu politikada yer alan ve y&uuml;r&uuml;rl&uuml;kte olan mevzuat
                            h&uuml;k&uuml;mlerinde belirtilen haklarını kullanmak i&ccedil;in ve&nbsp;sorularını, g&ouml;r&uuml;şlerini
                            veya taleplerini&nbsp;kvkk@hellonewmedia.com&nbsp;e-posta adresine&nbsp;ya da ıslak imzalı
                            olarak &ldquo;Maslak Mah. AOS 55. Sok. 42 MASLAK No:2 İ&ccedil; Kapı No: 25 Maslak /
                            İSTANBUL&rdquo; adresine g&ouml;nderebilirler.</p>
                        <p>Bu &ccedil;er&ccedil;evede &ldquo;yazılı&rdquo; olarak şirketimize yapılacak başvurular, işbu
                            formun &ccedil;ıktısı alınarak;</p>
                        <ul>
                            <li>Başvuru sahibinin şahsen başvurusu ile,</li>
                            <li>Noter vasıtasıyla,</li>
                            <li>Başvuru sahibince 5070 sayılı Elektronik İmza Kanunu&rsquo;nda tanımlı olan &ldquo;g&uuml;venli
                                elektronik imza&rdquo; ile imzalanarak Şirketimiz kayıtlı elektronik posta adresine g&ouml;nderilmek
                                suretiyle tarafımıza iletilebilecektir.
                            </li>
                        </ul>
                        <p>Yukarıda belirtilen y&ouml;ntemlerden biri ile iletilen veri sahibi talepleri, azami otuz
                            (30) g&uuml;n i&ccedil;erisinde değerlendirilmekte ve&nbsp;olumlu/olumsuz yanıtını, yazılı
                            veya dijital ortamdan verebilir. Başvuru sahibinin ilgili veri sahibi olup olmadığının
                            değerlendirilmesi amacıyla başvuru sahibinden ek bilgi ve belge talep etme hakkı saklıdır.&nbsp;Bu
                            &uuml;cretler, Kişisel Verilerin Korunması Kurulu tarafından, Kişisel Verilerin korunması
                            Kanunu&rsquo;nun 13. maddesine g&ouml;re belirlenen tarife &uuml;zerinden belirlenir.&nbsp;Veri
                            sahibinin başvuruları &uuml;cretsiz olarak değerlendirilmektedir. Ancak, işlemin ayrıca bir
                            maliyet gerektirmesi halinde KVK Kurulu&rsquo;nca belirlenen &uuml;cret alınır.</p>
                        <p>Web sayfamız/mobil uygulamalarımızda ve diğer sair kanallarımızda kişisel verilerinizi
                            paylaşarak Kişisel Veriler Politikamızı ve politikamızda yer alan işlenme, işlenme y&ouml;ntemleri,
                            verilerin aktarılması, satışı ve diğer ilgili hususlar hakkındaki şartları,&nbsp;<a
                                    href="https://www.hellonewmedia.com/">https://www.hellonewmedia.com/</a> &nbsp;ile
                            paylaşılan verilerin web sayfasında, mobil uygulamalarda ve sosyal medya kanallarında
                            kullanılmasını, bildirimlerde ve &ouml;nerilerde bulunulmasını, &uuml;yelerin yararına
                            olması şartıyla ticari anlamda &uuml;&ccedil;&uuml;nc&uuml; kişilerle paylaşılabileceğini ve
                            yine bunun i&ccedil;in kabulde bulunduğunuzu, yasal haklarınızı kullanmadan &ouml;nce&nbsp;Bet&uuml;l
                            G&uuml;naydın Yılmaz&rsquo;a başvuruda bulunacağınızı KVKK&rsquo;da b&uuml;y&uuml;k &ouml;neme
                            haiz, belirli bir konuya ilişkin, bilgilendirilmeye dayanan ve &ouml;zg&uuml;r iradeyle a&ccedil;ıklanan
                            rıza şeklinde tanımlanan a&ccedil;ık bir rıza ile kabul ettiğinizi beyan etmiş olursunuz.
                        </p>
                        <p><strong>Şirket Bilgilerimiz</strong></p>
                        <p>Ticaret Unvanı&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : BET&Uuml;L G&Uuml;NAYDIN
                            YILMAZ<br/> Adres&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : Maslak Mah. AOS 55. Sok. 42
                            MASLAK No:2 İ&ccedil; Kapı No: 25 Maslak / İSTANBUL<br/> Mersis No&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :&nbsp; <br/> Kep Adresi&nbsp;
                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; :&nbsp;betul.gunaydinyilmaz@hs01.kep.tr<br/>
                            Mail Adresi&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :&nbsp;kvkk@hellonewmedia.com
                        </p>
                        <p>Web Sayfası&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
                            <a href="http://www.hellonewmedia.com">www.hellonewmedia.com</a> &nbsp;<br/> Telefon&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp; : +90 545 957 25 01</p>
                        <ol start="10">
                            <li><strong> Y&uuml;r&uuml;rl&uuml;k</strong></li>
                        </ol>
                        <p>İşbu Politika yayınlandığı tarihte y&uuml;r&uuml;rl&uuml;ğe girer ve internet sitesinden
                            kaldırılana kadar y&uuml;r&uuml;rl&uuml;kte kalmaya devam eder. İnternet Sitesi Kişisel
                            Verilerin Korunması ve Veri Politikamız 01.01.2024 tarihlidir. Politika&rsquo;nın t&uuml;m&uuml;n&uuml;n
                            veya belirli maddelerinin yenilenmesi durumunda Politika&rsquo;nın y&uuml;r&uuml;rl&uuml;k
                            tarihi g&uuml;ncellenecektir.</p>
                        <p>&nbsp;</p>


                    </article><!-- End blog entry -->

                </div><!-- End blog entries list -->

            </div>

        </div>
    </section><!-- End Blog Single Section -->
@endsection


@section('js')
@endsection
