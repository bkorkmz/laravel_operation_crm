<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;


class PostController extends Controller
{

    public function __construct()
    {
        $this->model_name = "App\Models\Post";
        $this->module_name = "post";
        $this->directory = "post";
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $modul_name = $this->module_name;
        return view('admin.'.$this->directory.'.index',compact('modul_name'));
    }


    public function index_data()
    {
        $posts = $this->model_name::latest()
        ->with('category','author:id,name,avatar')
        ->select(
            'id','short_detail',
            'title',
            'category_id','user_id','created_at'
         );
        return DataTables::of($posts)
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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $post_category = Category::where(['model' => 'post','show' => '1'])->get();


        return view('admin.'.$this->directory.'.create', compact('post_category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate(
            [
                'title' => 'required|max:50',
                'short_detail' => 'required|max:250',
                'detail' => 'required',
            ],
            [
                'title.required' => 'Başlık gereklidir.',
                'title.max' => 'Başlık alanı en fazla 50 karakter olmalıdır.',
                'short_detail.required' => 'Haber Özeti gereklidir.',
                'short_detail.max' => 'Haber Özeti alanı en fazla 250 karakter olmalıdır.',
                'detail.required' => 'Haber detayı gereklidir.',
            ]
        );





        $data_array = $request->except(
            'image',
            'image_main',
            'image_top',
            'image_mini'
        );

        $post = $this->model_name::create($data_array);

        $slug = slug_format(Str::limit($request->title, 60)) . '-' . $post->id;


        if (request()->hasFile('image')) {
            $this->validate(request(), array('image' => 'sometimes|mimes:png,jpg,jpeg,gif|max:4096'));
            $image = request()->file('image');
            if ($image->isValid()) {
                
                $file_upload = fileUpload($request->image,'posts');
                $post->image =   $file_upload['path'];
                // $post->image = '/storage/' . $request->image->store('posts', 'public');
            }
        }


        if (request()->hasFile('image_top')) {
            $this->validate(request(), array('image_top' => 'sometimes|mimes:png,jpg,jpeg,gif|max:4096'));
            $image = request()->file('image_top');
            $filename = 'top-' . $slug;
            if ($image->isValid()) {
                if ($image->isValid()) {
                    
                $file_upload = fileUpload($request->image_top,'posts');
                $post->image_top=   $file_upload['path'];
                    // $post->image_top =  '/storage/' . $request->image->store('posts', 'public');
                }
            }
        }

        if (request()->hasFile('image_mini')) {
            $this->validate(request(), array('image_mini' => 'sometimes|mimes:png,jpg,jpeg,gif|max:4096'));
            $image = request()->file('image_mini');
            $filename = 'mini-' . $slug;
            if ($image->isValid()) {
                $file_upload = fileUpload($request->image_mini,'posts');
                $post->image_mini=   $file_upload['path'];
                // $post->image_mini =  '/storage/' . $request->image->store('posts', 'public');
            }
        }

        if (request()->hasFile('image_main')) {
            $this->validate(request(), array('image_main' => 'sometimes|mimes:png,jpg,jpeg,gif|max:4096'));
            $image = request()->file('image_main');
            $filename = 'main-' . $slug;
            if ($image->isValid()) {
                $file_upload = fileUpload($request->image_main,'posts');
                $post->image_main=   $file_upload['path'];
                // $post->image_main = '/storage/' . $request->image->store('posts', 'public');
            }
        }
        $post->slug =  $slug;

        $post->save();


        /*
    if($request->pushbildirim=='on'){
        \OneSignal::sendNotificationToAll(
            $post->title,
            $url =  route('frontend.post', ['categoryslug' => str_slug($post->category->name), 'id' => $post->id, 'slug' => $post->slug ]) ,
            $data = null,
            $buttons = null,
            $schedule = null
        );
    }
    */
        if ($post) {
            toastr()->success('Haber Düzenlendi  ', 'Başarılı ');
        } else {
            toastr()->error('Haber Düzenleme İşlemi Sırasında Bir Hata Oluştu ', 'Başarısız !!! ');
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
    public function edit(Post  $model)
    {
        $post = $model;
        $post_category = Category::where(['model' => 'post','show' => '1'])->get();

        return view('admin.'.$this->directory.'.edit', compact('post_category', 'post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        // dd($request->all());
        $request->validate(
            [
                'title' => 'required|max:50',
                'short_detail' => 'required|max:250',
                'detail' => 'required',
            ],
            [
                'title.required' => 'Başlık gereklidir.',
                'title.max' => 'Başlık alanı en fazla 50 karakter olmalıdır.',
                'short_detail.required' => 'Haber Özeti gereklidir.',
                'short_detail.max' => 'Haber Özeti alanı en fazla 250 karakter olmalıdır.',
                'detail.required' => 'Haber detayı gereklidir.',
            ]
        );

        $data_array = $request->except(
            'image',
            'image_main',
            'image_top',
            'image_mini',
            '_token'
        );
        $slug = slug_format(Str::limit($request->title, 60)) . '-' . $id;



        // $now = strtotime(date('Y-m-d H:i:s'));
        // $newdate = strtotime(date('Y-m-d H:i:s', strtotime($request->date)));
        // if($newdate > $now){
        //     $post->created_at = date('Y-m-d H:i:s', strtotime($request->date));
        // }


        if (request()->hasFile('image')) {
            $this->validate(request(), array('image' => 'sometimes|mimes:png,jpg,jpeg,gif|max:4096'));
            $image = request()->file('image');
            if ($image->isValid()) {

                $file_upload = fileUpload($request->image,'posts');
             $data_array['image'] =   $file_upload['path'];

                // $data_array['image'] = '/storage/' . $request->image->store('posts', 'public');
            }
        }


        if (request()->hasFile('image_top')) {
            $this->validate(request(), array('image_top' => 'sometimes|mimes:png,jpg,jpeg,gif|max:4096'));
            $image = request()->file('image_top');
            $filename = 'top-' . $slug;
            if ($image->isValid()) {
                if ($image->isValid()) {
                    
                $file_upload = fileUpload($request->image_top,'posts');
                $data_array['image_top'] =   $file_upload['path'];
                    // $data_array['image_top'] =  '/storage/' . $request->image->store('posts', 'public');
                }
            }
        }

        if (request()->hasFile('image_mini')) {
            $this->validate(request(), array('image_mini' => 'sometimes|mimes:png,jpg,jpeg,gif|max:4096'));
            $image = request()->file('image_mini');
            $filename = 'mini-' . $slug;
            if ($image->isValid()) {

                $file_upload = fileUpload($request->image_mini,'posts');
             $data_array['image_mini'] =   $file_upload['path'];
                // $data_array['image_mini'] =  '/storage/' . $request->image->store('posts', 'public');
            }
        }

        if (request()->hasFile('image_main')) {
            $this->validate(request(), array('image_main' => 'sometimes|mimes:png,jpg,jpeg,gif|max:4096'));
            $image = request()->file('image_main');
            $filename = 'main-' . $slug;
            if ($image->isValid()) {
                
                $file_upload = fileUpload($request->image_main,'posts');
             $data_array['image_main'] =   $file_upload['path'];
                // $data_array['image_main'] = '/storage/' . $request->image->store('posts', 'public');
            }
        }
        $post = $this->model_name::where('id', $id)->update($data_array);

        // if(!empty(request('bot'))){
        //     $post->image = request('image');
        //     $post->bot = request('bot');
        // }
        if ($post) {
            toastr()->success('Haber Düzenlendi  ', 'Başarılı ');
        } else {
            toastr()->error('Haber Düzenleme İşlemi Sırasında Bir Hata Oluştu ', 'Başarısız !!! ');
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
        if ($post) {
            $post->delete();
            // Log::info($post . ' ' . 'Delete user' . ' | User:' . Auth::user()->name);
            toastr()->success('İşlem başarılı şekilde tamamlanmıştır.', 'Başarılı');
        } else {
            toastr()->error('Başarısız', 'İşlem sırasında bir hata meydana gelmiştir.');
        }
        return redirect()->back();
    }

    public function trashed_index()
    {
        // $post = $this->model_name::onlyTrashed()->orderBy('deleted_at', 'desc')->paginate(20);
        return view('admin.'.$this->directory.'.trash_index');
    }


    public function trashed_data()
    {
        $posts = $this->model_name::onlyTrashed()->orderBy('deleted_at', 'desc');
        return DataTables::of($posts)
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

        toastr()->success('İşlem başarılı şekilde tamamlanmıştır.', 'Başarılı');
        return redirect()->back();
    }
    
    public function ajanss()
    {
        $modul_name = $this->module_name;
        return view('admin.'.$this->directory.'.ajans_index',compact('modul_name'));
        
    }
    
    public function getAjans(Request $request): void
    {
        
        $response = Http::get('http://haber.evrim.com/Rest/Habers?page=1&size=10');
        $newsData = $response->json();
        $filePath = storage_path('app/evrimNews.json');
        file_put_contents($filePath, json_encode($newsData));
    }
    
}
