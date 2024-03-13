<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\testScoreSendMail;
use App\Models\Article;
use App\Models\Category;
use App\Models\InfoMessage;
use App\Models\Newsletter;
use App\Models\Order;
use App\Models\Page;
use App\Models\PortFolio;
use App\Models\Products;
use App\Models\Promotion;
use App\Models\Test;
use App\Models\TestDefinition;
use Carbon\Carbon;
use Cart;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;

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

        $portfolios = PortFolio::where('type', 'slider')
            ->where('status', 1);
        $treeSlider = $portfolios->where('banner_image',2)->get();


        return compact('treeSlider');
    }

    public function sliders(): array
    {
        $portfolios = PortFolio::where('type', 'slider')
            ->where('status', 1)
            ->where(function($query) {
                $query->where('banner_image', 0)
                    ->orWhere('banner_image', 1)
                    ->orWhereNull('banner_image');
            })->latest()
            ->get();
        $sliders = $portfolios->where('banner_image', 0)->where('banner_image',Null);
        $banners = $portfolios->where('banner_image', 1);


        return compact('sliders', 'banners');
    }

    public function categorySliders(): array // Slider altı kategori slider alanı
    {
        $categories = Category::product()->where(['show' => 1])->whereHas('getProduct')->withCount('getProduct')->get();

        return compact('categories');
    }

    public function DailyBestSells() //Öne çıkan kategori alanı 1
    {
        $promotionCategoryOne = Promotion::where('id', 1)
            ->whereHas('categories.getProduct')
            ->with(['categories' => function ($query) {
                $query->product()
                    ->with('getProduct');
            }])->first();

        return compact('promotionCategoryOne');
    }

    public function dealsOfDay()       // Öne çıkan kategori alanı 2
    {
        $promotionCategoryTwo = Promotion::where('id', 2)
            ->whereHas('categories.getProduct', function (Builder $query) {
                $query->where('show', 1);
            })->with(['categories' => function ($query) {
                $query->product()
                    ->with('getProduct', function ($query) {
                        $query->limit(4);
                    });
            }])->first();

        return compact('promotionCategoryTwo');

    }

    public function topSelling()       // Öne çıkan kategori alanı 3
    {
        $groupedProducts = [];
        $promotionCategoryTree = Promotion::where('id', 3)
            ->whereHas('categories.getProduct', function (Builder $query) {
                $query->where('show', 1);
            })->with(['categories' => function ($query) {
                $query->product()
                    ->with('getProduct',function ($query) {
                        $query->latest()
                            ->limit(12);
                    });
            }])->first();
        if (!blank($promotionCategoryTree)){
            if (!blank($promotionCategoryTree['categories'])){
                $products = collect($promotionCategoryTree->categories->pluck('getProduct')->collapse());

                $groupSize = ceil($products->count() / 4);
                $groupedProducts = $products->chunk($groupSize);
            }

        }



        return compact('promotionCategoryTree','groupedProducts');

    }

    public function index()
    {
        $contents = collect();

        $pages['sliders'] = 'sliders'; // Slider
        $pages['bestSalesProduct'] = 'bestSalesProduct';   // Slider tanıtım
        $pages['categorySliders'] = 'categorySliders'; // Kategoriler
        $pages['popularProducts'] = 'popularProducts'; // Popüler ürünler
        $pages['DailyBestSells'] = 'DailyBestSells';
        $pages['dealsOfDay'] = 'dealsOfDay';
        $pages['topSelling'] = 'topSelling';

        //                        $pages['end_deals'] = 'end_deals';

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
            ->where('id', $id)
            ->select('id', 'attributes', 'name', 'photo', 'price', 'old_price', 'slug', 'stock', 'short_detail', 'created_at')
            ->with('category:id,name')
            ->first();

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
    public function myaccount()
    {
        $orders = Order::where('user_id', Auth::user()->id)->get();
        $previousUrl = URL::previous();
        if (strpos($previousUrl, route('login')) !== false) {
            if (Cart::count() > 0) {
                return redirect()->route('frontend.cart');
            }
        }

        return view($this->theme.'.frontend.cart.myaccount', compact('orders'));
    }

    public function cart_add(Request $request, $slug)
    {
        $product = Products::where('slug', $slug)->first();
        if (!blank($product)){
            if ($product->stock > 0){
                Cart::add(
                    [
                        'id' => $product->id,
                        'name' => $product->name,
                        'qty' => 1,
                        'price' => $product->price,
                        'options' => ['attributes' => $product->attributes, 'photo' => $product->photo],
                    ]
                );
                $message = [
                    'status' =>'success',
                    'message'=>'Ürün sepete eklendi'
                ];

                $statusCode = 200;
            }else{
                $message = [
                    'status' =>'error',
                    'message'=>'Ürün stokta yok'
                ];
                $statusCode = 409;
            }

        }else {
            $message = [
                'status' =>'error',
                'message'=>'Doğru ürün üzerinde işlem yaptığınızdan emin olun.Bu ürün yok'
            ];
            $statusCode = 404 ;
        }
        $message['cartCount']= [
            'cart_count' =>  Cart::count(),
            'cart_total' =>  Cart::total(),
            'tax' =>Cart::tax(),
            'sub_total' =>   Cart::total() -  Cart::tax(),
        ];



        if ($request->ajax()){
            return response()->json($message,$statusCode);
        }

        return redirect(route('frontend.cart'));
    }

    public function cart_update(Request $request, $rowId, $qty)
    {
        $qty = strip_tags($qty);
        Cart::update($rowId, $qty);

        //$arr = ['qty' => $qty, 'rowId' => $rowId];

        return response()->json("ok");
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
        $cart_content_count = Cart::content()->count();

        return view($this->theme.'.frontend.cart.cart', compact('cart_content', 'cart_content_count'));
    }

    public function paytrOdeme()
    {

        if (! Auth::check()) {
            return redirect(route('register'));
            exit();
        }

        if (Auth::user()->address == null || Auth::user()->phone == null) {
            return redirect(route('frontend.myaccount'));
            exit();
        }

        $total_price = Cart::total();
        $cart_content = Cart::content();
        $arrayProduct = json_decode(json_encode($cart_content), true);

        //
        //# API Entegrasyon Bilgileri - Mağaza paneline giriş yaparak BİLGİ sayfasından alabilirsiniz.
        $merchant_id = '441360';
        $merchant_key = 'uUUo5Hux3AdnQytF';
        $merchant_salt = 'iBiHxBFirPJS8QnK';
        //

        $email = Auth::user()->email;
        //

        $payment_amount = $total_price * 100; //9.99 için 9.99 * 100 = 999 gönderilmelidir.
        //
        //# Sipariş numarası: Her işlemde benzersiz olmalıdır!! Bu bilgi bildirim sayfanıza yapılacak bildirimde geri gönderilir.
        $merchant_oid = md5($email).rand(0, 999);
        session(['merchant_oid' => $merchant_oid]);
        //

        $user_name = Auth::user()->name;

        $user_address = Auth::user()->address;

        $user_phone = Auth::user()->phone;
        //
        //# Başarılı ödeme sonrası müşterinizin yönlendirileceği sayfa
        //# !!! Bu sayfa siparişi onaylayacağınız sayfa değildir! Yalnızca müşterinizi bilgilendireceğiniz sayfadır!
        //# !!! Siparişi onaylayacağız sayfa "Bildirim URL" sayfasıdır (Bakınız: 2.ADIM Klasörü).
        $merchant_ok_url = route('paytrOdemeBasarili');
        //
        //# Ödeme sürecinde beklenmedik bir hata oluşması durumunda müşterinizin yönlendirileceği sayfa
        //# !!! Bu sayfa siparişi iptal edeceğiniz sayfa değildir! Yalnızca müşterinizi bilgilendireceğiniz sayfadır!
        //# !!! Siparişi iptal edeceğiniz sayfa "Bildirim URL" sayfasıdır (Bakınız: 2.ADIM Klasörü).
        $merchant_fail_url = route('paytrOdemeBasarisiz');
        //
        //# Müşterinin sepet/sipariş içeriği
        $user_basket = base64_encode(json_encode(
            $arrayProduct
        ));
        //
        /* ÖRNEK $user_basket oluşturma - Ürün adedine göre array'leri çoğaltabilirsiniz
        $user_basket = base64_encode(json_encode(array(
            array("Örnek ürün 1", "18.00", 1), // 1. ürün (Ürün Ad - Birim Fiyat - Adet )
            array("Örnek ürün 2", "33.25", 2), // 2. ürün (Ürün Ad - Birim Fiyat - Adet )
            array("Örnek ürün 3", "45.42", 1)  // 3. ürün (Ürün Ad - Birim Fiyat - Adet )
        )));
        */
        //###########################################################################################

        //# Kullanıcının IP adresi
        if (isset($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }

        $user_ip = $ip;
        //#

        //# İşlem zaman aşımı süresi - dakika cinsinden
        $timeout_limit = '30';

        //# Hata mesajlarının ekrana basılması için entegrasyon ve test sürecinde 1 olarak bırakın. Daha sonra 0 yapabilirsiniz.
        $debug_on = 1;

        //# Mağaza canlı modda iken test işlem yapmak için 1 olarak gönderilebilir.
        $test_mode = 0;

        $no_installment = 0; // Taksit yapılmasını istemiyorsanız, sadece tek çekim sunacaksanız 1 yapın

        //# Sayfada görüntülenecek taksit adedini sınırlamak istiyorsanız uygun şekilde değiştirin.
        //# Sıfır (0) gönderilmesi durumunda yürürlükteki en fazla izin verilen taksit geçerli olur.
        $max_installment = 0;

        $currency = 'TL';

        //###### Bu kısımda herhangi bir değişiklik yapmanıza gerek yoktur. #######
        $hash_str = $merchant_id.$user_ip.$merchant_oid.$email.$payment_amount.$user_basket.$no_installment.$max_installment.$currency.$test_mode;
        $paytr_token = base64_encode(hash_hmac('sha256', $hash_str.$merchant_salt, $merchant_key, true));
        $post_vals = [
            'merchant_id' => $merchant_id,
            'user_ip' => $user_ip,
            'merchant_oid' => $merchant_oid,
            'email' => $email,
            'payment_amount' => $payment_amount,
            'paytr_token' => $paytr_token,
            'user_basket' => $user_basket,
            'debug_on' => $debug_on,
            'no_installment' => $no_installment,
            'max_installment' => $max_installment,
            'user_name' => $user_name,
            'user_address' => $user_address,
            'user_phone' => $user_phone,
            'merchant_ok_url' => $merchant_ok_url,
            'merchant_fail_url' => $merchant_fail_url,
            'timeout_limit' => $timeout_limit,
            'currency' => $currency,
            'test_mode' => $test_mode,
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://www.paytr.com/odeme/api/get-token');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_vals);
        curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 20);

        // XXX: DİKKAT: lokal makinanızda "SSL certificate problem: unable to get local issuer certificate" uyarısı alırsanız eğer
        // aşağıdaki kodu açıp deneyebilirsiniz. ANCAK, güvenlik nedeniyle sunucunuzda (gerçek ortamınızda) bu kodun kapalı kalması çok önemlidir!
        // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        $result = @curl_exec($ch);

        if (curl_errno($ch)) {
            exit('PAYTR IFRAME connection error. err:'.curl_error($ch));
        }

        curl_close($ch);

        $result = json_decode($result, 1);

        if ($result['status'] == 'success') {
            $token = $result['token'];
        } else {
            exit('PAYTR IFRAME failed. reason:'.$result['reason']);
        }
        //########################################################################

        return view($this->theme.'.frontend.cart.paytrodeme', compact('token'));
    }

    public function paytrOdemeBasarili()
    {
        if (url()->previous() !== 'https://www.paytr.com/') {
            return redirect(route('frontend.index'));
            exit();
        }

        $merchant_oid = session('merchant_oid');
        DB::table('orders')->insert(
            [
                'merchant_oid' => $merchant_oid,
                'user_id' => Auth::user()->id,
                'order_date' => date('Y-m-d H:i:s'),
                'detail' => json_encode($cart_content = Cart::content()),
                'status' => 'pending',
            ]
        );
        Cart::destroy();

        return view($this->theme.'.frontend.cart.odemebasarili');
    }

    public function paytrOdemeBasarisiz()
    {
        if (url()->previous() !== 'https://www.paytr.com/') {
            return redirect(route('frontend.index'));
            exit();
        }

        $merchant_oid = session('merchant_oid');
        DB::table('orders')->insert(
            [
                'merchant_oid' => $merchant_oid,
                'user_id' => Auth::user()->id,
                'order_date' => date('Y-m-d H:i:s'),
                'detail' => json_encode($cart_content = Cart::content()),
                'status' => 'cancelled',
            ]
        );

        return view($this->theme.'.frontend.cart.odemebasarisiz');
    }

    public function paytrOdemeBildirim(Request $request)
    {
        $post = $_POST;

        $merchant_key = 'uUUo5Hux3AdnQytF';
        $merchant_salt = 'iBiHxBFirPJS8QnK';

        //###### Bu kısımda herhangi bir değişiklik yapmanıza gerek yoktur. #######
        //
        //# POST değerleri ile hash oluştur.
        $hash = base64_encode(hash_hmac('sha256', $post['merchant_oid'].$merchant_salt.$post['status'].$post['total_amount'], $merchant_key, true));
        //
        //# Oluşturulan hash'i, paytr'dan gelen post içindeki hash ile karşılaştır (isteğin paytr'dan geldiğine ve değişmediğine emin olmak için)
        //# Bu işlemi yapmazsanız maddi zarara uğramanız olasıdır.
        if ($hash != $post['hash']) {
            exit('PAYTR notification failed: bad hash');
        }
        //##########################################################################

        $merchant_oid = $post['merchant_oid'];
        if ($post['status'] == 'success') { //# Ödeme Onaylandı
            DB::table('orders')->where('merchant_oid', $merchant_oid)->update(['status' => 'completed']);

        } else { //# Ödemeye Onay Verilmedi

            DB::table('orders')
                ->where('merchant_oid', $merchant_oid)
                ->update(['status' => 'cancelled', 'response' => $post['failed_reason_code'].$post['failed_reason_msg']]);

        }
        unset($_SESSION[$merchant_oid]);

        //# Bildirimin alındığını PayTR sistemine bildir.
        echo 'OK';
        exit;
    }
    //#### CİHAN ÇALIŞMA ALANI #####

}
