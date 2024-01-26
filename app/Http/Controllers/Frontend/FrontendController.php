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
use Carbon\Carbon;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
    public function index()
    {

        // $module_pages[];
        DB::table('module_landing_page_sections')->get()->groupBy('section_name')->toArray();

        $article = Article::whereRelation('category', function ($query) {
            $query->where('model', 'article');
        })->where(['location' => 1, 'publish' => 0])->orderby('id', 'desc')->limit(4)->get();

        $services = Article::whereRelation('category', function ($query) {
            $query->where('model', 'services');
          })->get();

        $services_category = Category::where('model', 'services')->where('show', 1)->get();

        $teams = JobTeams::where('status', 1)->get();

        $portfolio = PortFolio::where('status', 1)->where('type', 'portfolio')->get();
        $slider = PortFolio::where('status', 1)->where('type', 'slider')->get();

        $about_page = ModelLandingPage::where('section_name', 'about')->first();

        $faq_sss = FaqSss::where('status', 1)->orderby('order', 'asc')->get();

        $portfolio = PortFolio::where(['status' => 1, 'type' => 'portfolio'])
            ->select('id', 'name', 'link', 'category_id', 'image')
            // ->with('category:id,name,slug')
            ->wherehas('category',function($q){
                $q->where('show',1)
                ->where('model','portfolio')
                ->select('id','name','slug');
            })
            ->get();
        // dd( $faq_sss);

        $all_article = Article::whereRelation('category', function ($query) {
            $query->where('model', 'article');
        })->where(['location' => 1, 'publish' => 0])->orderby('id', 'desc')->paginate(4);






        //     $module_pages['consultants'] = 'consultantsSection';
        //     $module_pages['courses'] = 'coursesSection';
        // }
        // // call page sections
        // foreach ($module_pages as $key => $value) {
        //     $contents->put($key, $this->$value());
        // }


        // dd($slider);


        return view('frontend.index', compact(
            "article",
            "services",
            "teams",
            "portfolio",
            "slider",
            "services_category",
            'about_page',
            'faq_sss',
            'all_article'
        ));
    }
    
    public function contactsubmit(Request $request)
    {


        $validatedData =  $request->validate([
            'name' => 'required',
            'email' => 'required|email:rfc,dns',
            'subject' => 'required',
            'message' => 'required|max:255',
            'resume_file' => 'sometimes|mimes:word,pdf,jpg,jpeg,webp|max:4096',

        ], [
            'name.required' => 'İsim alanı  gereklidir.',
            'email.required' => 'Eposta gereklidir.',
            'email.email' => 'Lütfen geçerli bir e-posta adresi girin.',
            'subject.required' => 'Konu alanı  gereklidir.',
            'message.required' => 'Mesaj alanı  gereklidir.',
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
        $contact->type = $request->form_type ?? "info_form";
        $contact->phone =  $request->phone ?? "0";


        if (request()->hasFile('resume_file')) {
            $this->validate(request(), array(
                [
                    'resume_file' => 'sometimes|mimes:word,pdf,jpg,jpeg,webp|max:4096'
                ], [
                    'resume_file.sometimes' => 'Yüklenen dosya sadece izin verilen dosya türünde olmalıdır',
                    'resume_file.mimes' => 'Yüklenen dosya sadece izin verilen dosya türünde olmalıdır',
                    'resume_file.max' => 'Yüklenen dosya  4 MB tan büyük olmamalıdır.'

                ]
            ));
            $image = request()->file('resume_file');
            if ($image->isValid()) {
                $file_upload = fileUpload($request->resume_file,'contact_file');
                $contact->resume_file=   $file_upload['path'];
                // $contact->resume_file = '/storage/' . $request->resume_file->store('contact_file', 'public');
            }
        }
        //        $contact->location = json_encode($locationData);
        // dd($contact->save());

        $contact->save();
        if ($contact) {
            $message = "OK";
        } else {
            $message = "Bilgilerinizi kontrol ederek formu tekrar gönderiniz";
        }

        return response()->json(['message' => $message]);
    }



    public function blog($kategoriadi= null,$id = null)
    {
        $sidebar_article = Article::whereRelation('category', function ($query) {
            $query->where('model', 'article');
        })->where(['publish' => 0])->where(['location' => 2])
            ->latest()->limit(5)->get();

        $categories = Category::where('model', 'article')
        ->where('show',1)
        ->withwhereHas('get_article') 
        ->select('id','name','slug')
        ->withCount('get_article')
        ->orderBy('name', 'desc')
        ->get();
        
        $cat = $id;
        $search = request()->arama;
        $perPage = 8;
        
        if (!blank($cat)) {
            $categoryId = $cat;
            $article = Article::whereRelation('category', function ($query) use ($categoryId) {
                $query->where('model', 'article')
                    ->where('id', $categoryId);
            })->where(['publish' => 0,'category_id'=>$categoryId])->orderBy('id', 'desc');
            
        } else  {
            $article = Article::whereRelation('category', function ($query) {
                $query->where('model', 'article');
            })
                ->where(['publish' => 0])
                ->orderBy('id', 'desc');
        }
        
        if (!blank($search)) {
            
            $article->where('title', 'like', '%' . $search . '%');
        }
        $all_article = $article->paginate($perPage);

        return view('frontend.pages.blog', compact( 'sidebar_article','categories','all_article'));
    }
    

    public function getMoreArticles(): \Illuminate\Contracts\Foundation\Application|Factory|View|Application
    {
        
      
        $page = request()->page;
        $perPage = request()->perPage;
        $cat = request()->cat;
        $search = request()->search;
        
        if (!blank($cat)) {
            $categoryId = $cat;
            $all_article = Article::whereRelation('category', function ($query) use ($categoryId) {
                $query->where('model', 'article')
                    ->where('id', $categoryId);
            })->where(['publish' => 0,'category_id'=>$categoryId])->orderBy('id', 'desc')
                ->paginate($perPage, ['*'], 'page', $page);
            
        } else if (!blank($search)) {
            $search_value= $search;
            $all_article = Article::where(['publish' => 0])
                ->where('title', 'like', '%' . $search_value . '%') 
                ->orderBy('id', 'desc')
                ->paginate($perPage, ['*'], 'page', $page);
        }else {
            $all_article = Article::whereRelation('category', function ($query) {
                $query->where('model', 'article');
            })
                ->where(['publish' => 0])
                ->orderBy('id', 'desc')
                ->paginate($perPage, ['*'], 'page', $page);
        }

        return view('frontend.includes.more_articles',compact('all_article'));
    }

    
    public function blog_detail(Request $request, $slug)
    {  
        $article = Article::where('slug', $slug)->first();
        if($article){
            $sidebar_article = Article::whereRelation('category', function ($query) use($article) {
                $query->where('model', 'article')
                    ->where('id',$article->category_id);
            })->where(['publish' => 0])->where('id','<>', $article->id)->orderby('created_at', 'desc')->limit(4)->get();
            
            return view('frontend.pages.blog_detail', compact('article', 'sidebar_article'));
        }
     abort(404);
    }

    public function news_letter(Request $request)
    {

        return view('frontend.pages.blog');
    }
    
    public function newsletter(Request $request): JsonResponse
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

    public function contact_submit(Request $request)
    {

        return view('frontend.pages.blog');
    }
    
    public function siteMap()
    {
        return siteMap();
    }

}
