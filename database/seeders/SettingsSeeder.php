<?php

namespace Database\Seeders;

use App\Models\Settings;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;
use function PHPUnit\Framework\never;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data= [
            ["name"=>"site_title","value"=>"Site başlık mesajı","group"=>"general","type"=>"string"],
            ["name"=>"site_keywords","value"=>"Site anahtar kelimeleri","group"=>"general","type"=>"string"],
            ["name"=>"site_description","value"=>"Site Açıklaması ","group"=>"general","type"=>"string"],
            ["name"=>"site_newsname","value"=>"news name","group"=>"general","type"=>"string"],
            ["name"=>"site_email","value"=>"destek@poyrazyazilim.com","group"=>"general","type"=>"string"],
            ["name"=>"site_phone","value"=>"555-555-55-55","group"=>"general","type"=>"string"],
            ["name"=>"site_address","value"=>"","group"=>"general","type"=>"string"],
            ["name"=>"site_copyright","value"=>"Poyraz Yazılım","group"=>"general","type"=>"string"],
            ["name"=>"site_refresh","value"=>"","group"=>"general","type"=>"string"],
            ["name"=>"site_publish","value"=>"1","group"=>"general","type"=>"string"],
            
            ["name"=>"site_url","value"=>"","group"=>"ceo","type"=>"string"],
            ["name"=>"site_facebookapp_id","value"=>"00000","group"=>"ceo","type"=>"string"],
            ["name"=>"site_googleplus_id","value"=>"00000","group"=>"ceo","type"=>"string"],
            ["name"=>"site_facebook_url","value"=>"","group"=>"ceo","type"=>"string"],
            ["name"=>"site_twitter_url","value"=>"","group"=>"ceo","type"=>"string"],
            ["name"=>"site_instagram_url","value"=>"","group"=>"ceo","type"=>"string"],
            ["name"=>"site_youtube_url","value"=>"","group"=>"ceo","type"=>"string"],
            ["name"=>"site_cookie_text","value"=>"","group"=>"ceo","type"=>"string"],
            ["name"=>"site_cookie_url","value"=>"","group"=>"ceo","type"=>"string"],
            ["name"=>"site_meta_tag","value"=>"","group"=>"ceo","type"=>"string"],
            ["name"=>"site_analytics","value"=>"","group"=>"ceo","type"=>"string"],
            
            ["name"=>"site_logo","value"=>"images/logo.png","group"=>"image","type"=>"string"],
            ["name"=>"site_icon","value"=>"images/logo.png","group"=>"image","type"=>"string"],
            ["name"=>"site_login_img","value"=>"images/background_images.jpg","group"=>"image","type"=>"string"],
            ["name"=>"site_register_img","value"=>"images/background_images.jpg","group"=>"image","type"=>"string"],
            

            // Only super admin 
            ["name"=>"CAPTCHA_SECRET","value"=>"","group"=>"secret","type"=>"string"],
            ["name"=>"CAPTCHA_SITEKEY","value"=>"","group"=>"secret","type"=>"string"],


        ];
        foreach ($data as $item) {
            Settings::firstOrCreate([
                'name' => $item['name'],
                'value' => $item['value'],
                'group' => $item['group'],
                'type' => $item['type']
            ]);
        }
        

    }
}
