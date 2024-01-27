<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\testScoreSendMail;
use App\Models\Article;
use App\Models\Category;
use App\Models\ContactMessage;
use App\Models\FaqSss;
use App\Models\InfoMessage;
use App\Models\JobTeams;
use App\Models\ModelLandingPage;
use App\Models\Newsletter;
use App\Models\PortFolio;
use App\Models\Products;
use App\Models\Test;
use App\Models\TestDefinition;
use Illuminate\Http\RedirectResponse;
use Carbon\Carbon;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;

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
//         
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
         $newsList =  array_slice($newsData['haberlist'], 0, 12);
        }
        
        $products =  Products::where(['status' => 1])
            ->select('id', 'name', 'slug', 'description', 'price','stock','photo')
           ->get();
        
        return view( $this->theme.'.frontend.index', compact(
            "article",
            "services",
            "teams",
            "portfolio",
            "sliders",
            "services_category",
            'about_page',
            'faq_sss',
            'all_article','referance','newsList','products'
        ));
    }

    

    public function contactsubmit(Request $request)
    {


        $validatedData =  $request->validate([
            'name' => 'required',
            'email' => 'required|email:rfc,dns',
            'message' => 'nullable|max:255',
            'resume_file' => 'sometimes|mimes:word,pdf,jpg,jpeg,webp|max:4096',
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
        $contact->type = $request->form_type ?? "info_message";
        $contact->phone =  $request->phone ?? "0";

        if (request()->hasFile('resume_file')) {
            $this->validate(request(), array(
                [ 'resume_file' => 'sometimes|mimes:word,pdf,jpg,jpeg,webp|max:4096'],
                [
                  'resume_file.sometimes' => 'Yüklenen dosya sadece izin verilen dosya türünde olmalıdır',
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

    public function contact_submit(Request $request)
    {

        return view('frontend.pages.blog');
    }
    
    public function siteMap()
    {
        return siteMap();
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

    public function products(){
         Products::all();
        return view($this->theme.'.frontend.pages.products');
    }
    
        
        public function productDetail($slug){
        
        $product = Products::where('slug',$slug)->first();
        
        if(!$product){
            return back();
        }
        
        return view($this->theme.'.frontend.pages.product_detail',compact('product'));
        
        
    }
    
    
    /**
     * @return Application|Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function tests ()
    {
        
        $tests = Test::where('status',1)->whereHas('questionBank')
            ->with('questionBank')
            ->orderBy('wage_status','desc')
            ->paginate(10);
//        $tests->appends(['search' => 'votes']);
        return view($this->theme.'.frontend.test.index',compact('tests'));
    }
    

    public function test($slug, $id)
    {
        $test = Test::where('id',$id)->first();
        $questions = $test->questionBank->questions;
        $questionArray =[];
        foreach($questions as $question){
            $answers =json_decode($question->answers,true);
            $sections =[];
            foreach ($answers as $answer){
                $answerData =array_values($answer)[0];
                $sections[]= [
                    'code'=>$answerData['code'],
                    'title'=>$answerData['title'],
                ];
            }
            $questionArray[]=[
                'id'=>$question->id,
                'question'=>$question->question,
                'answers'=> $sections,
            ];
        }
        
        
        return view($this->theme.'.frontend.test.exam_test',compact('test','questionArray'));
        
    }
    public function test_definition(Request $request): RedirectResponse
    {
        
      $send_email =$request->send_email;
      $data_array = [
          'user_id'=>auth()->id() ?? 0,
          'user_email'=>auth()->user()->email ?? $request->email,
          'test_id'=> $request->test_id,
          'qbank_id'=> $request->qbank_id,
          'question_answers'=>json_encode($request->question)
          
      ];
      
      
     $createData = TestDefinition::create($data_array);
      $answerDetail =   json_encode($this->testUserScore($createData->id));
        if($createData ){
            $createData->update(['answer_details'=>$answerDetail]);
            
            if(auth()->user()){
                toastr()->success('Test sonuçlarını panelden görüntüleyebilirsiniz. ', 'Başarılı');
            }else{
                toastr()->success('Cevaplarınız kayıt edildi. ', 'Başarılı');
            }
            
            if($send_email){
                $score =   json_decode($createData->answer_details,true);
                $data  = [
                    "email"=>$createData->user_email,
                    "test_name"=>$createData->getTestData->name,
                    "true"=>$score['true'],
                    "false"=>$score['false'],
                    "create_date"=>Carbon::parse($createData->created_at)->format('d-m-Y H:i')
                ];
                
                Mail::to( $createData->user_email)->send(new testScoreSendMail($data));
                
                toastr()->success('Cevaplarını e-posta ile göndereceğiz. ', 'Başarılı');
                
            }
            return redirect()->route('frontend.tests');
         }else {
            
            toastr()->error('Cevaplarınız kayıt edilemedi. Testi eksiksiz doldurarak tekrar deneyiniz. ', 'Başarısız');
            return back();
         }
    }
    
    
    
    
    protected function testUserScore($testId): array
    {
        $test = TestDefinition::where('id',$testId)->with('getQbank.questions')->first();
        $trueAnswer = 0;
        $falseAnswer = 0;
        $empty = 0;
        $questionAnswer = json_decode($test->question_answers,true);
        
        foreach($test['getQbank']['questions'] as $question){
            $questionTrueAnswer = $question->questionAnswerTrue();
            if($questionTrueAnswer['code']== '0') {
                $empty++;
            }else{
                if($questionTrueAnswer['code'] == $questionAnswer[$question->id]){
                    $trueAnswer++;
                }else{
                    $falseAnswer++;
                }
            }
        }
        return ['true'=> $trueAnswer, 'false'=>$falseAnswer,'empty'=> $empty];
    }
}





