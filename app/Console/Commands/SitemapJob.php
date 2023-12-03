<?php

namespace App\Console\Commands;

use App\Models\Article;
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
        $urls = [request()->schemeAndHttpHost().'/blog'];
        $article = Article::where('publish',0)->select('slug')->get()->toarray();
        foreach($article as $art){
            $urls[] = request()->schemeAndHttpHost().'/blog/'.$art['slug'];
        }
        $sitemapContent = view('sitemap', compact('urls'))->render();
        file_put_contents(public_path('sitemap.xml'), $sitemapContent);
    }
}
