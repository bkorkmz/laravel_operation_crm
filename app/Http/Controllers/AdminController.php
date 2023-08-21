<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\JobTeams;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class AdminController  extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {

        $article = Article::whereRelation('category',function($query){
            $query->where('model','article');
        });
        $total_article = $article->get()->count();
        $last_article = $article->latest()->limit(5)->get();
       
       
        $services= Article::whereRelation('category',function($query){
            $query->where('model','services');
        });
        $total_services = $services->get()->count();
        $last_services = $services->latest()->limit(5)->get();
     
     
        $user_count= JobTeams::where('status',1)->get()->count();
       




// dd( $total_article, $last_article);

        return view('admin.index',compact(
            'total_article','last_article','total_services','last_services',
            'user_count'
        ));
    }

    public function clearCache()
    {
       
        Artisan::call('optimize:clear');


        toastr()->success('Sistem Önbelleği Temizlendi.', 'Başarılı');
        return redirect()->back();
    }

    
}