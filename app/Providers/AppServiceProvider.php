<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $settings = DB::connection()->table('settings')->pluck('value', 'name')->toArray();
        config(['settings' => $settings]);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
       
    }
}
