<?php

namespace Database\Seeders;

use App\Models\ModelLandingPage;
use App\Models\Settings;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ["name" => "site_title", "value" => "Site başlık mesajı", "group" => "general", "type" => "string"],
            ["name" => "site_name", "value" => "<span>Poyraz </span>Yazılım Hizmetleri", "group" => "general", "type" => "string"],
            ["name" => "site_keywords", "value" => "Site anahtar kelimeleri", "group" => "general", "type" => "string"],
            ["name" => "site_description", "value" => "Site Açıklaması ", "group" => "general", "type" => "string"],
            ["name" => "site_newsname", "value" => "news name", "group" => "general", "type" => "string"],
            ["name" => "site_email", "value" => "info@hellonewmedia.com", "group" => "general", "type" => "string"],
            ["name" => "site_phone", "value" => "555-555-55-55", "group" => "general", "type" => "string"],
            ["name" => "site_address", "value" => "Maslak Mahallesi, Aos 55. Sk. 42 Maslak </br> A Blog, No:2 İç Kapl:25 </br> Sarıyer/İstanbul", "group" => "general", "type" => "string"],
            ["name" => "site_copyright", "value" => "2023 &copy; <a href='poyrazyazilim.com'>  Poyraz yazılım</a> Tüm hakları saklıdır", "group" => "general", "type" => "string"],
            ["name" => "site_refresh", "value" => "", "group" => "general", "type" => "string"],
            
            ["name" => "site_whatsapp_phone", "value" => "905555555555", "group" => "ceo", "type" => "string"],
            ["name" => "site_copyright", "value" => "Poyraz Yazılım", "group" => "general", "type" => "string"],
            ["name" => "site_refresh", "value" => "", "group" => "general", "type" => "string"],

            ["name" => "site_url", "value" => "#!", "group" => "ceo", "type" => "string"],
            ["name" => "site_facebookapp_id", "value" => "#!00000", "group" => "ceo", "type" => "string"],
            ["name" => "site_googleplus_id", "value" => "#!00000", "group" => "ceo", "type" => "string"],
            ["name" => "site_facebook_url", "value" => "#!", "group" => "ceo", "type" => "string"],
            ["name" => "site_twitter_url", "value" => "#!", "group" => "ceo", "type" => "string"],
            ["name" => "site_instagram_url", "value" => "#!", "group" => "ceo", "type" => "string"],
            ["name" => "site_youtube_url", "value" => "#!", "group" => "ceo", "type" => "string"],
            ["name" => "site_google_plus_url", "value" => "#!", "group" => "ceo", "type" => "string"],
            ["name" => "site_linkedin_url", "value" => "#!", "group" => "ceo", "type" => "string"],
            ["name" => "site_cookie_text", "value" => "#!", "group" => "ceo", "type" => "string"],
            ["name" => "site_cookie_url", "value" => "#!", "group" => "ceo", "type" => "string"],
            ["name" => "site_meta_tag", "value" => "#!", "group" => "ceo", "type" => "string"],
            ["name" => "site_analytics", "value" => "#!", "group" => "ceo", "type" => "string"],

            ["name" => "site_logo", "value" => "images/logo.png", "group" => "image", "type" => "image"],
            ["name" => "site_icon", "value" => "images/logo.png", "group" => "image", "type" => "image"],
            ["name" => "site_login_img", "value" => "images/background_images.jpg", "group" => "image", "type" => "image"],
            ["name" => "site_register_img", "value" => "images/background_images.jpg", "group" => "image", "type" => "image"],

            ["name" => "landing_slider_img", "value" => "images/background_images.jpg", "group" => "frontend", "type" => "image"],
            ["name" => "landing_slider_title", "value" => "Hello New Media ile daha iyi dijital ", "group" => "frontend", "type" => "string"],
            ["name" => "landing_slider_slogan", "value" => "Markanızın doğru iletişim için kurulmuş, yetenekli tasarımcılar ve yazılımcılardan oluşan bir ekip ", "group" => "frontend", "type" => "string"],
            ["name" => "landing_slider_button_title", "value" => "Hadi Başla", "group" => "frontend", "type" => "string"],


            // Only super admin 
            ["name" => "site_publish", "value" => "1", "group" => "secret", "type" => "select"],
            ["name" => "frontend_color", "value" => "#1f5cf5", "group" => "secret", "type" => "string"],
            ["name" => "CAPTCHA_SECRET", "value" => "", "group" => "secret", "type" => "string"],
            ["name" => "CAPTCHA_SITEKEY", "value" => "", "group" => "secret", "type" => "string"],


        ];
        foreach ($data as $item) {
            Settings::updateOrCreate(
                [
                    'name' => $item['name']
                ],
                [
                    'value' => $item['value'],
                    'group' => $item['group'],
                    'type' => $item['type']
                ]
            );
        }


        ModelLandingPage::firstOrcreate(['section_name' => 'about'], [
            'status' => 1,
            'section_content' => '{"logo_1": "/storage/page/Ek604pKO41RCR0OpsTkhg2r8rdpnMolc3o1Bzq39.png", "logo_2": "/storage/page/OqSYtpBmjWIGiaT69rkabOQqv2aOPNLI4OJ9893r.png", "logo_3": "/storage/page/rFXOArl150geqZF6lEZvtI8Nyzcf7vpPa760zz68.png", "logo_4": "/storage/page/ceflsAGsEf8bG6BZF3SZaQJjPXjPCUZqBMC8AAKH.png", "header_1": "NEDEN HELLONEWMEDIA ?", "header_2": "Veri odaklı dijital pazarlama ajansı olarak, uzman ve profesyonel ekibimiz ile birlikte ihtiyacınız olan dijital pazarlama, tasarım ve yazılım ihtiyaçlarınıza yüksek standartlarda çözüm üretiyoruz!", "button_text": null, "service_1_title": "Dijital Ajans", "service_2_title": "Kreatif Ajans", "service_3_title": "Marka Danışmanlığı", "service_4_title": "Prodüksiyon", "service_1_description": "İşletmenizin hak ettiği ilgiyi görmesini ve her zaman kusursuz bir görünüme sahip olmasını sağlamak için buradayız.", "service_2_description": "Marka bir logo değildir. Marka, sattığınız ürünün kişiliğidir.", "service_3_description": "Size sunabileceğimiz kurum içi kampanya ve hizmetlerin yanı sıra danışmanlık amaçlı da bizimle iletişime geçebilirsiniz.", "service_4_description": "Profesyonel fotoğrafçılarımız ve kreatif ekibimizle size özel konsept ve stillerle ürün çekimlerinizi gerçekleştiriyoruz."}'

        ]);
    }
}
