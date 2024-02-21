<?php
namespace App\Http\Controllers;

use AllowDynamicProperties;
use App\Models\Page;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

#[AllowDynamicProperties] class PageController extends Controller
{

    public function __construct()
    {
        $this->model_name = "App\Models\Page";
        $this->module_name = "pages";
        $this->directory = "page";
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|\Illuminate\Foundation\Application|View
     */
    public function index(): View
    {
        $modul_name =$this->module_name;
        return view('admin.page.index', compact('modul_name'));
    }
    public function index_data()
    {
        $model_data = Page::select('id','title','page_type');
        return DataTables::of($model_data)
            ->addIndexColumn()
            ->editColumn('title', function ($data) {
                return $data->title;
            })
            ->editColumn('type', function ($data) {
                switch ($data->page_type){
                    case 1;
                        $text ="Kurumsal";
                        break;
                    case 2;
                        $text ="Hizmet";
                        break;
                    case 3;
                        $text = "Referans";
                        break;
                    default;
                        $text = "";
                        break;
                }
                return $text;
            })
            ->editColumn('action', function ($data) {
                return  $data->id;
            })
            ->escapeColumns([])
            ->rawColumns(['action'])
            ->toJson(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|\Illuminate\Foundation\Application|View
     */
    public function create(): View
    {
        $modul_name =$this->module_name;
        $pages = Page::where('publish', 0)->get();
        return view('admin.page.create', compact('pages','modul_name'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'title' => 'required',
                'detail' => 'required',
            ],
            [
                'title.required' => 'Başlık gereklidir.',
                'detail.required' => 'Sayfa detayı gereklidir.',
            ]
        );

        $model = new Page();
        $model->title = strip_tags($request->title);
        $model->detail =  $request->detail;
        $model->publish =  $request->publish;
        $model->page_type =  $request->page_type;
        $model->parentpage =  $request->parentpage;

        if ($request->slug) {
            $slug = $request->slug;
        }else {
            $slug = slug_format($request->title);
        }
        $model->slug = $slug;

        if(request()->hasFile('image')) {
            $this->validate(request(), array('image' => 'image|mimes:png,jpg,jpeg,gif|max:4096'));
            $image = request()->file('image');
            if($image->isValid()) {
                $file_upload = fileUpload($request->image, 'pages');
                $model->image = $file_upload['path'];
            }
        }

        if(request()->hasFile('pdf')) {
            $this->validate(request(), array('pdf' => 'file|mimes:pdf|max:4096'));
            $pdf = request()->file('pdf');
            if($pdf->isValid()) {
                $file_upload = fileUpload($request->pdf, 'pages');
                $model->pdf = $file_upload['path'];

            }
        }

        $model->save();

//        dd($model->id);

        if($model) {
            toastr()->success('İşlem başarılı şekilde tamamlanmıştır', 'Başarılı ');
        } else {
            toastr()->error('İşlem sırasında bir hata meydana gelmiştir.', 'Başarısız !!! ');
        }
        return redirect()->route( $this->module_name.'.edit',  $model->id);

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit($id): view
    {
//        dd($id);
        $modul_name =$this->module_name;
        $model = Page::find($id);
        $pages = Page::where('id', '!=', $id)->where('publish', 0)->get();
        return view('admin.page.edit', compact('pages', 'model','modul_name'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Request $request,Page $model): RedirectResponse
    {

        $request->validate(
            [
                'title' => 'required',
                'detail' => 'required',
            ],
            [
                'title.required' => 'Başlık gereklidir.',
                'detail.required' => 'Sayfa detayı gereklidir.',
            ]
        );

//        $model = Page::find($id);;
        $model->title = strip_tags($request->title);
        $model->detail = $request->detail;
        $model->publish = $request->publish;
        $model->page_type = $request->page_type;
        $model->parentpage = $request->parentpage;
        if ($request->slug) {
            $slug = $request->slug;
        }else {
            $slug = slug_format($request->title);
        }
        $model->slug = $slug;

        if(request()->hasFile('image')) {
            $this->validate(request(), array('image' => 'image|mimes:png,jpg,jpeg,gif|max:4096'));
            $image =  $request->file('image');
            if($image->isValid()) {
                deleteOldPicture( $model->image);
                $file_upload = fileUpload($request->image, 'pages');
                $model->image = $file_upload['path'];

            }
        }
        if(request()->hasFile('pdf')) {
            $this->validate(request(), array('pdf' => 'file|mimes:pdf|max:4096'));
            $pdf = request()->file('pdf');
            if($pdf->isValid()) {
                deleteOldPicture( $model->pdf);
                $file_upload = fileUpload($request->pdf, 'pages');
                $model->pdf = $file_upload['path'];

            }
        }

        $model->update();


        if($model) {
            toastr()->success('İşlem başarılı şekilde tamamlanmıştır', 'Başarılı ');
        } else {
            toastr()->error('İşlem sırasında bir hata meydana gelmiştir.', 'Başarısız !!! ');
        }
        return redirect()->route('pages.edit',$model->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {

        $model = Page::destroy($id);
        if($model) {
            toastr()->success('İşlem başarılı şekilde tamamlanmıştır', 'Başarılı ');
        } else {
            toastr()->error('İşlem sırasında bir hata meydana gelmiştir.', 'Başarısız !!! ');
        }
        return redirect()->back();

    }

    public function trashed_index()
    {
        $modul_name = $this->module_name;
        return view('admin.page.trash_index', compact('modul_name'));
    }

    public function trashed_data()
    {
        // Trashed
        $data = $this->model_name::onlyTrashed()
            ->select(
                'id',
                'question',
                'created_at',
                'created_at','status','deleted_at'
            )->orderBy('deleted_at', 'desc');
        return Datatables::of($data)
            ->addIndexColumn()
            ->editColumn('question', function ($data) {
                return $data->question;
            })

            ->editColumn('status', function ($data) {

                if ($data->status == 1) {
                    $span = '<span class="badge badge-inverse-primary">Aktif</span>';
                } else {
                    $span = '<span class="badge badge-inverse-danger">Pasif</span>';
                }
                return $span;
            })

            ->editColumn('created_at', function ($data) {
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
        $models = Page::withTrashed()->where('id', $id)->first();
        $models->restore();


    }

    public function trashed($id)
    {
        $delete_data = Page::withTrashed()->findOrFail($id);
        $delete_data->forceDelete();
        if($delete_data) {
            toastr()->success('İşlem başarılı şekilde tamamlanmıştır', 'Başarılı ');
        } else {
            toastr()->error('İşlem sırasında bir hata meydana gelmiştir.', 'Başarısız !!! ');
        }
        return $id;
    }


}
