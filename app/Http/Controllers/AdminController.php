<?php

namespace App\Http\Controllers;

use App\Exports\NewsletterExport;
use App\Models\Article;
use App\Models\InfoMessage;
use App\Models\JobTeams;
use App\Models\Newsletter;
use App\Models\Products;
use App\Models\Test;
use App\Models\TestDefinition;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Artisan;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class AdminController  extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {

        $contents = collect();

        if(!auth()->user()->hasRole('user')){
            $pages['admin'] ='admin_dashboard';
        }else {
            $pages['user'] = 'user_dashboard';
        }

        foreach ($pages as $key=>$page){
            $contents->put($key, $this->$page());
        }
        return view('admin.index', compact('contents'));
    }

    public function admin_dashboard(){

        $article = Article::whereRelation('category', function ($query) {
            $query->where('model', 'article');
        });
        $total_article = $article->get()->count();
        $last_article = $article->latest()->limit(5)->get();

        $services = Article::whereRelation('category', function ($query) {
            $query->where('model', 'services');
        });
        $total_services = $services->count();
        $last_services = $services->latest()->limit(5)->get();
        $user_count = JobTeams::where('status', 1)->get()->count();
        $requestForm = InfoMessage::where('type','request_form')
            ->orderByRaw('publish ASC, created_at DESC')->paginate(10);
        $infoMessages = InfoMessage::where('type','info_form')->orderBy('created_at', 'asc');
        $infoMessages =  $infoMessages->limit(5)->get();
        $mesageCount =  $infoMessages->where('publish',0)->count();

        $newsletter = Newsletter::latest();
        $newsletterCount =  $newsletter->count();
        $newsletter = $newsletter->limit(1)->get();

        $testsCount = TestDefinition::count();

        return compact(
            'total_article',
            'last_article',
            'total_services',
            'last_services',
            'user_count',
            'infoMessages',
            'mesageCount',
            'requestForm',
            'newsletter',
            'newsletterCount',
            'testsCount'
        );

    }

    public function user_dashboard(){
        $articleCount = Article::whereRelation('category', function ($query) {
            $query->where('model', 'article');
        })->where('user_id',auth()->id())->count();

        $products = Products::where('status',1)->latest()->limit(5)->get();
        $testsCount = TestDefinition::where('user_email',auth()->user()->email)->count();


        return compact('articleCount','products','testsCount');
    }


    public function clearCache(): RedirectResponse
    {

//        Artisan::call('optimize:clear');
        toastr()->success('Sistem Önbelleği Temizlendi.', 'Başarılı');
        return redirect()->back();
    }


    public function info_message()
    {
        $messages = InfoMessage::where('type','info_form')->orderBy('created_at', 'asc')->paginate(10);
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



    public function ckEditorUpload(Request $request)
    {
        if($request->hasFile('image')) {
                $request->validate(
                    [
                        'image' => 'required|file|mimes:jpg,jpeg,png,tiff,gif,svg,webp,bmp,ico|max:5000'
                    ],
                    [
                        'image.required' => 'Resim alanı Zorunludur',
                        'image.mimes' => 'Yüklenen dosya desteklenen dosya tiplerinden birisi olmalıdır (jpg,jpeg,png,tiff,gif,svg,webp,bmp,ico)',
                        'image.file' => 'Yüklenen dosya bir resim dosyası olmalıdır',
                        'image.max' => 'Yüklenen dosya en fazla 4MB (4000 Kb ) olmalıdır',

                    ]
                );
                $file_upload = fileUpload($request->image,'Ck-images');
                $url=   $file_upload['path'];
                // $url = '/storage/' . $request->image->store('Ck-images', 'public');


                return response()->json([
                    'uploaded' => true,
                    'url' => $url,
                ]);
        }
    }


    /**
     * @return BinaryFileResponse
     */
    public function  newsletterDownload()
    {
        return Excel::download(new \App\Exports\NewsletterExport(), 'Email-List-'.date('d.m.Y').'.xlsx',\Maatwebsite\Excel\Excel::XLSX);
    }



}
