<?php

namespace App\Console\Commands;

use App\Models\Article;
use Carbon\Carbon;
use Illuminate\Console\Command;

class SitemapJob extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'site-map';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sitemap oluşturur';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        siteMap();
    }
}
