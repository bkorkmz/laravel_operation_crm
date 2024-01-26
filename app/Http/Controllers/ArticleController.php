<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;


class ArticleController extends Controller
{
    
    public function __construct()
    {
        $this->model_name = "App\Models\Article";
        $this->module_name = "article";
        $this->directory = "article";
    }
    
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $modul_name = $this->module_name;
        return view('admin.' . $this->directory . '.index', compact('modul_name'));
    }
    
    
    public function index_data()
    {
        $model_data = $this->model_name::whereRelation('category', function ($query) {
            $query->where('model', 'article');
        })->latest()
            ->with('author:id,name,avatar','category:id,name')
            ->select(
                'id',
                'short_detail',
                'title',
                'category_id',
                'user_id',
                'created_at'
            );
        
//        dd($model_data->get());
        return DataTables::of($model_data)
            ->addIndexColumn()
            ->editColumn('category_name', function ($data) {
                return $data['category']->name;
            })
            ->editColumn('user', function ($data) {
                return $data['author'] ? $data['author']->name : "";
            })
            ->editColumn('created_at', function ($data) {
                return $data->created_at->format('d.m.Y h:i');
            })
            ->editColumn('action', function ($data) {
                return $data->id;
            })
            ->escapeColumns([])
            ->rawColumns(['action'])
            ->toJson(true);
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $post_category = Category::where(['model' => 'article', 'show' => '1'])->get();
        
        $modul_name = $this->module_name;
        return view('admin.' . $this->directory . '.create', compact('post_category', 'modul_name'));
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
          
                'title' => 'required|max:100',
                'short_detail' => 'nullable|max:250',
                'detail' => 'required',
                'slug' => 'required',
                'image' => 'image|mimes:png,jpg,jpeg,gif,webp|max:4096'
            ],
            [
                'title.required' => 'Başlık gereklidir.',
                'title.max' => 'Başlık alanı en fazla 50 karakter olmalıdır.',
                 'slug.required' => 'Makale opsiyonel  url zorunlu alandır.',
                'short_detail.max' => 'Makale Özeti alanı en fazla 250 karakter olmalıdır.',
                'detail.required' => 'Makale detayı gereklidir.',
                'image.images' => 'Yüklemek istediğiniz dosya sadece resim olmalıdır',
                'image.mimes' => 'Yüklemek istediğiniz dosyaformatı  png,jpg,jpeg,gif ve webp  olmalıdır',
                'image.max' => 'Yüklemek istediğiniz dosya boyutu 4 MB tan küçük  olmalıdır',
            ]
        );

        
        $slug = slug_format($request->slug);
        $validator->after(function ($validator) use ($slug) {
            if ($this->model_name::where('slug', $slug)->exists()) {
                $validator->errors()->add('title', 'Bu url  zaten mevcut. Lütfen slug yapısını değiştiriniz. ');
            }
        });
        
        $data_array['slug'] = $slug;



        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        
        $data_array = $request->except(
            'image', 'files',
            '_token'
        
        );
        
        
        if(request()->hasFile('image')) {
            $this->validate(request(), array('image' => 'image|mimes:png,jpg,jpeg,gif,webp|max:4096'));
            $image = request()->file('image');
            if($image->isValid()) {
                $file_upload = fileUpload($request->image, 'articles',$slug);
                $data_array['image'] = $file_upload['path'];
                // $data_array['image'] = '/storage/' . $request->image->store('articles', 'public');
            }
        }
        
        ////dom
        
        $description = $request->detail;
        if(request()->hasFile('files')) {
            $dom = new \DOMDocument();
            $dom->loadHtml($description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            $images = $dom->getElementsByTagName('img');
            
            foreach ($images as $k => $img) {
                $data = $img->getAttribute('src');
                
                list($type, $data) = explode(';', $data);
                list(, $data) = explode(',', $data);
                $data = base64_decode($data);
                $image_name = "upload/" . time() . $k . '.png';
                $path = public_path("{$image_name}");
                
                if(!file_exists(public_path("upload"))) {
                    mkdir(public_path("upload"), 0777, true);
                }
                
                file_put_contents($path, $data);
                
                $img->removeAttribute('src');
                $img->setAttribute('src', asset("{$image_name}"));
            }
            $description = $dom->saveHTML();
        }
        
        
        $data_array['detail'] = $description;
        $post = $this->model_name::create($data_array);
        
       
        if($post) {
            toastr()->success('Makale Düzenlendi  ', 'Başarılı ');
           
        } else {
            toastr()->error('Makale Düzenleme İşlemi Sırasında Bir Hata Oluştu ', 'Başarısız !!! ');
        }
        return redirect()->back();
    }
    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $model)
    {
        $post_category = Category::where(['model' => 'article', 'show' => '1'])->get();
        $modul_name = $this->module_name;
        
        return view('admin.' . $this->directory . '.edit', compact('post_category', 'model', 'modul_name'));
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(),
            [
                'title' => 'required|max:100',
                'short_detail' => 'nullable|max:250',
                'detail' => 'required',
                'slug' => 'required',
                
                'image' => 'image|mimes:png,jpg,jpeg,gif,webp|max:4096'
            ],
            [
                'title.required' => 'Başlık gereklidir.',
                'title.max' => 'Başlık alanı en fazla 50 karakter olmalıdır.',
                'short_detail.required' => 'Makale Özeti gereklidir.',
                'short_detail.max' => 'Makale Özeti alanı en fazla 250 karakter olmalıdır.',
                'detail.required' => 'Makale detayı gereklidir.',
                'image.images' => 'Yüklemek istediğiniz dosya sadece resim olmalıdır',
                'image.mimes' => 'Yüklemek istediğiniz dosyaformatı  png,jpg,jpeg,gif ve webp  olmalıdır',
                'image.max' => 'Yüklemek istediğiniz dosya boyutu 4 MB tan küçük  olmalıdır',
            ]
        );
        
        $data_array = $request->except(
            'image', 'files',
            'image_main',
            'image_top',
            'image_mini',
            '_token'
        );

        $slug = slug_format($request->slug);
        $has_article=$this->model_name::where('slug', $slug)->first();
        $validator->after(function ($validator) use ($has_article,$id) {
            if ($has_article) {
                if ($has_article->id != $id) {
                    $validator->errors()->add('title', 'Bu başlık zaten mevcut. Lütfen başlığı değiştiriniz. ');
                }
            }
        });
        
        $data_array['slug'] = $slug;

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        

        if(request()->hasFile('image')) {
            $this->validate(request(), array('image' => 'image|mimes:png,jpg,jpeg,gif|max:4096'));
            $image = request()->file('image');
            if($image->isValid()) {
                $file_upload = fileUpload($request->image, 'articles',$slug);
                
                $data_array['image'] = $file_upload['path'];
                // $data_array['image'] = '/storage/' . $request->image->store('articles', 'public');
            }
        }
        $description = $request->detail;
        if(request()->hasFile('files')) {
            $dom = new \DOMDocument();
            $dom->loadHtml($description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            $images = $dom->getElementsByTagName('img');
            
            foreach ($images as $k => $img) {
                $data = $img->getAttribute('src');
                
                list($type, $data) = explode(';', $data);
                list(, $data) = explode(',', $data);
                $data = base64_decode($data);
                $image_name = "upload/" . time() . $k . '.png';
                $path = public_path("{$image_name}");
                
                if(!file_exists(public_path("upload"))) {
                    mkdir(public_path("upload"), 0777, true);
                }
                
                file_put_contents($path, $data);
                
                $img->removeAttribute('src');
                $img->setAttribute('src', asset("{$image_name}"));
            }
            $description = $dom->saveHTML();
        }
        
        
        $data_array['detail'] = $description;
        
        
        $post = $this->model_name::where('id', $id)->update($data_array);
        
        
        if($post) {
            toastr()->success('Makale Düzenlendi  ', 'Başarılı ');
        } else {
            toastr()->error('Makale Düzenleme İşlemi Sırasında Bir Hata Oluştu ', 'Başarısız !!! ');
        }
        return redirect()->back();
    }
    
    
    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        
        $post = $this->model_name::findOrFail($id);
        if($post) {
            $post->delete();
            // Log::info($post . ' ' . 'Delete user' . ' | User:' . Auth::user()->name);
            toastr()->success('İşlem başarılı şekilde tamamlanmıştır.', 'Başarılı');
        } else {
            toastr()->error('Başarısız', 'İşlem sırasında bir hata meydana gelmiştir.');
        }
        return back();
    }
    
    public function trashed_index()
    {
        $modul_name = $this->module_name;
        return view('admin.' . $this->directory . '.trash_index', compact('modul_name'));
    }
    
    
    public function trashed_data()
    {
        $model_data = $this->model_name::onlyTrashed()
            ->whereRelation('category', function ($query) {
                $query->where('model', 'article');
            })->with('author:id,name,avatar')
            ->select(
                'id',
                'short_detail',
                'title',
                'category_id',
                'user_id',
                'deleted_at'
            )->orderBy('deleted_at', 'desc');
        
        return DataTables::of($model_data)
            ->addIndexColumn()
            ->editColumn('category', function ($data) {
                return $data['category']->name;
            })
            ->editColumn('user', function ($data) {
                return $data['author']->name;
            })
            ->editColumn('deleted_date', function ($data) {
                return $data->deleted_at->format('d.m.Y h:i');
            })
            ->editColumn('action', function ($data) {
                return $data->id;
            })
            ->escapeColumns([])
            ->rawColumns(['action'])
            ->toJson(true);
    }
    
    public function restore($id)
    {
        $post = $this->model_name::withTrashed()->where('id', $id)->first();
        $post->restore();
        toastr()->success('İşlem başarılı şekilde tamamlanmıştır.', 'Başarılı');
        return back();
    }
    
    public function trashed($id)
    {
        $delete_data = $this->model_name::withTrashed()->findOrFail($id);
        $delete_data->forceDelete();
        // Log::info($delete_data . ' ' . 'Forcedelete post' . ' | User:' . Auth::user()->name);
       
        toastr()->success('İşlem başarılı şekilde tamamlanmıştır.', 'Başarılı');
        return redirect()->back();
    }


