<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\ContactMessage;
use App\Models\FaqSss;
use App\Models\InfoMessage;
use App\Models\JobTeams;
use App\Models\ModelLandingPage;
use App\Models\Newsletter;
use App\Models\PortFolio;
use Flasher\Laravel\Http\Response;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class FrontendController extends Controller
{
    public function __construct()
    {
        // Current Theme
        $this->theme = config('app.aliases.CURRENT_THEME');
        
    }
    
    public function index()
    {
        
        DB::table('module_landing_page_sections')->get()->groupBy('section_name')->toArray();

        $article = Article::withwhereHas('category', function ($query) {
            $query->where('model', 'article')->select('id','name','slug');
        })
            ->with('author:id,name')
            ->where(['location' => 1, 'publish' => 0])
            ->orderby('id', 'desc')
            ->limit(10)->get();
         
        $services = Article::withwhereHas('category', function ($query) {
            $query->where('model', 'services');
        })
            ->with('author:id,name,avatar')
            ->get();

        $services_category = Category::where('model', 'services')
            ->where('show', 1)->get();

        $teams = JobTeams::where('status', 1)->get();
        
        $sliders = PortFolio::where('status', 1)
            ->where('type', 'slider')->get();

        $about_page = ModelLandingPage::where('section_name', 'about')->first();

        $faq_sss = FaqSss::where('status', 1)
            ->orderby('order', 'asc')->get();

        $portfolio = PortFolio::where(['status' => 1, 'type' => 'portfolio'])
            ->select('id', 'name', 'link', 'category_id', 'image')
            // ->with('category:id,name,slug')
            ->withwherehas('category',function($q){
                $q->where('show',1)
                ->where('model','portfolio')
                ->select('id','name','slug');
            })->get();

        $all_article = Article::whereRelation('category', function ($query) {
            $query->where('model', 'article');
        })->where(['location' => 1, 'publish' => 0])->orderby('id', 'desc')->paginate(5);
        
        $referance =  PortFolio::where('type', 'portfolio')->where('status',1)->whereRelation('category',function ($q){
            $q->where('slug','referanslar');
        })->limit(20)->select('name','link','image')->get();
        
        $filePath = storage_path('app/evrimNews.json');
        if (file_exists($filePath)) {
         $jsonContent = file_get_contents($filePath);
         $newsData = json_decode($jsonContent, true);
         $newsList =  array_slice($newsData['haberlist'], 0, 6);
        }

        

        //     $module_pages['consultants'] = 'consultantsSection';
        //     $module_pages['courses'] = 'coursesSection';
        // }
        // // call page sections
        // foreach ($module_pages as $key => $value) {
        //     $contents->put($key, $this->$value());
        // }


        // dd($slider);


        return view( $this->theme.'.frontend.index', compact(
            "article",
            "services",
            "teams",
            "portfolio",
            "sliders",
            "services_category",
            'about_page',
            'faq_sss',
            'all_article','referance','newsList'
        ));
    }

    public function newsletter(Request $request)
    {
        
          $request->validate(
            [
                'email' => 'required|email:rfc,dns',
            ],
            [
                'email.required' => 'Eposta gereklidir.',
                'email.email' => 'Lütfen geçerli bir e-posta adresi girin.',
            ]
        );
        
           Newsletter::updateOrCreate(['email'=>$request->email]);
           $message = "OK";
           
           
        return response()->json(['message' => $message]);
    }

    public function contactsubmit(Request $request)
    {


        $validatedData =  $request->validate([
            'name' => 'required',
            'email' => 'required|email:rfc,dns',
            'message' => 'nullable|max:255',
            'resume_file' => 'sometimes|mimes:word,pdf,jpg,jpeg,webp|max:4096',
        ], [
            'name.required' => 'İsim alanı  gereklidir.',
            'email.required' => 'Eposta gereklidir.',
            'email.email' => 'Lütfen geçerli bir e-posta adresi girin.',
            'message.max' => 'Mesaj alanı en fazla 255 karakter olmalıdır.',
            'resume_file.sometimes' => 'Yüklenen dosya sadece izin verilen dosya türünde olmalıdır',
            'resume_file.mimes' => 'Yüklenen dosya sadece izin verilen dosya türünde olmalıdır',
            'resume_file.max' => 'Yüklenen dosya en fazla 4 MB büyüklükte olmalıdır  olmalıdır',

        ]);




        $contact = new InfoMessage();
        $contact->title = strip_tags($validatedData['name']);
        $contact->email = strip_tags($validatedData['email']);
        $contact->subject = $request->subject ? strip_tags($request->subject) : "-";
        $contact->content = $request->message  ? strip_tags($request->message) : "-";
        $contact->publish = 0;
        $contact->ip = request()->ip();
        $contact->type = $request->form_type ?? "info_message";
        $contact->phone =  $request->phone ?? "0";
        


        if (request()->hasFile('resume_file')) {
            $this->validate(request(), array(
                [ 'resume_file' => 'sometimes|mimes:word,pdf,jpg,jpeg,webp|max:4096'], 
                [  'resume_file.sometimes' => 'Yüklenen dosya sadece izin verilen dosya türünde olmalıdır',
                    'resume_file.mimes' => 'Yüklenen dosya sadece izin verilen dosya türünde olmalıdır',
                    'resume_file.max' => 'Yüklenen dosya  4 MB tan büyük olmamalıdır.'
                ]
            ));
            $image = request()->file('resume_file');
            if ($image->isValid()) {
                $file_upload = fileUpload($request->resume_file,'contact_file');
                $contact->resume_file=   $file_upload['path'];
            }
        }
        $contact->save();
        if ($contact) {
            $message = "OK";
        } else {
            $message = "Bilgilerinizi kontrol ederek formu tekrar gönderiniz";
        }

        return response()->json(['message' => $message] , 200);
    }



    public function blog()
    {
        
        if (request()->cat) {
            $all_article = Article::whereRelation('category', function ($query) {
                $query->where('model', 'article')
                    ->where('id',request()->cat);
            })->where(['publish' => 0])->orderby('created_at', 'desc')->paginate(8);
        }else {
            $all_article = Article::whereRelation('category', function ($query) {
                $query->where('model', 'article');
            })->where(['publish' => 0])->orderby('created_at', 'desc')->paginate(8);
        }

        $sidebar_article = Article::whereRelation('category', function ($query) {
            $query->where('model', 'article');
        })->where(['publish' => 0])->orderby('created_at', 'desc')->limit(4)->get();
                
        $categories = Category::where(['model'=>'article','show'=>1])->select('id','name')->withCount('content')->get();
        return view( $this->theme.'.frontend.pages.blog', compact('all_article', 'sidebar_article','categories'));
    }


    public function blog_detail(Request $request, $slug)
    {
        $sidebar_article = Article::whereRelation('category', function ($query) {
            $query->where('model', 'article');
        })->where(['publish' => 0])->orderby('created_at', 'desc')->limit(4)->get();

        $article = Article::where('slug', $slug)->first();
        $categories = Category::where(['model'=>'article','show'=>1])->select('id','name')->withCount('content')->get();

        return view( $this->theme.'.frontend.pages.blog_detail', compact('article', 'sidebar_article','categories'));
    }
    
    public function contact_submit(Request $request)
    {

        return view( $this->theme.'.frontend.pages.blog');
    }
    
   
    public function postDetail (int $post)
    {
       
        $id = $post; 
        $nonselect_id = [];
        $nonselect_id[]= $id;
        $filePath = storage_path('app/evrimNews.json');
        $jsonContent = file_get_contents($filePath);
        $newsData = json_decode($jsonContent, true);
        $sidebar_group = collect($newsData['haberlist'])->where('Id','!=',$id)->take(5);
        
        foreach($sidebar_group->pluck('Id')->toarray() as $ids){
            $nonselect_id[]= $ids;
        }

        $other_post = collect($newsData['haberlist'])->whereNotIn('Id', $nonselect_id)->take(5);

        $url = 'http://haber.evrim.com/Rest/HaberDetay?id='.$id;
        $response = Http::get($url);
        
       
        
        if ($response->successful()) {
            $data = $response->json();
        } else {
            return redirect()->back();
        }
        
        return view($this->theme.'.frontend.pages.post_detail',compact('data','sidebar_group','other_post'));
    }
    
    
    
    
}
