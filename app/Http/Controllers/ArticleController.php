<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
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
        $article = $this->model_name::latest()
            ->with('category', 'author:id,name,avatar')
            ->select(
                'id',
                'short_detail',
                'title',
                'category_id',
                'user_id',
                'created_at'
            );
            
        return DataTables::of($article)
            ->addIndexColumn()

            ->editColumn('category', function ($data) {
                return $data['category']->name;
            })

            ->editColumn('user', function ($data) {
                return $data['author']->name ?  $data['author'] : "";
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
        $post_category = Category::where(['model' => 'article','show' => '1'])->get();

        $modul_name = $this->module_name;
        return view('admin.' . $this->directory . '.create', compact('post_category', 'modul_name'));
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
                'short_detail.required' => 'Makale Özeti gereklidir.',
                'short_detail.max' => 'Makale Özeti alanı en fazla 250 karakter olmalıdır.',
                'detail.required' => 'Makale detayı gereklidir.',
            ]
        );





        $data_array = $request->except(
            'image',
            '_token'

        );

        $post = $this->model_name::create($data_array);

        $slug = slug_format(Str::limit($request->title, 60)) . '-' . $post->id;


        if (request()->hasFile('image')) {
            $this->validate(request(), array('image' => 'sometimes|mimes:png,jpg,jpeg,gif|max:4096'));
            $image = request()->file('image');
            if ($image->isValid()) {
                $post->image = '/storage/' . $request->image->store('articles', 'public');
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
    public function edit(Article  $model)
    {
        $post_category = Category::where(['model' => 'article','show' => '1'])->get();
        $modul_name = $this->module_name;


        return view('admin.' . $this->directory . '.edit', compact('post_category', 'model', 'modul_name'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
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
                'short_detail.required' => 'Makale Özeti gereklidir.',
                'short_detail.max' => 'Makale Özeti alanı en fazla 250 karakter olmalıdır.',
                'detail.required' => 'Makale detayı gereklidir.',
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
                $data_array['image'] = '/storage/' . $request->image->store('articles', 'public');
            }
        }


        $post = $this->model_name::where('id', $id)->update($data_array);

        // if(!empty(request('bot'))){
        //     $post->image = request('image');
        //     $post->bot = request('bot');
        // }
        if ($post) {
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
     * @return RedirectResponse
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
        return back();
    }

    public function trashed_index()
    {
        // $post = $this->model_name::onlyTrashed()->orderBy('deleted_at', 'desc')->paginate(20);
        return view('admin.' . $this->directory . '.trash_index');
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
        // Log::info($delete_data . ' ' . 'Forcedelete post' . ' | User:' . Auth::user()->name);
        toastr()->success('İşlem başarılı şekilde tamamlanmıştır.', 'Başarılı');
        return redirect()->back();
    }
}
