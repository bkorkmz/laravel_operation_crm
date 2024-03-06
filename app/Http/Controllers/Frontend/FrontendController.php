<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\testScoreSendMail;
use App\Models\Article;
use App\Models\Category;
use App\Models\InfoMessage;
use App\Models\Newsletter;
use App\Models\Page;
use App\Models\PortFolio;
use App\Models\Products;
use App\Models\Test;
use App\Models\TestDefinition;
use Carbon\Carbon;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;
use Cart;

class FrontendController extends Controller
{
    public function __construct()
    {
        // Current Theme
        $this->theme = config('app.CURRENT_THEME');

    }

    public function products(): \Illuminate\Contracts\View\View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $products = Products::where(['status' => 1])->where('stock', '>', 0)->with('category:id,name,slug')->paginate('20');
        $categories = Category::product()->whereHas('getProduct')->where(['show' => 1])->withCount('getProduct')->get();

        return view($this->theme.'.frontend.pages.products', compact('products', 'categories'));

    }

    public function sliders(): array
    {
        $portfolios = PortFolio::where('type', 'slider')
            ->where('status', 1)
            ->get();
        $sliders = $portfolios->whereNull('banner_image');
        $banners = $portfolios->whereNotNull('banner_image')->first();

        return compact('sliders', 'banners');
    }


    public function popularProducts(): array
    {
        $categoriesWithPopularProducts = Category::whereHas('getProduct', function ($query) {
            $query->whereJsonContains('attributes->popular', '1')
                ->where('stock', '>', 0)
                ->where(['status' => 1]);
        })
            ->with(['getProduct' => function ($query) {
                $query->where(['status' => 1])->where('stock', '>', 0)
                    ->whereJsonContains('attributes->popular', '1')->latest()->limit(10);
            }, 'getProduct.category'])
            ->limit(5)
            ->latest()
            ->get(['id', 'name']);

        $allProduct = $categoriesWithPopularProducts->pluck('getProduct.*')->flatten()->toArray();

        return compact('categoriesWithPopularProducts', 'allProduct');
    }

    public function bestSalesProduct(): array
    {
        $products = Products::where(['status' => 1])->where('stock', '>', 0)
            ->whereJsonContains('attributes->best-sales', '1')->latest()->limit(3)->get();

        return compact('products');
    }



    public function deals_of_day()
    {

    }

    public function categorySliders(): array
    {
        $categories = Category::product()->where(['show' => 1])->whereHas('getProduct')->withCount('getProduct')->get();

        return compact('categories');
    }

    public function DailyBestSells()
    {
        //        $categories = Category::product()->where(['show' => 1])->whereHas('getProduct')->withCount('getProduct')->get();
        //
        //        return compact('categories');
    }

    public function index()
    {
        $contents = collect();

        $pages['sliders'] = 'sliders'; // Slider
        $pages['bestSalesProduct'] = 'bestSalesProduct';   // Slider tanıtım
        $pages['categorySliders'] = 'categorySliders'; // Kategori ler
        $pages['popularProducts'] = 'popularProducts'; // Popüler ürünler
        $pages['DailyBestSells'] = 'DailyBestSells';
        $pages['deals_of_day'] = 'deals_of_day';


//                $pages['top_selling'] = 'top_selling';
//                $pages['end_deals'] = 'end_deals';

        foreach ($pages as $key => $page) {
            $contents->put($key, $this->$page());
        }

        return view($this->theme.'.frontend.index', compact('contents'));

    }

    public function contactsubmit(Request $request): JsonResponse
    {

        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email:rfc,dns',
            'message' => 'nullable|max:255',
            'resume_file' => 'sometimes|mimes:word,pdf,jpg,jpeg,webp|max:4096',
            'subject' => 'required',

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
        $contact->subject = $request->subject ? strip_tags($request->subject) : '-';
        $contact->content = $request->message ? strip_tags($request->message) : '-';
        $contact->publish = 0;
        $contact->ip = request()->ip();
        $contact->type = $request->form_type ?? 'info_message';
        $contact->phone = $request->phone ?? '0';

        if (request()->hasFile('resume_file')) {
            $this->validate(request(), [
                ['resume_file' => 'sometimes|mimes:word,pdf,jpg,jpeg,webp|max:4096'],
                [
                    'resume_file.sometimes' => 'Yüklenen dosya sadece izin verilen dosya türünde olmalıdır',
                    'resume_file.mimes' => 'Yüklenen dosya sadece izin verilen dosya türünde olmalıdır',
                    'resume_file.max' => 'Yüklenen dosya  4 MB tan büyük olmamalıdır.',
                ],
            ]);
            $image = request()->file('resume_file');
            if ($image->isValid()) {
                $file_upload = fileUpload($request->resume_file, 'contact_file');
                $contact->resume_file = $file_upload['path'];
            }
        }
        $contact->save();
        if ($contact) {
            $message = 'OK';
        } else {
            $message = 'Bilgilerinizi kontrol ederek formu tekrar gönderiniz';
        }

        return response()->json(['message' => $message], 200);

    }

    public function blog($kategoriadi = null, $id = null): \Illuminate\Contracts\View\View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $sidebar_article = Article::whereRelation('category', function ($query) {
            $query->where('model', 'article');
        })->where(['publish' => 0])->where(['location' => 2])
            ->latest()->limit(5)->get();

        $categories = Category::where('model', 'article')
            ->where('show', 1)
            ->withwhereHas('get_article')
            ->select('id', 'name', 'slug')
            ->withCount('get_article')
            ->orderBy('name', 'desc')
            ->get();

        $cat = $id;
        $search = request()->arama;
        $perPage = 8;

        if (! blank($cat)) {
            $categoryId = $cat;
            $article = Article::whereRelation('category', function ($query) use ($categoryId) {
                $query->where('model', 'article')
                    ->where('id', $categoryId);
            })->where(['publish' => 0, 'category_id' => $categoryId])->orderBy('id', 'desc');

        } else {
            $article = Article::whereRelation('category', function ($query) {
                $query->where('model', 'article');
            })
                ->where(['publish' => 0])
                ->orderBy('id', 'desc');
        }

        if (! blank($search)) {

            $article->where('title', 'like', '%'.$search.'%');
        }
        $all_article = $article->paginate($perPage);

        return view($this->theme.'.frontend.pages.blog', compact('sidebar_article', 'categories', 'all_article'));
    }

    public function getMoreArticles(): \Illuminate\Contracts\Foundation\Application|Factory|View|Application
    {

        $page = request()->page;
        $perPage = request()->perPage;
        $cat = request()->cat;
        $search = request()->search;

        if (! blank($cat)) {
            $categoryId = $cat;
            $all_article = Article::whereRelation('category', function ($query) use ($categoryId) {
                $query->where('model', 'article')
                    ->where('id', $categoryId);
            })->where(['publish' => 0, 'category_id' => $categoryId])->orderBy('id', 'desc')
                ->paginate($perPage, ['*'], 'page', $page);

        } elseif (! blank($search)) {
            $search_value = $search;
            $all_article = Article::where(['publish' => 0])
                ->where('title', 'like', '%'.$search_value.'%')
                ->orderBy('id', 'desc')
                ->paginate($perPage, ['*'], 'page', $page);
        } else {
            $all_article = Article::whereRelation('category', function ($query) {
                $query->where('model', 'article');
            })
                ->where(['publish' => 0])
                ->orderBy('id', 'desc')
                ->paginate($perPage, ['*'], 'page', $page);
        }

        return view('frontend.includes.more_articles', compact('all_article'));
    }

    public function blog_detail(Request $request, $slug)
    {
        $article = Article::where('slug', $slug)->first();
        if ($article) {
            $sidebar_article = Article::whereRelation('category', function ($query) use ($article) {
                $query->where('model', 'article')
                    ->where('id', $article->category_id);
            })->where(['publish' => 0])->where('id', '<>', $article->id)->orderby('created_at', 'desc')->limit(4)->get();

            return view($this->theme.'.frontend.pages.blog_detail', compact('article', 'sidebar_article'));
        }
        abort(404);
    }

    public function news_letter(Request $request): \Illuminate\Contracts\View\View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {

        return view($this->theme.'.frontend.pages.blog');
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

        Newsletter::updateOrCreate(['email' => $request->email]);
        $message = 'OK';

        return response()->json(['message' => $message]);
    }

    public function contact_submit(Request $request): \Illuminate\Contracts\View\View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {

        return view($this->theme.'.frontend.pages.blog');
    }

    public function siteMap(): RedirectResponse
    {
        return siteMap();
    }

    public function postDetail(int $post): \Illuminate\Contracts\View\View|Application|Factory|\Illuminate\Contracts\Foundation\Application|RedirectResponse
    {

        $id = $post;
        $nonselect_id = [];
        $nonselect_id[] = $id;
        $filePath = storage_path('app/evrimNews.json');
        $jsonContent = file_get_contents($filePath);
        $newsData = json_decode($jsonContent, true);
        $sidebar_group = collect($newsData['haberlist'])->where('Id', '!=', $id)->take(5);

        foreach ($sidebar_group->pluck('Id')->toarray() as $ids) {
            $nonselect_id[] = $ids;
        }

        $other_post = collect($newsData['haberlist'])->whereNotIn('Id', $nonselect_id)->take(5);

        $url = 'http://haber.evrim.com/Rest/HaberDetay?id='.$id;
        $response = Http::get($url);

        if ($response->successful()) {
            $data = $response->json();
        } else {
            return redirect()->back();
        }

        return view($this->theme.'.frontend.pages.post_detail', compact('data', 'sidebar_group', 'other_post'));
    }

    public function productDetail($slug): \Illuminate\Contracts\View\View|Application|Factory|RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {

        $product = Products::where('slug', $slug)->with('category')->first();
        $relatedProducts = Products::where('id', '<>', $product->id)
            ->with('category', function ($query) use ($product) {
                $query->where('category_id', $product['category'][0]->id);
            })
            ->latest()
            ->limit(8)
            ->get();

        $otherProducts = $relatedProducts->splice(4); // İlk 4 ürünü al
        $newProducts = $relatedProducts;

        if (! $product) {
            return back();
        }

        $categories = Category::product()->where(['show' => 1])->whereHas('getProduct')->withCount('getProduct')->get();

        return view($this->theme.'.frontend.pages.product_detail', compact('product', 'categories', 'otherProducts', 'newProducts'));

    }

    public function tests(): \Illuminate\Contracts\View\View|Application|Factory
    {

        $tests = Test::where('status', 1)->whereHas('questionBank')
            ->with('questionBank')
            ->orderBy('wage_status', 'desc')
            ->paginate(10);

        //        $tests->appends(['search' => 'votes']);
        return view($this->theme.'.frontend.test.index', compact('tests'));
    }

    public function test($slug, $id): \Illuminate\Contracts\View\View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $test = Test::where('id', $id)->first();
        $questions = $test->questionBank->questions;
        $questionArray = [];
        foreach ($questions as $question) {
            $answers = json_decode($question->answers, true);
            $sections = [];
            foreach ($answers as $answer) {
                $answerData = array_values($answer)[0];
                $sections[] = [
                    'code' => $answerData['code'],
                    'title' => $answerData['title'],
                ];
            }
            $questionArray[] = [
                'id' => $question->id,
                'question' => $question->question,
                'answers' => $sections,
            ];
        }

        return view($this->theme.'.frontend.test.exam_test', compact('test', 'questionArray'));

    }

    public function test_definition(Request $request): RedirectResponse
    {

        $send_email = $request->send_email;
        $data_array = [
            'user_id' => auth()->id() ?? 0,
            'user_email' => auth()->user()->email ?? $request->email,
            'test_id' => $request->test_id,
            'qbank_id' => $request->qbank_id,
            'question_answers' => json_encode($request->question),

        ];

        $createData = TestDefinition::create($data_array);
        $answerDetail = json_encode($this->testUserScore($createData->id));
        if ($createData) {
            $createData->update(['answer_details' => $answerDetail]);

            if (auth()->user()) {
                toastr()->success('Test sonuçlarını panelden görüntüleyebilirsiniz. ', 'Başarılı');
            } else {
                toastr()->success('Cevaplarınız kayıt edildi. ', 'Başarılı');
            }

            if ($send_email) {
                $score = json_decode($createData->answer_details, true);
                $data = [
                    'email' => $createData->user_email,
                    'test_name' => $createData->getTestData->name,
                    'true' => $score['true'],
                    'false' => $score['false'],
                    'create_date' => Carbon::parse($createData->created_at)->format('d-m-Y H:i'),
                ];

                Mail::to($createData->user_email)->send(new testScoreSendMail($data));

                toastr()->success('Cevaplarını e-posta ile göndereceğiz. ', 'Başarılı');

            }

            return redirect()->route('frontend.tests');
        } else {

            toastr()->error('Cevaplarınız kayıt edilemedi. Testi eksiksiz doldurarak tekrar deneyiniz. ', 'Başarısız');

            return back();
        }
    }

    protected function testUserScore($testId): array
    {
        $test = TestDefinition::where('id', $testId)->with('getQbank.questions')->first();
        $trueAnswer = 0;
        $falseAnswer = 0;
        $empty = 0;
        $questionAnswer = json_decode($test->question_answers, true);

        foreach ($test['getQbank']['questions'] as $question) {
            $questionTrueAnswer = $question->questionAnswerTrue();
            if ($questionTrueAnswer['code'] == '0') {
                $empty++;
            } else {
                if ($questionTrueAnswer['code'] == $questionAnswer[$question->id]) {
                    $trueAnswer++;
                } else {
                    $falseAnswer++;
                }
            }
        }

        return ['true' => $trueAnswer, 'false' => $falseAnswer, 'empty' => $empty];
    }

    public function productInformation($id): JsonResponse
    {
        $product = Products::where('status', 1)
            ->where('id', $id)->select('id', 'attributes', 'name', 'photo', 'price', 'slug', 'stock', 'short_detail', 'created_at')
            ->with('category:id,name')->first();

        return response()->json(['product' => $product]);

    }

    public function page($model)
    {
        $page = Page::where('slug', $model)->first();
        $category = Category::product()->where('slug', $model)->where(['show' => 1])->with('getProduct')->first();

        if ($page) {

            $products = Products::whereJsonContains('attributes->popular', '1')
                ->where('stock', '>', 0)
                ->where(['status' => 1])->limit(4)->latest()->get();
            $categories = Category::product()->whereHas('getProduct')->where(['show' => 1])->withCount('getProduct')->latest()->get();

            return view($this->theme.'.frontend.pages.pages', compact('page', 'products', 'categories'));

        }
        if ($category) {
            $categories = Category::product()->whereHas('getProduct')->where(['show' => 1])->withCount('getProduct')->latest()->get();

            $getProduct = $category->getProduct()->paginate(20);

            return view($this->theme.'.frontend.pages.category_products', compact('categories', 'category', 'getProduct'));

        }

    }

    //#### CİHAN ÇALIŞMA ALANI #####
    public function cart_add(Request $request, $slug)
    {
        $product = Products::where('slug', $slug)->first();

        Cart::add(
            [
                'id' => $product->id,
                'name' => $product->name,
                'qty' => 1,
                'price' => $product->price,
                'options' => ['attributes' => $product->attributes, 'photo' => $product->photo],
            ]
        );

        return redirect(route('frontend.cart'));
    }

    public function cart_update(Request $request, $rowId)
    {
        $qty = $request->qty;
        Cart::update($rowId, $qty);

        return redirect(route('frontend.cart'));
    }

    public function cart_remove(Request $request, $rowId)
    {
        Cart::remove($rowId);

        return redirect(route('frontend.cart'));
    }

    public function cart_destroy(Request $request)
    {
        Cart::destroy();

        return redirect(route('frontend.cart'));
    }

    public function cart()
    {
        $cart_content = Cart::content();

        return view($this->theme.'.frontend.cart.cart', compact('cart_content'));
    }
    //#### CİHAN ÇALIŞMA ALANI #####

}
