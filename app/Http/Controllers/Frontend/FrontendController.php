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
use App\Models\PortFolio;
use Flasher\Laravel\Http\Response;
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
        })->where(['location' => 1, 'publish' => 0])->orderby('id', 'desc')->paginate(5);






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


        // $saved = newsletter::isSubscribed(request('email'));
        // if($saved){
        //      toastr()->error('Bu E Posta Hesabı Kayıtlı Görünüyor.');
        // }else {
        //     Newsletter::subscribe(request('email'));
        //     toastr()->success('E Posta Hesabınız Kayıt Edilmiştir. Teşekkürler.');

        // }
        return back();
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
        $contact->subject = strip_tags($validatedData['subject']);
        $contact->content = strip_tags($validatedData['message']);
        $contact->publish = 0;
        $contact->ip = request()->ip();


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
        $contact->save();
        if ($contact) {
            $message = "OK";
            # code...
        } else {
            $message = "Bilgilerinizi kontrol ederek formu tekrar gönderiniz";
        }

        return response()->json(['message' => $message]);
    }



    public function blog()
    {
        $all_article = Article::whereRelation('category', function ($query) {
            $query->where('model', 'article');
        })->where(['publish' => 0])->orderby('id', 'asc')->paginate(5);

        $sidebar_article = Article::whereRelation('category', function ($query) {
            $query->where('model', 'article');
        })->where(['publish' => 0])->orderby('created_at', 'desc')->limit(4)->get();

        return view('frontend.pages.blog', compact('all_article', 'sidebar_article'));
    }


    public function blog_detail(Request $request, $slug)
    {
        $sidebar_article = Article::whereRelation('category', function ($query) {
            $query->where('model', 'article');
        })->where(['publish' => 0])->orderby('created_at', 'desc')->limit(4)->get();

        $article = Article::where('slug', $slug)->first();

        return view('frontend.pages.blog_detail', compact('article', 'sidebar_article'));
    }

    public function news_letter(Request $request)
    {

        return view('frontend.pages.blog');
    }

    public function contact_submit(Request $request)
    {

        return view('frontend.pages.blog');
    }
}
