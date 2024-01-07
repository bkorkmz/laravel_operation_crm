<?php

namespace App\Console\Commands;

use App\Models\Article;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class NewsJobs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'evrim-news';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Evrim haberlerini güncelle';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $response = Http::get('http://haber.evrim.com/Rest/Category?page=2&size=20&category=mevzuat');
        $newsData = $response->json();
        $filePath = storage_path('app/evrimNews.json');
        file_put_contents($filePath, json_encode($newsData));
    }
}
