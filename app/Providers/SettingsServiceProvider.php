<?php

namespace App\Providers;

use App\Models\Settings;
use Illuminate\Support\Facades\Config;
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
            $settings = \DB::connection()->table('settings')->pluck('value', 'name')->toArray();
            Config::set('settings', $settings);
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
