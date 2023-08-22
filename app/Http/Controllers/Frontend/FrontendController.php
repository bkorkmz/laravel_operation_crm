<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\FaqSss;
use App\Models\InfoMessage;
use App\Models\JobTeams;
use App\Models\ModelLandingPage;
use App\Models\PortFolio;
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
        })->get();

        $services = Article::whereRelation('category', function ($query) {
            $query->where('model', 'services');
        })->get();

        $services_category = Category::where('model','services')->where('show',1)->get();
        // $services_category = Category::where('model','services')->get();

        $teams = JobTeams::where('status',1)->get();

        $portfolio = PortFolio::where('status',1)->where('type','portfolio')->get();
        $slider = PortFolio::where('status',1)->where('type','slider')->get();

        $about_page = ModelLandingPage::where('section_name', 'about')->first();

        $faq_sss = FaqSss::where('status',1)->get();

        $portfolio = PortFolio::where(['status' => 1, 'type' => 'portfolio'])
        ->select('id', 'name', 'link', 'category_id', 'image')
        ->with('category:id,name,slug')
        ->get();
        // dd( $faq_sss);




   
        //     $module_pages['consultants'] = 'consultantsSection';
        //     $module_pages['courses'] = 'coursesSection';
        // }
        // // call page sections
        // foreach ($module_pages as $key => $value) {
        //     $contents->put($key, $this->$value());
        // }


// dd($slider);


        return view('frontend.index',compact(
            "article",
            "services",
            "teams",
            "portfolio","slider","services_category",'about_page','faq_sss'
        ));
    }

    public function newsletter(Request $request)
    {
        $request->validate(
            [
                'email' => 'required',
            ],
            [
                'email.required' => 'E Posta adresi gereklidir.',
            ]
        );


        $saved = newsletter::isSubscribed(request('email'));
        if($saved){
             toastr()->error('Bu E Posta Hesabı Kayıtlı Görünüyor.');
        }else {
            Newsletter::subscribe(request('email'));
            toastr()->success('E Posta Hesabınız Kayıt Edilmiştir. Teşekkürler.');

        }
        return back();
    }

    public function contactsubmit(Request $request)
    {

        $validatedData =  $request->validate([
            'title' => 'required',
            'email' => 'required|email|max:255|email:rfc,dns',
            'content' => 'required',
        ], [
            'title.required' => 'Konu alanı  gereklidir.',
            'email.required' => 'Eposta gereklidir.',
            'email.email' => 'Lütfen geçerli bir e-posta adresi girin.',
            'content.required' => 'Mesaj alanı  gereklidir.',
        ]);

        
//        $curlOpts = [
//            CURLOPT_CAINFO => base_path('cacert.pem'),
//        ];
//        $response = Http::withOptions(['curl' => $curlOpts])->get("https://api.myip.com/");
//
//        $locationData = $response->json();
        // dd(json_encode($locationData));

        // Create message object and store in database
        $contact = new InfoMessage();
        $contact->title = strip_tags($validatedData['title']);
        $contact->email = strip_tags($validatedData['email']);
        $contact->content = strip_tags($validatedData['content']);
        $contact->publish = 0;
        $contact->ip = Request::ip();
//        $contact->location = json_encode($locationData);
       $contact->save();








        Log::info('message :'. $contact->title.'Email :'.$contact->email  );
        $contact->save();
        if($contact){
             toastr()->success(' İşlem başarılı Mesajınız yöneticiye gönderilmiştir.');
        }else {
             toastr()->error('İşlem sırasında bir hata oluştu .');
        }
        return back();

    }



}
