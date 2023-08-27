<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\InfoMessage;
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

        $article = Article::whereRelation('category', function ($query) {
            $query->where('model', 'article');
        });
        $total_article = $article->get()->count();
        $last_article = $article->latest()->limit(5)->get();


        $services = Article::whereRelation('category', function ($query) {
            $query->where('model', 'services');
        });
        $total_services = $services->get()->count();
        $last_services = $services->latest()->limit(5)->get();


        $user_count = JobTeams::where('status', 1)->get()->count();
        $infoMessages = InfoMessage::orderBy('created_at', 'asc');
        $infoMessages =  $infoMessages->limit(5)->get();
        $mesaageCount =  $infoMessages->where('publish',0)->count();





        // dd( $total_article, $last_article);

        return view('admin.index', compact(
            'total_article',
            'last_article',
            'total_services',
            'last_services',
            'user_count',
            'infoMessages','mesaageCount'
        ));
    }

    public function clearCache()
    {

        Artisan::call('optimize:clear');


        toastr()->success('Sistem Önbelleği Temizlendi.', 'Başarılı');
        return redirect()->back();
    }
    public function info_message()
    {
        $messages = InfoMessage::orderBy('created_at', 'asc')->paginate(10);
        return view('admin.message', compact('messages'));
    }
    public function info_message_edit($id)
    {
        $messages = InfoMessage::where('id', $id)->update(['publish' => 1]);
        if ($messages) {
            $msg = true;
        } else {
            $msg = false;
        }
        return response($msg);
    }
}