// Services
    
    public function services_index()
    {
        // dd('burdasın');
        $modul_name = "services";
        return view('admin.services.index', compact('modul_name'));
    }
    
    public function services_index_data()
    {
        
        
        $model_data = $this->model_name::whereRelation('category', function ($query) {
            $query->where('model', 'services');
        })
            ->select(
                'id',
                'short_detail',
                'title',
                'category_id',
                'user_id',
                'created_at'
            )->with('author:id,name,avatar');
        
        
        return DataTables::of($model_data)
            ->addIndexColumn()
            ->editColumn('category', function ($data) {
                return $data['category']->name;
            })
            ->editColumn('user', function ($data) {
                return $data['author']->name;
            })
            ->editColumn('created_at', function ($data) {
                return $data->created_at->format('d.m.Y h:i');
            })
            ->editColumn('action', function ($data) {
                return $data->id;
            })
            ->escapeColumns([])
            ->rawColumns(['action'])
            ->toJson(true);
    }
    
    public function services_create()
    {
        $modul_name = "services";
        $post_category = Category::where(['model' => 'services', 'show' => '1'])->get();
        return view('admin.services.create', compact('modul_name', 'post_category'));
    }
    
    public function services_store(Request $request)
    {
        
        $validator = Validator::make($request->all(),
            [
                'title' => 'required|max:50',
                'short_detail' => 'nullable|max:250',
                'detail' => 'required',
                'image' => 'image|mimes:png,jpg,jpeg,gif,webp|max:4096'
            ],
            [
                'title.required' => 'Başlık gereklidir.',
                'title.max' => 'Başlık alanı en fazla 50 karakter olmalıdır.',
                // 'short_detail.required' => 'Makale Özeti gereklidir.',
                'short_detail.max' => 'Makale Özeti alanı en fazla 250 karakter olmalıdır.',
                'detail.required' => 'Makale detayı gereklidir.',
                'image.images' => 'Yüklemek istediğiniz dosya sadece resim olmalıdır',
                'image.mimes' => 'Yüklemek istediğiniz dosyaformatı  png,jpg,jpeg,gif ve webp  olmalıdır',
                'image.max' => 'Yüklemek istediğiniz dosya boyutu 4 MB tan küçük  olmalıdır',
            ]
        );
        
        
        $data_array = $request->except(
            'image', 'files',
            '_token'
        
        );
        $slug = slug_format($request->slug);
        $validator->after(function ($validator) use ($slug) {
            if ($this->model_name::where('slug', $slug)->exists()) {
                $validator->errors()->add('slug', 'Bu url  zaten mevcut. Lütfen slug yapısını değiştiriniz. ');
            }
        });
        
        $data_array['slug'] = $slug;
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        
        
        if(request()->hasFile('image')) {
            $this->validate(request(), array('image' => 'sometimes|mimes:png,jpg,jpeg,gif,webp|max:4096'));
            $image = request()->file('image');
            if($image->isValid()) {
                $file_upload = fileUpload($request->image, 'articles',$slug);
                $data_array['image'] = $file_upload['path'];
                //    $data_array['image'] = '/storage/' . $request->image->store('articles', 'public');
            }
        }
        
        $description = $request->detail;
        if(request()->hasFile('files')) {
            $dom = new \DOMDocument();
            $dom->loadHtml($description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            $images = $dom->getElementsByTagName('img');
            
            foreach ($images as $k => $img) {
                $data = $img->getAttribute('src');
                
                list($type, $data) = explode(';', $data);
                list(, $data) = explode(',', $data);
                $data = base64_decode($data);
                $image_name = "upload/" . time() . $k . '.png';
                $path = public_path("{$image_name}");
                
                if(!file_exists(public_path("upload"))) {
                    mkdir(public_path("upload"), 0777, true);
                }
                
                file_put_contents($path, $data);
                
                $img->removeAttribute('src');
                $img->setAttribute('src', asset("{$image_name}"));
            }
            $description = $dom->saveHTML();
        }
        
        
        $data_array['detail'] = $description;
        $post = $this->model_name::create($data_array);

        
        if($post) {
            toastr()->success('Makale Düzenlendi  ', 'Başarılı ');
           
        } else {
            toastr()->error('Makale Düzenleme İşlemi Sırasında Bir Hata Oluştu ', 'Başarısız !!! ');
        }
       
        return redirect()->back();
        
        
    }
    
    public function services_edit(Article $model)
    {
        $modul_name = "services";
        $category = Category::where(['model' => 'services', 'show' => '1'])->get();
        
        return view('admin.services.edit', compact('modul_name', 'model', 'category'));
    }
    
    public function services_update(Request $request, string $id)
    {
        
        $validator = Validator::make($request->all(), 
            [
                'title' => 'required|max:50',
                'short_detail' => 'nullable|max:250',
                'detail' => 'required',
                'image' => 'image|mimes:png,jpg,jpeg,gif,webp|max:4096'
            ],
            [
                'title.required' => 'Başlık gereklidir.',
                'title.max' => 'Başlık alanı en fazla 50 karakter olmalıdır.',
                'slug.required' => 'Makale opsiyonel  url zorunlu alandır.',
                'short_detail.max' => 'Makale Özeti alanı en fazla 250 karakter olmalıdır.',
                'detail.required' => 'Makale detayı gereklidir.',
                'image.images' => 'Yüklemek istediğiniz dosya sadece resim olmalıdır',
                'image.mimes' => 'Yüklemek istediğiniz dosyaformatı  png,jpg,jpeg,gif ve webp  olmalıdır',
                'image.max' => 'Yüklemek istediğiniz dosya boyutu 4 MB tan küçük  olmalıdır',
            ]
        );
        
        $data_array = $request->except(
            'image',
            'image_main',
            'image_top',
            'image_mini', 'files',
            '_token'
        );


        $slug = slug_format($request->slug);
        $has_article=$this->model_name::where('slug', $slug)->first();
        $validator->after(function ($validator) use ($has_article,$id) {
            if ($has_article) {
                if ($has_article->id != $id) {
                    $validator->errors()->add('title', 'Bu başlık zaten mevcut. Lütfen başlığı değiştiriniz. ');
                }
            }
        });




        
        $data_array['slug'] = $slug;

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }


        
        if(request()->hasFile('image')) {
            $this->validate(request(), array('image' => 'sometimes|mimes:png,jpg,jpeg,gif,webp|max:4096'));
            $image = request()->file('image');
            if($image->isValid()) {
                $file_upload = fileUpload($request->image, 'articles',$slug);
                $data_array['image'] = $file_upload['path'];
                // $data_array['image'] = '/storage/' . $request->image->store('articles', 'public');
            }
        }
        $description = $request->detail;
        if(request()->hasFile('files')) {
            $dom = new \DOMDocument();
            $dom->loadHtml($description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            $images = $dom->getElementsByTagName('img');
            
            foreach ($images as $k => $img) {
                $data = $img->getAttribute('src');
                
                list($type, $data) = explode(';', $data);
                list(, $data) = explode(',', $data);
                $data = base64_decode($data);
                $image_name = "upload/" . time() . $k . '.png';
                $path = public_path("{$image_name}");
                
                if(!file_exists(public_path("upload"))) {
                    mkdir(public_path("upload"), 0777, true);
                }
                
                file_put_contents($path, $data);
                
                $img->removeAttribute('src');
                $img->setAttribute('src', asset("{$image_name}"));
            }
            $description = $dom->saveHTML();
        }
        
        
        $data_array['detail'] = $description;
        $post = $this->model_name::where('id', $id)->update($data_array);
        
        
        if($post) {
            toastr()->success('Makale Düzenlendi  ', 'Başarılı ');
           
        } else {
            toastr()->error('Makale Düzenleme İşlemi Sırasında Bir Hata Oluştu ', 'Başarısız !!! ');
        }
       
        return redirect()->back();
    }
    
    public function services_destroy(string $id)
    {
        
        $post = Article::findOrFail($id);
        if($post) {
            $post->delete();
           
            // Log::info($post . ' ' . 'Delete user' . ' | User:' . Auth::user()->name);
            toastr()->success('İşlem başarılı şekilde tamamlanmıştır.', 'Başarılı');
        } else {
            toastr()->error('Başarısız', 'İşlem sırasında bir hata meydana gelmiştir.');
        }
        return back();
    }
    
    
   
}
