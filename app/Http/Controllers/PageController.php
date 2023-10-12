<?php
namespace App\Http\Controllers;

use AllowDynamicProperties;
use App\Models\Page;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
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
    public function index(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $modul_name =$this->module_name; 
        return view('admin.page.index', compact('modul_name'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|\Illuminate\Foundation\Application|View
     */
    public function create(): View|\Illuminate\Foundation\Application|Factory|Application
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
    public function store(Request $request): RedirectResponse
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
        $model->title = strip_tags(request('title'));
        $model->slug = request('title');
        $model->detail = request('detail');
        $model->publish = request('publish');
        $model->page_type = request('page_type');
        $model->parentpage = request('parentpage');
        
        
        if(request()->hasFile('image')) {
            $this->validate(request(), array('image' => 'sometimes|mimes:png,jpg,jpeg,gif|max:4096'));
            $image = request()->file('image');
            $filename = time() . '-image-' . $model->slug . '.' . $image->extension();
            if($image->isValid()) {
                $endfolder = 'uploads';
                $file_dir = "/uploads/" . $filename;
                $image->move($endfolder, $filename);
                $model->image = $file_dir;
            }
        }
        
        if(request()->hasFile('pdf')) {
            $this->validate(request(), array('pdf' => 'file|mimes:pdf|max:4096'));
            $pdf = request()->file('pdf');
            $filename = time() . "-" . $model->slug . '.' . $pdf->extension();
            if($pdf->isValid()) {
                $endfolder = 'uploads';
                $file_dir = "/uploads/" . $filename;
                $pdf->move($endfolder, $filename);
                $model->pdf = $file_dir;
            }
        }
        
        $model->save();
        
   
        if($model) {
            toastr()->success('İşlem başarılı şekilde tamamlanmıştır', 'Başarılı ');
        } else {
            toastr()->error('İşlem sırasında bir hata meydana gelmiştir.', 'Başarısız !!! ');
        }
        return redirect()->route('page.edit', ['id' => $model->id]);
        
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
    public function edit($id): View|Factory|Application
    {
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
    public function update(Request $request, $id): RedirectResponse
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
        
        $model = Page::find($id);;
        $model->title = strip_tags(request('title'));
        $model->slug = Str::slug(request('title'));
        $model->detail = request('detail');
        $model->publish = request('publish');
        $model->page_type = request('page_type');
        $model->parentpage = request('parentpage');
        
        
        if(request()->hasFile('image')) {
            $this->validate(request(), array('image' => 'sometimes|mimes:png,jpg,jpeg,gif|max:4096'));
            $image = request()->file('image');
            $filename = time() . '-image-' . $model->slug . '.' . $image->extension();
            if($image->isValid()) {
                $endfolder = 'uploads';
                $file_dir = "/uploads/" . $filename;
                $image->move($endfolder, $filename);
                $model->image = $file_dir;
            }
        }
        
        if(request()->hasFile('pdf')) {
            $this->validate(request(), array('pdf' => 'file|mimes:pdf|max:4096'));
            $pdf = request()->file('pdf');
            $filename = time() . "-" . $model->slug . '.' . $pdf->extension();
            if($pdf->isValid()) {
                $endfolder = 'uploads';
                $file_dir = "/uploads/" . $filename;
                $pdf->move($endfolder, $filename);
                $model->pdf = $file_dir;
            }
        }
        
        $model->update();
        
        
        if($model) {
            toastr()->success('İşlem başarılı şekilde tamamlanmıştır', 'Başarılı ');
        } else {
            toastr()->error('İşlem sırasında bir hata meydana gelmiştir.', 'Başarısız !!! ');
        }
        return redirect()->route('page.edit', ['id' => $model->id]);
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
