<?php

namespace App\Providers;

use App\Models\Settings;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;


class SettingsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        if (Schema::hasTable('settings')) {
            $settings = DB::connection()->table('settings')->pluck('value', 'name')->toArray();
            $allCategories = DB::connection()->table('categories')->select('id','name','slug','model','show','image')->get()->toArray();
            Config::set(['settings'=>$settings,'allCetegories'=>$allCategories]);
        }
        
        
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
