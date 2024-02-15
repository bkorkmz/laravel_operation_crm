<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->model_name = "App\Models\Category";
        $this->module_name = 'category';
        $this->directory = 'category';
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $modul_name = $this->module_name;

        return view('admin.'.$this->directory.'.index', compact('modul_name'));
    }

    public function index_data()
    {
        $article = $this->model_name::with('author', 'sub_category')->orderBy('model');

        return DataTables::of($article)
            ->addIndexColumn()
            ->editColumn('name', function ($data) {
                return $data->name;
            })
            ->editColumn('model', function ($data) {
                switch ($data->model) {
                    case 'services':
                        $model = '<span class="badge badge-info">'.__('general.categories.'.$data->model).'</span>';
                        break;
                    case 'article':
                        $model = '<span class="badge badge-secondary">'.__('general.categories.'.$data->model).'</span>';
                        break;
                    case 'post':
                        $model = '<span class="badge badge-danger">'.__('general.categories.'.$data->model).'</span>';
                        break;
                    case 'product':
                        $model = '<span class="badge badge-warning">'.__('general.categories.'.$data->model).'</span>';
                        break;
                    case 'photo_gallery':
                        // code...
                        break;
                    case 'video_gallery':
                        $model = '<span class="badge badge-default">'.__('general.categories.'.$data->model).'</span>';
                        break;

                    default:
                        $model = '<span class="badge badge-info">'.__('general.categories.'.$data->model).'</span>';
                        break;
                }

                return $model;
            })
            ->editColumn('show', function ($data) {
                // return $data->show;

                if ($data->show == 1) {
                    $span = '<span class="badge badge-inverse-primary">Aktif</span>';
                } else {
                    $span = '<span class="badge badge-inverse-danger">Pasif</span>';
                }

                return $span;
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
        $post_category = Category::where(['show' => '1'])->get();

        $modul_name = $this->module_name;

        return view('admin.'.$this->directory.'.create', compact('post_category', 'modul_name'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate(
            [
                'name' => 'required|max:50',
                'model' => 'required|max:50',
                'description' => 'nullable|max:250',

            ], [],
            [
                'name' => 'Başlık .',
                'model' => 'Model .',
                'description' => 'Açıklama ',
            ]
        );
        $data_array = $request->except(
            '_token', 'image'
        );
        $data_array['parent_id'] = $request->parent_id ? $request->parent_id : 0;

        $data_array['slug'] = slug_format($request->name);

        if (request()->hasFile('image')) {
            $this->validate(request(), ['image_mini' => 'sometimes|mimes:png,jpg,jpeg,gif|max:4096']);
            $image = request()->file('image');
            if ($image->isValid()) {
                $file_upload = fileUpload($request->image, 'category', $data_array['slug']);
                $data_array['image'] = $file_upload['path'];
            }
        }

        $category = Category::create($data_array);

        if (request()->ajax()) {
            return response([
                'status' => 'success',
                'message' => 'Kategori Eklendi',
                'category' => [
                    'id' => $category->id,
                    'name' => $category->name,
                    'slug' => $category->slug],
            ]);
        }
        if ($category) {
            toastr()->success('Kategori  Eklendi ', 'Başarılı ');
        } else {
            toastr()->error('Kategori  Ekleme İşlemi Sırasında Bir Hata Oluştu ', 'Başarısız !!! ');
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
    public function edit(Category $model)
    {
        $post_category = Category::where(['model' => 'post', 'show' => '1'])->get();
        $modul_name = $this->module_name;

        return view('admin.'.$this->directory.'.edit', compact('post_category', 'model', 'modul_name'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'name' => 'required|max:50',
                'model' => 'required|max:50',
                'description' => 'nullable|max:250',

            ],
            [
                'name.required' => 'Başlık gereklidir.',
                'name.max' => 'Başlık alanı en fazla 50 karakter olömalıdır.',
                'model.required' => 'Model gereklidir.',
                'model.max' => 'Model alanı en fazla 50 karakter olömalıdır.',
                'description.max' => 'Açıklama alanı en fazla 250 karakter olömalıdır.',
            ]
        );

        $data_array = $request->except(
            '_token',
            'image'
        );

        $data_array['slug'] = slug_format($request->name);

        if (request()->hasFile('image')) {
            $this->validate(request(), ['image_mini' => 'sometimes|mimes:png,jpg,jpeg,gif|max:4096']);
            $image = request()->file('image');
            if ($image->isValid()) {

                $file_upload = fileUpload($request->image, 'category');
                $data_array['image'] = $file_upload['path'];
                // $data_array['image'] =  '/storage/' . $request->image->store('category', 'public');
            }
        }

        $category = Category::where('id', $id)->update($data_array);

        if ($category) {
            toastr()->success('Kategori  Eklendi ', 'Başarılı ');
        } else {
            toastr()->error('Kategori  Ekleme İşlemi Sırasında Bir Hata Oluştu ', 'Başarısız !!! ');
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {

        $post = $this->model_name::findOrFail($id);

        if ($post) {
            $post->delete();
        }

        if (request()->ajax()) {
            if ($post) {
                return response()->json(['status' => 'success'], 200);
            } else {
                return response()->json(['status' => 'eeror'], 200);
            }
        }

        if ($post) {
            -toastr()->success('İşlem başarılı şekilde tamamlanmıştır.', 'Başarılı');
        } else {
            toastr()->error('Başarısız', 'İşlem sırasında bir hata meydana gelmiştir.');
        }

        return back();
    }

    public function trashed_index()
    {
        // $post = $this->model_name::onlyTrashed()->orderBy('deleted_at', 'desc')->paginate(20);
        $modul_name = $this->module_name;

        return view('admin.'.$this->directory.'.trash_index', compact('modul_name'));
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

    public function parentCategoryData(Request $request)
    {


        $data = Category::where('model', $request->model)->where('show', 1)->parentNull()
            ->with(['parent' => function ($query) {
                $query->where('show', 1);
            }])
            ->get()
            ->map(function ($category) {

                return [
                    'id' => $category->id,
                    'name' => $category->name,
                    'model' => $category->model,
                    'parent' => $category['parent'],
                ];
            });
        if(blank($data)){
            return response()->json(['status'=>'error','message'=>'No_data'],404);
        }else{
            return $this->appendCategories($data, 0);
        }


    }

    public function appendCategories($categories, $level): array
    {

        foreach ($categories as $item) {
            $dataArray[] = [
                'id' => $item['id'],
                'name' => str_repeat('--', $level).$item['name'],
                'model' => $item['model'],
                'parent' => ($item['parent'] && count($item['parent']) > 0) ? $this->appendCategories($item['parent'], $level + 1) : '',
            ];

        }

        return $dataArray;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function categoryData()
    {
        $data = Category::where('show', 1)
            ->parentNull()
            ->with(['parent' => function ($query) {
                $query->where('show', 1);
            }])->select('id', 'name', 'model')
            ->get()
            ->groupBy('model')
            ->map(function ($group) {
                return $this->subCategory($group);
            });

        $arrayData = [];
        foreach ($data as $key => $dt) {
            $arrayData[] = [
                'text' => __('general.categories.'.$key),
                'children' => $dt,
                'state' => [
                    'disabled' => true,
                ],
            ];
        }

        return response()->json($arrayData);

    }

    public function subCategory($categories): array
    {
        $dataArray = [];
        foreach ($categories as $item) {
            $dataArray[] = [
                'id' => $item['id'],
                'text' => $item['name'],
                'model' => $item['model'],
                'children' => $this->subCategory($item['parent']),
            ];
        }

        return $dataArray;
    }
}
