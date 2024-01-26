<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\InfoMessage;
use App\Models\JobTeams;
use App\Models\Newsletter;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use App\Exports\NewsletterExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;



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


        $user_count = JobTeams::where('status', 1)->count();
        // $requestForm = InfoMessage::where('type','request_form')->orderBy('publish', 'asc')->latest('created_at')->paginate(10);
        
        $infoMessages = InfoMessage::latest();
        $mesaageCount =  $infoMessages->count();
        $infoMessages =  $infoMessages->limit(5)->get();
        
        
        
        
        
        $newsletter = Newsletter::latest();
        $newsletterCount =  $newsletter->count();
        $newsletter = $newsletter->limit(1)->get();
//         dd($mesaageCount);

        return view('admin.index', compact(
            'total_article',
            'last_article',
            'total_services',
            'last_services',
            'user_count',
            'infoMessages','mesaageCount','newsletter','newsletterCount'
        ));
    }

    public function clearCache()
    {
        Artisan::call('optimize:clear');
        Artisan::call('route:cache');
        Artisan::call('config:cache');
        
        toastr()->success('Sistem Önbelleği Temizlendi.', 'Başarılı');
        return redirect()->back();
    }
    public function info_message(): Application|Factory|View|\Illuminate\Foundation\Application
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
    
    
    /**
     * @param Request $request
     * @return JsonResponse|void
     */
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


    public function  newsletterDownload()
    {
        return Excel::download(new \App\Exports\NewsLetterExport, 'Email-List-'.date('d.m.Y').'.xlsx',\Maatwebsite\Excel\Excel::XLSX);
    }

}
