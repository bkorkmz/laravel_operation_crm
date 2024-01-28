@extends('theme1.layout')

@section('title',"Çerezler ve Gizlilik Politikamız")

@section('head')

    <meta name="googlebot" content="noindex, nofollow">
    <meta name="robots" content="noindex, nofollow">
    <meta name="bingbot" content="noindex, nofollow">
    <meta name="title" content="Çerezler ve Gizlilik Politikamız">
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Webpage",
            "url": "{{request()->fullUrl()}}"
            "name": "Çerezler ve Gizlilik Politikamız",
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
            "name": "Çerezler ve Gizlilik Politikamız",
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
            box-shadow:0 0px 0px rgba(0, 0, 0, 0.1)!important;
        }
    </style>
@endsection


@section('breadcrumbs')
    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="/">Anasayfa</a></li>
                <li>Çerezler ve Gizlilik Politikamız</li>
            </ol>
            <h1>{{ "Çerezler ve Gizlilik Politikamız" }}</h1>

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
                            <a >Çerezler ve Gizlilik Politikamız</a>
                        </h2>
                        <br />



                        <ol>
                            <li><strong>&Ccedil;EREZLER İLE İLGİLİ VERİ SORUMLUSU SIFATIYLA BİLGİLENDİRME</strong></li>
                        </ol>

                        <p>www.hellonewmedia.com web sayfasını ziyaret eden veyahut kayıt olan siz değerli kullanıcılarımıza (&ldquo;Kullanıcılar&rdquo;)<strong>&nbsp;</strong>tercihe dayalı akıllı se&ccedil;enekler ve daha iyi bir kullanım deneyimi sunmak i&ccedil;in &ccedil;erezlerden yararlanmaktadır.&nbsp;&Ccedil;erez veyahut bir diğer adıyla &quot;Cookie&quot; adlı teknoloji ile ama&ccedil;lanan, Kullanıcılar&rsquo;ın ziyaret ettikleri b&ouml;l&uuml;mlere ait i&ccedil;eriği, siteye ilk ziyaretlerinden itibaren Kullanıcılar i&ccedil;in daha kolay ve ulaşılır kılmaktır.</p>

                        <p>&Ccedil;erezler, sitemizi ziyaret ettiğinizde cihazınıza eklenen ve bilgiler i&ccedil;eren k&uuml;&ccedil;&uuml;k elektronik dosyalardır.&nbsp;&Ccedil;erez kullanmaksızın web sayfamızın t&uuml;m işlevlerini etkin tutmamız ve sizlerin bunlardan yararlanmanız m&uuml;mk&uuml;n olmamaktadır. Tarayıcıların pek &ccedil;oğu başta teknik iletişim dosyası olan bu &ccedil;erezleri kabul eder bi&ccedil;imde tasarlanmıştır, ancak Kullanıcılar dilerse &ccedil;erezlerin kullanılmamasını sağlayacak bi&ccedil;imde tarayıcı ayarlarını her zaman i&ccedil;in değiştirebilirler.</p>

                        <p>www.hellonewmedia.com Kullanıcılar&rsquo;ın 6698 sayılı Kişisel Verilerin Korunması Kanunu&rsquo;ndan ve sair d&uuml;zenlemelerden doğan kişisel verilerinin korunması haklarını, gizliliğini ve g&uuml;venliğini g&ouml;zetmektedir.&nbsp;&nbsp;İşbu &ccedil;erez politikası, Kullanıcılar&rsquo;ımıza hangi t&uuml;r &ccedil;erezlerin hangi koşullarda kullanıldığını ve bu kapsamdaki haklarını a&ccedil;ıklamak &uuml;zere hazırlanmıştır. &Ccedil;erez politikamızı kabul ederek aşağıdaki t&uuml;m hususları da kabul etmiş sayılırsınız. &Ccedil;erez kullanımını onaylamıyorsanız web sitesine devam etmemenizi ya da tarayıcınızdan &ccedil;erez tercihlerinizi değiştirmenizi rica ederiz. Politikamız ile ilgili olarak geri d&ouml;n&uuml;şlerinizi ve haklarınız doğrultusundaki taleplerinizi tarafımıza iletebilirsiniz.</p>

                        <ol>
                            <li><strong>&Ccedil;EREZ NEDİR VE NASIL &Ccedil;ALIŞIR?</strong></li>
                        </ol>

                        <p>&Ccedil;erezler, bilgisayarınız ya da mobil cihazınız &uuml;zerinden ziyaret ettiğiniz internet siteleri tarafından cihazınıza veya ağ sunucusuna depolanan k&uuml;&ccedil;&uuml;k metin dosyalarıdır.</p>

                        <p>Kullanıcılar bir web sayfasına girdiğinde sunucuda sitenin g&ouml;r&uuml;nt&uuml;lenmesini talep etmiş olurlar (HTTP request), bu taleplere karşılık sunucu siteyi kullanıcıya g&ouml;nderir. (HTTP response). Talep ve talebe cevap olarak web sayfasının g&ouml;r&uuml;nt&uuml;lenmesi aşamasından itibaren &ccedil;erezlerle siteyi kullanmanız m&uuml;mk&uuml;n olur.</p>

                        <ul>
                            <li><strong>&Ccedil;EREZLERİN KULLANIM AMA&Ccedil;LARI</strong></li>
                        </ul>

                        <p>www.hellonewmedia.com., &ccedil;erezleri;</p>

                        <ul>
                            <li>Web sayfasının d&uuml;zg&uuml;n bir şekilde &ccedil;alışması,</li>
                            <li>Web sayfasına bir sonraki girişin daha hızlı ve kolay olması,</li>
                            <li>Kullanıcıların bazı &ouml;zelliklere erişiminin kolaylaştırılması,</li>
                            <li>İlgiye dayalı reklam sunulması,</li>
                            <li>Web sayfası &uuml;zerinden push notificationlar ile işlevselleştirmenin sağlanması,</li>
                            <li>Mobil uygulama ve web sayfası &uuml;zerinden yeni &ouml;zellikler sunmak ve &ouml;zellikleri tercihlerinize g&ouml;re kişiselleştirilmesi,</li>
                            <li>Sizin ve şirketimizin hukuki ve ticari g&uuml;venliğin sağlanması,</li>
                            <li>İstenilmesi halinde parolanızın kaydedilmesiyle erişim kolaylığı sağlanması,</li>
                            <li>Web sayfası a&ccedil;ısından analitik verilerin elde edilmesi,</li>
                            <li>Web sayfası &uuml;zerinden sahte işlemlerin ger&ccedil;ekleştirilmesinin &ouml;nlenmesi,</li>
                            <li>5651 sayılı Internet Ortamında Yapılan Yayınların D&uuml;zenlenmesi ve Bu Yayınlar Yoluyla İşlenen Su&ccedil;larla M&uuml;cadele Edilmesi Hakkında Kanun ve Internet Ortamında Yapılan Yayınların D&uuml;zenlenmesine Dair Usul ve Esaslar Hakkında Y&ouml;netmelik&#39;ten kaynaklananlar başta olmak &uuml;zere, kanuni ve s&ouml;zleşmesel y&uuml;k&uuml;ml&uuml;l&uuml;klerin yerine getirilmesi ama&ccedil;larıyla kullanmaktadır.</li>
                        </ul>

                        <ol>
                            <li><strong>HELLONEWMEDIAHANGİ &Ccedil;EREZ T&Uuml;RLERİNİ KULLANIR?</strong></li>
                        </ol>

                        <p>Aşağıdaki tablodan da anlaşılacağı &uuml;zere pek &ccedil;ok &ccedil;erez t&uuml;r&uuml;n&uuml; Kullanıcılar&rsquo;ımıza daha iyi bir deneyim yaşatmak amacıyla kullanmaktayız. Bu &ccedil;erez t&uuml;rlerini kullanırken de bir&ccedil;ok &ccedil;evrimi&ccedil;i ara&ccedil;tan faydalanmaktayız.&nbsp;Bu kapsamda;</p>

                        <ul>
                            <li>Web sayfalarının d&uuml;zg&uuml;n &ccedil;alışabilmesi i&ccedil;in oturum, y&uuml;k dengeleme kullanıcı kimliği ve g&uuml;venlik &ccedil;erezleri gibi&nbsp;<strong>zorunlu ve &ouml;nemli olan &ccedil;erezleri,</strong></li>
                            <li>Kullanıcılar&rsquo;ın tercihleri doğrultusunda kullanım verimliliğini arttıran parola, dil, konum, ge&ccedil;miş, flash ve mobil &ccedil;erezleri gibi&nbsp;<strong>tercihe ilişkin &ccedil;erezleri</strong>,</li>
                            <li>Analitik veri toplayarak web sayfasının ziyareti hakkında bilgi edinilebilmesini sağlayan&nbsp;<strong>işlevsel ve analitik &ccedil;erezleri</strong>,</li>
                            <li>&Ouml;zellikle reklamlar i&ccedil;in g&uuml;n&uuml;m&uuml;zde sıklıkla kullanılan reklam, pazar analizi, hedefleme, dolandırıcılık tespiti, kampanya promosyon &ccedil;erezlerini i&ccedil;eren&nbsp;<strong>hedefleme ve pazarlamaya ilişkin &ccedil;erezleri,</strong></li>
                            <li>Genellikle web sayfalarına reklam alan sitelerde karşımıza &ccedil;ıkan başka bir web sayfasına ilişkin reklam veya eklentilerindeki &ccedil;erezleri i&ccedil;eren<strong>&nbsp;&uuml;&ccedil;&uuml;nc&uuml; parti &ccedil;erezleri&nbsp;</strong>web sayfamızda kullanmaktayız. Bu &ccedil;erezlere ilişkin bilgiler aşağıdaki tablodadır.</li>
                        </ul>

                        <table class="table-bordered table-sm">
                            <tbody>
                            <tr>
                                <td>
                                    <p><strong>&Ccedil;erez T&uuml;r&uuml;</strong></p>
                                </td>
                                <td>
                                    <p><strong>&Ccedil;erezin İşlevi</strong></p>
                                </td>
                                <td>
                                    <p><strong>&Ccedil;erezin Veriler A&ccedil;ısından A&ccedil;ıklaması</strong></p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>Oturum &Ccedil;erezleri</p>
                                </td>
                                <td>
                                    <p>www.hellonewmedia.com&nbsp;kullanılırken web sayfasının işlevsel bir şekilde &ccedil;alışmasını sağlar.</p>
                                </td>
                                <td>
                                    <p>Oturum &ccedil;erezleri Kullanıcılar&rsquo;ın web sayfasını ziyaret ettikleri sırada kullanılan, browser kapatıldıktan sonra silinen ge&ccedil;ici &ccedil;erezlerdir.</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>Zorunlu &Ccedil;erezler</p>
                                </td>
                                <td>
                                    <p>Zorunlu &ccedil;erezler web sitelerinin d&uuml;zg&uuml;n bir şekilde &ccedil;alışabilmesi i&ccedil;in gereklidir, sitelerimizde gezinmenizi ve site &ouml;zelliklerinden faydalanmanızı sağlarlar. Kullanıcı hesabı oluşturmanıza, giriş yapmanıza ve web sitemizde gezinti yapmanıza olanak sağlar.</p>
                                </td>
                                <td>
                                    <p>Zorunlu &ccedil;erezler kimliğinizi tanımlamaz. Eğer bu &ccedil;erezleri kabul etmezseniz, web sitesindeki veya sitenin bazı b&ouml;l&uuml;mlerindeki performans etkilenebilir.</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>Kalıcı &Ccedil;erezler</p>
                                </td>
                                <td>
                                    <p>Kalıcı &ccedil;erezler</p>

                                    <p><a href="http://www.hellonewmedia.com">www.hellonewmedia.com</a>. <strong>&rsquo;</strong>daki tercihlerinizi hatırlamak i&ccedil;in kullanılır ve tarayıcılar vasıtasıyla cihazınızda depolanır.</p>
                                </td>
                                <td>
                                    <p>Kalıcı &ccedil;erezler tarayıcı veya uygulamayı kapattıktan sonra bilgisayar/ mobil cihazda kalır ve&nbsp;www.hellonewmedia.com&rsquo; a bir sonraki girişinizde tekrar kullanılır.</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>Performans &Ccedil;erezleri</p>
                                </td>
                                <td>
                                    <p>Bu &ccedil;erezler ziyaret edilen alanlar, sitede ge&ccedil;irilen zaman ve karşılaşılan 404 hataları gibi sorunlar hakkında bilgiler sağlayarak ziyaret&ccedil;ilerin web sitemizle nasıl bir etkileşime girdiğini anlamamıza yardımcı olur.</p>
                                </td>
                                <td>
                                    <p>Bu &ccedil;erezler kimliğinizi tanımlamaz. T&uuml;m veriler isimsiz bir şekilde alınır ve bir araya getirilir.</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>İşlevsellik &Ccedil;erezleri</p>
                                </td>
                                <td>
                                    <p>Bu &ccedil;erezler, daha &ouml;zelleştirilmiş bir web sayfası deneyimi i&ccedil;in, web sitemizde tercihlerinizin hatırlamasını sağlar. &Ccedil;erezler aynı zamanda ziyaret&ccedil;ilerin video izleyebilmelerini, oyun oynayabilmelerini ve bloglar, sohbet odaları ve forumlar gibi sosyal ara&ccedil;ları kullanabilmelerini sağlar.</p>
                                </td>
                                <td>
                                    <p>Bu &ccedil;erezlerin topladığı bilgiler, kullanıcı adınız veya profil resminiz gibi kimliğinizi tanımlayabilecek gizli verileri i&ccedil;erebilir. Eğer bu &ccedil;erezleri kabul etmezseniz, web sitesinin performans ve işlevselliği etkilenebilir ve web sitesindeki bazı i&ccedil;eriklere erişim sağlanamayabilir.</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>Hedefleme/ Reklam &Ccedil;erezleri</p>
                                </td>
                                <td>
                                    <p>Bu &ccedil;erezler size ve ilgi alanlarınıza yakın olan i&ccedil;erikleri sunmak amacıyla kullanılır. Hedefli reklamlar sunmak veya bir reklamın size g&ouml;r&uuml;nt&uuml;lenme sayısını kısıtlamak amacıyla kullanılabilir. Bu &ccedil;erezleri, ziyaret ettiğiniz web sitelerini hatırlamak amacıyla kullanabilir ve bu bilgileri reklam verenler ve kendi firmalarımız dahil olmak &uuml;zere &uuml;&ccedil;&uuml;nc&uuml; partilerle paylaşabiliriz.</p>
                                </td>
                                <td>
                                    <p>Bu &ccedil;erezler bir&ccedil;ok t&uuml;r&uuml;, t&uuml;keticileri IP adresleri ile takip ederek kimlik tanımlayıcı bilgiler toplayabilir.</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>Push Notifications</p>
                                </td>
                                <td>
                                    <p>Tarayıcı ve mobil cihaz bildirimleri g&ouml;nderimi i&ccedil;eren &ccedil;erezlerdir.</p>

                                    <p>.</p>
                                </td>
                                <td>
                                    <p>Masa&uuml;st&uuml; (internet tarayıcınıza) ve mobil cihazlarınıza bildirim g&ouml;ndermek i&ccedil;in &uuml;&ccedil;&uuml;nc&uuml; taraf hizmetlerini kullanmaktayız</p>
                                </td>
                            </tr>
                            </tbody>
                        </table>

                        <br>
                        <p><strong>Hellonewmedia&nbsp;</strong>&nbsp;web sayfasındaki &ccedil;erezlere ilişkin bilgiler aşağıdaki tablolarda yer almaktadır</p>

                        <table style="width:100%" class="table-bordered table-sm">
                            <tbody>
                            <tr>
                                <td>
                                    <p><strong>&Ccedil;erez Adı</strong></p>
                                </td>
                                <td>
                                    <p><strong>&Ccedil;erez A&ccedil;ıklaması</strong></p>
                                </td>
                                <td>
                                    <p><strong>&Ccedil;erezin T&uuml;r&uuml;</strong></p>
                                </td>
                                <td>
                                    <p><strong>Domain</strong></p>
                                </td>
                                <td>
                                    <p><strong>Saklama S&uuml;resi</strong></p>
                                </td>
                            </tr>
                            <tr>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>


                            </tbody>
                        </table>

                        <br>
                        <ol>
                            <li><strong>&Ccedil;EREZLERİN ENGELLENMESİ</strong></li>
                        </ol>

                        <p><strong>&Ccedil;erezler Engellenebilir mi?</strong></p>

                        <p>&Ccedil;erezlerin kullanımına ilişkin tercihlerinizi değiştirmek ya da &ccedil;erezleri engellemek veya silmek i&ccedil;in tarayıcınızın ayarlarını değiştirmeniz yeterlidir. &Ccedil;erezleri devre dışı bırakır veya reddederseniz, hesabınız/hesaplarınız sistem tarafından tanınamayacağı ve ilişkilendirilemeyeceği i&ccedil;in web sitelerimizdeki bazı &ouml;zelliklerin ve hizmetlerin d&uuml;zg&uuml;n &ccedil;alışmayacağını belirtmek gerekir.<br />
                            &nbsp;</p>

                        <p><strong>&Ccedil;erezlerin Kullanılmasını Nasıl Engelleyebilirsiniz?</strong></p>

                        <p>&Ccedil;oğu tarayıcı &ccedil;erezleri otomatik olarak kabul eder. Ancak dilerseniz &ccedil;erezleri tarayıcınızın ayarlarını değiştirerek reddedebilirsiniz. &Ccedil;erezleri reddettiğiniz takdirde sitemizdeki bazı &ouml;zelliklerin ve hizmetlerin d&uuml;zg&uuml;n &ccedil;alışamayabileceğini, sitemizin kişiselleştirilemeyebileceğini ve sizin deneyiminize g&ouml;re &ouml;zelleştirilemeyeceğini l&uuml;tfen unutmayınız.</p>

                        <p>Tarayıcınızın ayarlarını değiştirerek &ccedil;erezlere ilişkin tercihlerinizi kişiselleştirme imkanına sahipsiniz. Tarayıcı &uuml;reticileri, kendi &uuml;r&uuml;nlerinde &ccedil;erezlerin y&ouml;netimi ile ilgili yardım sayfaları sunmaktadır. Daha fazla bilgi i&ccedil;in l&uuml;tfen tıklayınız:</p>

                        <p><strong>Google Chrome:&nbsp;</strong><a href="https://support.google.com/chrome/answer/95647?hl=tr">https://support.google.com/chrome/answer/95647?hl=tr</a></p>

                        <p><strong>Mozilla Firefox:&nbsp;</strong><a href="https://support.mozilla.org/tr/kb/%C3%87erezleri%20engellemek">https://support.mozilla.org/tr/kb/%C3%87erezleri%20engellemek</a></p>

                        <p><strong>Internet Explorer:&nbsp;</strong><a href="https://support.microsoft.com/tr-tr/help/17442/windows-internet-explorer-delete-manage-cookies">https://support.microsoft.com/tr-tr/help/17442/windows-internet-explorer-delete-manage-cookies</a></p>

                        <p><strong>Opera:</strong><a href="https://www.opera.com/tr/help"><u>https://www.opera.com/tr/help</u></a><br />
                            <br />
                            <strong>Opera Mobil:</strong>&nbsp;<a href="https://www.opera.com/tr/help/mobile/android"><u>https://www.opera.com/tr/help/mobile/android</u></a><br />
                            <br />
                            <strong>Safari Bilgisayar:</strong>&nbsp;<a href="https://support.apple.com/kb/PH19214?locale=tr_TR&amp;viewlocale=tr_TR"><u>https://support.apple.com/kb/PH19214?locale=tr_TR&amp;viewlocale=tr_TR</u></a><br />
                            <br />
                            <strong>Safari Mobil:</strong>&nbsp;<a href="https://support.apple.com/tr-tr/HT201265"><u>https://support.apple.com/tr-tr/HT201265</u></a></p>

                        <ol>
                            <li><strong>&Ccedil;EREZ POLİTİKASININ Y&Uuml;R&Uuml;RL&Uuml;Ğ&Uuml;</strong></li>
                        </ol>

                        <p><strong>www.hellonewmedia.com&nbsp;</strong>işbu &ccedil;erez politikasında dilediği zaman değişiklik yapabilir. İşbu &ccedil;erez politikası 01.01.2024 tarihlidir. Politika&rsquo;nın t&uuml;m&uuml;n&uuml;n veya belirli maddelerinin yenilenmesi durumunda Politika&rsquo;nın y&uuml;r&uuml;rl&uuml;k tarihi g&uuml;ncellenecektir.</p>

                        <p>Ticaret Unvanı&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : BET&Uuml;L G&Uuml;NAYDIN YILMAZ<br />
                            Adres&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :&nbsp;Maslak Mah. AOS 55. Sok. 42 MASLAK No:2 İ&ccedil; Kapı No: 25 Maslak / İSTANBUL<br />
                            Mersis No&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :<br />
                            Kep Adresi&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :&nbsp;betul.gunaydinyilmaz@hs01.kep.tr<br />
                            Mail Adresi&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; :&nbsp;<a href="mailto:kvkk@hellonewmedia.com">kvkk@hellonewmedia.com</a></p>

                        <p>Web Sayfası&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; : www.hellonewmedia.com&nbsp;<br />
                            Telefon&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; : +90 545 957 25 01</p>

                        <p>&nbsp;</p>




                    </article><!-- End blog entry -->

                </div><!-- End blog entries list -->

            </div>

        </div>
    </section><!-- End Blog Single Section -->
@endsection


@section('js')
@endsection
