<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

            $city =[
               ['id' => '1','name' =>  'Adana','content' => 'Seyhan,Ceyhan ,Feke ,Karaisalı ,Karataş ,Kozan ,Pozantı ,Saimbeyli ,Tufanbeyli ,Yumurtalık ,Yüreğir ,Aladağ ,İmamoğlu ,Sarıçam ,Çukurova'],
               ['id' => '2','name' =>  'Adıyaman','content' => 'Adıyaman Merkez,Besni ,Çelikhan,Gerger,Gölbaşı - Adıyaman,Kahta,Samsat,Sincik,Tut,'],
               ['id' => '3','name' =>  'Afyonkarahisar','content' => 'Afyonkarahisar Merkez,Bolvadin,Çay,Dazkırı,Dinar,Emirdağ,İhsaniye,Sandıklı,Sinanpaşa,Sultandağı,Şuhut,Başmakçı,Bayat - Afyonkarahisar,İscehisar,Çobanlar,Evciler,Hocalar,Kızılören,'],
               ['id' => '4','name' =>  'Ağrı','content' => 'Ağrı Merkez,Diyadin,Doğubayazıt,Eleşkirt,Hamur,Patnos,Taşlıçay,Tutak,'],
               ['id' => '5','name' =>  'Amasya','content' => 'Amasya Merkez,Göynücek,Gümüşhacıköy,Merzifon,Suluova,Taşova,Hamamözü,'],
               ['id' => '6','name' =>  'Ankara','content' => 'Altındağ,Ayaş,Bala,Beypazarı,Çamlıdere,Çankaya,Çubuk,Elmadağ,Güdül,Haymana,Kalecik,Kızılcahamam,Nallıhan,Polatlı,Şereflikoçhisar,Yenimahalle,Gölbaşı - Ankara,Keçiören,Mamak,Sincan,Kazan,Akyurt,Etimesgut,Evren,Pursaklar'],
               ['id' => '7','name' =>  'Antalya','content' => 'Akseki,Alanya,Antalya Merkez,Elmalı,Finike,Gazipaşa,Gündoğmuş,Kaş,Korkuteli,Kumluca,Manavgat,Serik,Demre,İbradı,Kemer - Antalya,Aksu - Antalya,Döşemealtı,Kepez,Konyaaltı,Muratpaşa'],
               ['id' => '8','name' =>  'Artvin','content' => 'Ardanuç,Arhavi,Artvin Merkez,Borçka,Hopa,Şavşat,Yusufeli,Murgul,Kemalpaşa - Artvin,'],
               ['id' => '9','name' =>  'Aydın','content' => 'Aydın Merkez,Bozdoğan,Çine,Germencik,Karacasu,Koçarlı,Kuşadası,Kuyucak,Nazilli,Söke,Sultanhisar,Yenipazar - Aydın,Buharkent,İncirliova,Karpuzlu,Köşk,Didim,Efeler'],
               ['id' => '10','name' => 'Balıkesir','content' => 'Balıkesir Merkez,Balya,Bandırma,Bigadiç,Burhaniye,Dursunbey,Edremit - Balıkesir,Erdek,Gönen - Balıkesir,Havran,İvrindi,Kepsut,Manyas,Savaştepe,Sındırgı,Susurluk,Marmara,Gömeç,Altıeylül,Karesi,'],
               ['id' => '11','name' => 'Bilecik','content' => 'Bilecik Merkez,Bozüyük,Gölpazarı,Osmaneli,Pazaryeri,Söğüt,Yenipazar - Bilecik,İnhisar,'],
               ['id' => '12','name' => 'Bingöl','content' => 'Bingöl Merkez,Genç,Karlıova,Kiğı,Solhan,Adaklı,Yayladere,Yedisu,'],
               ['id' => '13','name' => 'Bitlis','content' => 'Adilcevaz,Ahlat,Bitlis Merkez,Hizan,Mutki,Tatvan,Güroymak,'],
               ['id' => '14','name' => 'Bolu','content' => 'Bolu Merkez,Gerede,Göynük,Kıbrıscık,Mengen,Mudurnu,Seben,Dörtdivan,Yeniçağa,'],
               ['id' => '15','name' => 'Burdur','content' => 'Ağlasun,Bucak,Burdur Merkez,Gölhisar,Tefenni,Yeşilova,Karamanlı,Kemer - Burdur,Altınyayla - Burdur,Çavdır,Çeltikçi'],
               ['id' => '16','name' => 'Bursa','content' => 'Gemlik,İnegöl,İznik,Karacabey,Keles,Mudanya,Mustafakemalpaşa,Orhaneli,Orhangazi,Yenişehir - Bursa,Büyükorhan,Harmancık,Nilüfer,Osmangazi,Yıldırım,Gürsu,Kestel,'],
               ['id' => '17','name' => 'Çanakkale','content' => 'Ayvacık - Çanakkale,Bayramiç,Biga,Bozcaada,Çan,Çanakkale Merkez,Eceabat,Ezine,Gelibolu,Gökçeada,Lapseki,Yenice - Çanakkale,'],
               ['id' => '18','name' => 'Çankırı','content' => 'Çankırı Merkez,Çerkeş,Eldivan,Ilgaz,Kurşunlu,Orta,Şabanözü,Yapraklı,Atkaracalar,Kızılırmak,Bayramören,Korgun,'],
               ['id' => '19','name' => 'Çorum','content' => 'Alaca,Bayat - Çorum,Çorum Merkez,İskilip,Kargı,Mecitözü,Ortaköy - Çorum,Osmancık,Sungurlu,Boğazkale,Uğurludağ,Dodurga,Laçin,Oğuzlar,'],
               ['id' => '20','name' => 'Denizli','content' => 'Acıpayam,Buldan,Çal,Çameli,Çardak,Çivril,Denizli Merkez,Güney,Kale - Denizli,Sarayköy,Tavas,Babadağ,Bekilli,Honaz,Serinhisar,Pamukkale,Baklan,Beyağaç,Bozkurt - Denizli,Merkezefendi,'],
               ['id' => '21','name' => 'Diyarbakır','content' => 'Bismil,Çermik,Çınar,Çüngüş,Dicle,Diyarbakır Merkez,Ergani,Hani,Hazro,Kulp,Lice,Silvan,Eğil,Kocaköy,Bağlar,Kayapınar,Sur,Yenişehir - Diyarbakır,'],
               ['id' => '22','name' => 'Edirne','content' => 'Edirne Merkez,Enez,Havsa,İpsala,Keşan,Lalapaşa,Meriç,Uzunköprü,Süloğlu,'],
               ['id' => '23','name' => 'Elazığ','content' => 'Ağın,Baskil,Elazığ Merkez,Karakoçan,Keban,Maden,Palu,Sivrice,Arıcak,Kovancılar,Alacakaya,'],
               ['id' => '24','name' => 'Erzincan','content' => 'Çayırlı,Erzincan Merkez,İliç,Kemah,Kemaliye,Refahiye,Tercan,Üzümlü,Otlukbeli,'],
               ['id' => '25','name' => 'Erzurum','content' => 'Aşkale,Çat,Erzurum Merkez,Hınıs,Horasan,İspir,Karayazı,Narman,Oltu,Olur,Pasinler,Şenkaya,Tekman,Tortum,Karaçoban,Uzundere,Pazaryolu,Aziziye,Köprüköy,Palandöken,Yakutiye,'],
               ['id' => '26','name' => 'Eskişehir','content' => 'Çifteler,Eskişehir Merkez,Mahmudiye,Mihalıççık,Sarıcakaya,Seyitgazi,Sivrihisar,Alpu,Beylikova,İnönü,Günyüzü,Han,Mihalgazi,Odunpazarı,Tepebaşı,'],
               ['id' => '27','name' => 'Gaziantep','content' => 'Araban,İslahiye,Nizip,Oğuzeli,Yavuzeli,Şahinbey,Şehitkamil,Karkamış,Nurdağı,'],
               ['id' => '28','name' => 'Giresun','content' => 'Alucra,Bulancak,Dereli,Espiye,Eynesil,Giresun Merkez,Görele,Keşap,Şebinkarahisar,Tirebolu,Piraziz,Yağlıdere,Çamoluk,Çanakçı,Doğankent,Güce,'],
               ['id' => '29','name' => 'Gümüşhane','content' => 'Gümüşhane Merkez,Kelkit,Şiran,Torul,Köse,Kürtün,'],
               ['id' => '30','name' => 'Hakkari','content' => 'Çukurca,Hakkari Merkez,Şemdinli,Yüksekova,'],
               ['id' => '31','name' => 'Hatay','content' => 'Altınözü,Dörtyol,Hassa,Hatay Merkez,İskenderun,Kırıkhan,Reyhanlı,Samandağ,Yayladağı,Erzin,Belen,Kumlu,Antakya,Arsuz,Defne,Payas,'],
               ['id' => '32','name' => 'Isparta','content' => 'Atabey,Eğirdir,Gelendost,Isparta Merkez,Keçiborlu,Senirkent,Sütçüler,Şarkikaraağaç,Uluborlu,Yalvaç,Aksu - Isparta,Gönen - Isparta,Yenişarbademli,'],
               ['id' => '33','name' => 'Mersin','content' => 'Anamur,Erdemli,Gülnar,Mersin Merkez,Mut,Silifke,Tarsus,Aydıncık - Mersin,Bozyazı,Çamlıyayla,Akdeniz,Mezitli,Toroslar,Yenişehir - Mersin,'],
               ['id' => '34','name' => 'İstanbul','content' => 'Adalar,Bakırköy,Beşiktaş,Beykoz,Beyoğlu,Çatalca,Eminönü,Eyüp,Fatih,Gaziosmanpaşa,Kadıköy,Kartal,Sarıyer,Silivri,Şile,Şişli,Üsküdar,Zeytinburnu,Büyükçekmece,Kağıthane,Küçükçekmece,Pendik,Ümraniye,Bayrampaşa,Avcılar,Bağcılar,Bahçelievler,Güngören,Maltepe,Sultanbeyli,Tuzla,Esenler,Arnavutköy,Ataşehir,Başakşehir,Beylikdüzü,Çekmeköy,Esenyurt,Sancaktepe,Sultangazi,'],
               ['id' => '35','name' => 'İzmir','content' => 'Aliağa,Bayındır,Bergama,Bornova,Çeşme,Dikili,Foça,Karaburun,Karşıyaka,Kemalpaşa - İzmir,Kınık,Kiraz,Menemen,Ödemiş,Seferihisar,Selçuk,Tire,Torbalı,Urla,Beydağ,Buca,Konak,Menderes,Balçova,Çiğli,Gaziemir,Narlıdere,Güzelbahçe,Bayraklı,Karabağlar,'],
               ['id' => '36','name' => 'Kars','content' => 'Arpaçay,Digor,Kağızman,Kars Merkez,Sarıkamış,Selim,Susuz,Akyaka,'],
               ['id' => '37','name' => 'Kastamonu','content' => 'Abana,Araç,Azdavay,Bozkurt - Kastamonu,Cide,Çatalzeytin,Daday,Devrekani,İnebolu,Kastamonu Merkez,Küre,Taşköprü,Tosya,İhsangazi,Pınarbaşı - Kastamonu,Şenpazar,Ağlı,Doğanyurt,Hanönü,Seydiler,'],
               ['id' => '38','name' => 'Kayseri','content' => 'Bünyan,Develi,Felahiye,İncesu,Pınarbaşı - Kayseri,Sarıoğlan,Sarız,Tomarza,Yahyalı,Yeşilhisar,Akkışla,Talas,Kocasinan,Melikgazi,Hacılar,Özvatan,'],
               ['id' => '39','name' => 'Kırklareli','content' => 'Babaeski,Demirköy,Kırklareli Merkez,Kofçaz,Lüleburgaz,Pehlivanköy,Pınarhisar,Vize,'],
               ['id' => '40','name' => 'Kırşehir','content' => 'Çiçekdağı,Kaman,Kırşehir Merkez,Mucur,Akpınar,Akçakent,Boztepe,'],
               ['id' => '41','name' => 'Kocaeli','content' => 'Gebze,Gölcük,Kandıra,Karamürsel,Kocaeli Merkez,Körfez,Derince,Başiskele,Çayırova,Darıca,Dilovası,İzmit,Kartepe,'],
               ['id' => '42','name' => 'Konya','content' => 'Akşehir,Beyşehir,Bozkır,Cihanbeyli,Çumra,Doğanhisar,Ereğli - Konya,Hadim,Ilgın,Kadınhanı,Karapınar,Kulu,Sarayönü,Seydişehir,Yunak,Akören,Altınekin,Derebucak,Hüyük,Karatay,Meram,Selçuklu,Taşkent,Ahırlı,Çeltik,Derbent,Emirgazi,Güneysınır,Halkapınar,Tuzlukçu,Yalıhüyük,'],
               ['id' => '43','name' => 'Kütahya','content' => 'Altıntaş,Domaniç,Emet,Gediz,Kütahya Merkez,Simav,Tavşanlı,Aslanapa,Dumlupınar,Hisarcık,Şaphane,Çavdarhisar,Pazarlar,'],
               ['id' => '44','name' => 'Malatya','content' => 'Akçadağ,Arapgir,Arguvan,Darende,Doğanşehir,Hekimhan,Malatya Merkez,Pütürge,Yeşilyurt - Malatya,Battalgazi,Doğanyol,Kale - Malatya,Kuluncak,Yazıhan,'],
               ['id' => '45','name' => 'Manisa','content' => 'Akhisar,Alaşehir,Demirci,Gördes,Kırkağaç,Kula,Manisa Merkez,Salihli,Sarıgöl,Saruhanlı,Selendi,Soma,Turgutlu,Ahmetli,Gölmarmara,Köprübaşı - Manisa,Şehzadeler,Yunusemre,'],
               ['id' => '46','name' => 'Kahramanmaraş','content' => 'Afşin,Andırın,Elbistan,Göksun,Kahramanmaraş Merkez,Pazarcık,Türkoğlu,Çağlayancerit,Ekinözü,Nurhak,Dulkadiroğlu,Onikişubat,'],
               ['id' => '47','name' => 'Mardin','content' => 'Derik,Kızıltepe,Mardin Merkez,Mazıdağı,Midyat,Nusaybin,Ömerli,Savur,Dargeçit,Yeşilli,Artuklu,'],
               ['id' => '48','name' => 'Muğla','content' => 'Bodrum,Datça,Fethiye,Köyceğiz,Marmaris,Milas,Muğla Merkez,Ula,Yatağan,Dalaman,Ortaca,Kavaklıdere,Menteşe,Seydikemer,'],
               ['id' => '49','name' => 'Muş','content' => 'Bulanık,Malazgirt,Muş Merkez,Varto,Hasköy,Korkut,'],
               ['id' => '50','name' => 'Nevşehir','content' => 'Avanos,Derinkuyu,Gülşehir,Hacıbektaş,Kozaklı,Nevşehir Merkez,Ürgüp,Acıgöl,'],
               ['id' => '51','name' => 'Niğde','content' => 'Bor,Çamardı,Niğde Merkez,Ulukışla,Altunhisar,Çiftlik,'],
               ['id' => '52','name' => 'Ordu','content' => 'Akkuş,Aybastı,Fatsa,Gölköy,Korgan,Kumru,Mesudiye,Ordu Merkez,Perşembe,Ulubey - Ordu,Ünye,Gülyalı,Gürgentepe,Çamaş,Çatalpınar,Çaybaşı,İkizce,Kabadüz,Kabataş,Altınordu,'],
               ['id' => '53','name' => 'Rize','content' => 'Ardeşen,Çamlıhemşin,Çayeli,Fındıklı,İkizdere,Kalkandere,Pazar - Rize,Rize Merkez,Güneysu,Derepazarı,Hemşin,İyidere,'],
               ['id' => '54','name' => 'Sakarya','content' => 'Akyazı,Geyve,Hendek,Karasu,Kaynarca,Sakarya Merkez,Sapanca,Kocaali,Pamukova,Taraklı,Ferizli,Karapürçek,Söğütlü,Adapazarı,Arifiye,Erenler,Serdivan,'],
               ['id' => '55','name' => 'Samsun','content' => 'Alaçam,Bafra,Çarşamba,Havza,Kavak,Ladik,Samsun Merkez,Terme,Vezirköprü,Asarcık,19 Mayıs,Salıpazarı,Tekkeköy,Ayvacık - Samsun,Yakakent,Atakum,Canik,İlkadım,'],
               ['id' => '56','name' => 'Siirt','content' => 'Baykan,Eruh,Kurtalan,Pervari,Siirt Merkez,Şirvan,Tillo,'],
               ['id' => '57','name' => 'Sinop','content' => 'Ayancık,Boyabat,Durağan,Erfelek,Gerze,Sinop Merkez,Türkeli,Dikmen,Saraydüzü,'],
               ['id' => '58','name' => 'Sivas','content' => 'Divriği,Gemerek,Gürün,Hafik,İmranlı,Kangal,Koyulhisar,Sivas Merkez,Suşehri,Şarkışla,Yıldızeli,Zara,Akıncılar,Altınyayla - Sivas,Doğanşar,Gölova,Ulaş,'],
               ['id' => '59','name' => 'Tekirdağ','content' => 'Çerkezköy,Çorlu,Hayrabolu,Malkara,Muratlı,Saray - Tekirdağ,Şarköy,Tekirdağ Merkez,Marmaraereğlisi,Ergene,Kapaklı,Süleymanpaşa,'],
               ['id' => '60','name' => 'Tokat','content' => 'Almus,Artova,Erbaa,Niksar,Reşadiye,Tokat Merkez,Turhal,Zile,Pazar - Tokat,Yeşilyurt - Tokat,Başçiftlik,Sulusaray,'],
               ['id' => '61','name' => 'Trabzon','content' => 'Akçaabat,Araklı,Arsin,Çaykara,Maçka,Of,Sürmene,Tonya,Trabzon Merkez,Vakfıkebir,Yomra,Beşikdüzü,Şalpazarı,Çarşıbaşı,Dernekpazarı,Düzköy,Hayrat,Köprübaşı - Trabzon,Ortahisar,'],
               ['id' => '62','name' => 'Tunceli','content' => 'Çemişgezek,Hozat,Mazgirt,Nazımiye,Ovacık - Tunceli,Pertek,Pülümür,Tunceli Merkez,'],
               ['id' => '63','name' => 'Şanlıurfa','content' => 'Akçakale,Birecik,Bozova,Ceylanpınar,Halfeti,Hilvan,Siverek,Suruç,Şanlıurfa Merkez,Viranşehir,Harran,Eyyübiye,Haliliye,Karaköprü,'],
               ['id' => '64','name' => 'Uşak','content' => 'Banaz,Eşme,Karahallı,Sivaslı,Ulubey - Uşak,Uşak Merkez,'],
               ['id' => '65','name' => 'Van','content' => 'Başkale,Çatak,Erciş,Gevaş,Gürpınar,Muradiye,Özalp,Van Merkez,Bahçesaray,Çaldıran,Edremit - Van,Saray - Van,İpekyolu,Tuşba,'],
               ['id' => '66','name' => 'Yozgat','content' => 'Akdağmadeni,Boğazlıyan,Çayıralan,Çekerek,Sarıkaya,Sorgun,Şefaatli,Yerköy,Yozgat Merkez,Aydıncık - Yozgat,Çandır,Kadışehri,Saraykent,Yenifakılı,'],
               ['id' => '67','name' => 'Zonguldak','content' => 'Çaycuma,Devrek,Ereğli - Zonguldak,Zonguldak Merkez,Alaplı,Gökçebey,Kilimli,Kozlu,'],
               ['id' => '68','name' => 'Aksaray','content' => 'Aksaray Merkez,Ortaköy - Aksaray,Ağaçören,Güzelyurt,Sarıyahşi,Eskil,Gülağaç,Sultanhanı,'],
               ['id' => '69','name' => 'Bayburt','content' => 'Bayburt Merkez,Aydıntepe,Demirözü,'],
               ['id' => '70','name' => 'Karaman','content' => 'Ermenek,Karaman Merkez,Ayrancı,Kazımkarabekir,Başyayla,Sarıveliler,'],
               ['id' => '71','name' => 'Kırıkkale','content' => 'Delice,Keskin,Kırıkkale Merkez,Sulakyurt,Bahşili,Balışeyh,Çelebi,Karakeçili,Yahşihan,'],
               ['id' => '72','name' => 'Batman','content' => 'Batman Merkez,Beşiri,Gercüş,Kozluk,Sason,Hasankeyf,'],
               ['id' => '73','name' => 'Şırnak','content' => 'Beytüşşebap,Cizre,İdil,Silopi,Şırnak Merkez,Uludere,Güçlükonak,'],
               ['id' => '74','name' => 'Bartın','content' => 'Bartın Merkez,Kurucaşile,Ulus,Amasra,'],
               ['id' => '75','name' => 'Ardahan','content' => 'Ardahan Merkez,Çıldır,Göle,Hanak,Posof,Damal,'],
               ['id' => '76','name' => 'Iğdır','content' => 'Aralık,Iğdır Merkez,Tuzluca,Karakoyunlu,'],
               ['id' => '77','name' => 'Yalova','content' => 'Yalova Merkez,Altınova,Armutlu,Çınarcık,Çiftlikköy,Termal,'],
               ['id' => '78','name' => 'Karabük','content' => 'Eflani,Eskipazar,Karabük Merkez,Ovacık - Karabük,Safranbolu,Yenice - Karabük,'],
               ['id' => '79','name' => 'Kilis','content' => 'Kilis Merkez,Elbeyli,Musabeyli,Polateli,'],
               ['id' => '80','name' => 'Osmaniye','content' => 'Bahçe,Kadirli,Osmaniye Merkez,Düziçi,Hasanbeyli,Sumbas,Toprakkale,'],
               ['id' => '81','name' => 'Düzce','content' => 'Akçakoca,Düzce Merkez,Yığılca,Cumayeri,Gölyaka,Çilimli,Gümüşova,Kaynaşlı,']

            ];

        foreach ($city as $city_data) {
            $data = DB::table('table_cityes')->insert($city_data);
        }

    }
}
