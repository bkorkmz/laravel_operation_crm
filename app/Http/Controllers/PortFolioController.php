<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\PortFolio;
use Faker\Guesser\Name;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;


class PortFolioController extends Controller

{

    public function __construct()
    {
        $this->model_name = "App\Models\Portfolio";
        $this->module_name = "portfolio";
        $this->directory = "portfolio";
    }



    public function index()
    {
        $module_name = 'slider';
        return view('admin.slider.index', compact('module_name'));
    }

    public function index_data()
    {
        $module_name = 'slider';
        $data = PortFolio::where('type', 'slider');
        return DataTables::of($data)
            ->addIndexColumn()
            ->editColumn('name', function ($data) {
                return '<strong>' . $data->name . '</strong>';
            })
            ->editColumn('image', function ($data) {
                return '<img class="img-fluid slider__images" src="' . $data->image . '" alt="' . $data->name . '" width="80" height="80"></img>';
            })
            ->editColumn('link', function ($data) {
                return '<a data-toggle="tooltip"  title="' . $data->link . '"  target="_blank" href="' . $data->link . '" >' . Str::limit($data->link, "20", "...") . '</a>';
            }) ->editColumn('link', function ($data) {
                return '<a data-toggle="tooltip"  title="' . $data->link . '"  target="_blank" href="' . $data->link . '" >' . Str::limit($data->link, "20", "...") . '</a>';
            })
            ->editColumn('created_at', function ($data) {
                return $data->created_at ? $data->created_at->format('d-m-Y') : "";
            })
            ->editColumn('status', function ($data) {
                if ($data->status == 1) {
                    $span = '<span class="badge badge-inverse-primary p-2 w-100">' . __('general.active') . ' </span >';
                } else {
                    $span = '<span class="badge badge-inverse-danger p-2 w-100">' . __('general.passive') . ' </span >';
                }

                return  $span;
            })

            ->addColumn('action', function ($data) use( $module_name ) {

                $btn = '
                                     <div class="text-center">
                                       <a href="' . route( $module_name .'.edit', $data->id) . '" class="edit  btn-sm " data-toggle="tooltip" data-placement="top" title="Düzenle"><i class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green"></i></a>
                                       <a href="' . route( $module_name .'.destroy', $data->id) . '" onclick="return confirm(\'Silme İşlemi onaylıyormusunuz ?\')"  data-toggle="tooltip" data-placement="top" title="Sil"><i class="feather icon-trash-2 f-w-600 f-16 text-c-red"></i></a>
                               </div>
                               ';

                return $btn;
            })
            ->escapeColumns([])
            ->rawColumns(['name', 'email', 'job', 'action'])
            ->toJson(true);
    }


    public function create()
    {
        $module_name = 'slider';

        return view('admin.slider.create',compact('module_name'));
    }
    public function edit($id)
    {
        $module_name = 'slider';

        $slider =  PortFolio::where('id', $id)->first();
        return view('admin.slider.edit', compact('slider','module_name'));
    }


    public function store(Request $request)
    {
        $request->validate([
            "image" => "required|image|mimes:jpg,jpeg,png,tiff,gif,svg,webp,bmp,ico|max:2048",
            "name" => "nullable|max:50",
            "value" => "nullable|max:500",
            "link" => "nullable",
            'status' => 'required',
        ], [
            'name.required' => 'Slogan adı zorunludur',
            'name.max' => 'Slogan adı en fazla 50 karakter olmalıdır adızorunludur',
            'value.required' => 'Slogan Mesajı zorunludur',
            'value.max' => 'Slogan Mesajı en fazla 500 karakter olmalıdır adızorunludur',
            'image.required' => 'İçerik resmi alanı zorunludur',
            'image.image' => 'İçerik resmi bir resim dosyası olmalıdır.',
            'image.mimes' => 'İçerik resmi yalnızca jpg,jpeg,png,tiff,gif,svg,webp,ico veya bmp formatında olabilir.',
            'image.max' => 'İçerik resmi en fazla 2 MB boyutunda olabilir.',
            'status.required' => 'Durum alanı zorunludur',
        ]);
        // dd($request->all());


        $data = $request->except('_token');

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $file_upload = fileUpload($request->image,'sliders');
            $data['image']=   $file_upload['path'];



            // $data['image'] = '/storage/' . $request->image->store('sliders', 'public');
        }
        PortFolio::create($data);

        toastr()->success('İşlem başarılı şekilde tamamlanmıştır.', 'Başarılı');
        return redirect()->back();
    }




    public function update(Request $request, PortFolio $model)
    {

        if ($model->user_id == intval($request->user_id)) {
            $user_vailate = "required|exists:users,id";
        } else {
            $user_vailate = "required|unique:job_teams|exists:users,id";
        }


        $request->validate([
            "name" => "nullable|max:50",
            "value" => "nullable|max:500",
            "image" => "image|mimes:jpg,jpeg,png,tiff,gif,svg,webp,bmp,ico|max:2048",
            "link" => "nullable",
            "type" => "required",
            'status' => 'required',
        ], [
            'name.required' => 'Slogan adı zorunludur',
            'name.max' => 'Slogan adı en fazla 50 karakter olmalıdır adızorunludur',
            'value.required' => 'Slogan Mesajı zorunludur',
            'value.max' => 'Slogan Mesajı en fazla 500 karakter olmalıdır adızorunludur',
            'image.required' => 'İçerik resmi alanı zorunludur',
            'image.mimes' => 'İçerik resmi yalnızca jpg,jpeg,png,tiff,gif,svg,webp,ico veya bmp formatında olabilir.',
            'image.max' => 'İçerik resmi en fazla 2 MB boyutunda olabilir.',
            'type.required' => 'İçerik türü alanı zorunludur',
            'status.required' => 'Durum alanı zorunludur',
        ]);
        // dd($request->all());
        $data = $request->except('_token');


        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $file_upload = fileUpload($request->image,'sliders');
            $data['image']=   $file_upload['path'];

            // $data['image'] = '/storage/' . $request->image->store('sliders', 'public');
        }
        $model->update($data);

        toastr()->success('İşlem başarılı şekilde tamamlanmıştır.', 'Başarılı');
        return redirect()->back();
    }


    public function delete(PortFolio $model)
    {

        $model->delete();
        // Log::info($user . ' ' . 'Forcedelete user_job' . ' | User:' . Auth::user()->name);
        //        session()->flash('message', 'Delete Successfully');
        toastr()->success('İşlem başarılı şekilde tamamlanmıştır.', 'Başarılı');
        return redirect()->back();
    }









    ////portfolio

    public function portfolio_index()
    {

        $module_name = 'portfolio';
        return view('admin.'.$module_name.'.index',compact('module_name'));
    }

    public function portfolio_index_data()
    {
        $module_name = 'portfolio';

        $data = PortFolio::where('type', 'portfolio')->with('category:id,name')->latest();
        // dd($data->get());
        return DataTables::of($data)
            ->addIndexColumn()
            ->editColumn('image', function ($data) {
                return ' <div class="main-friend-list" >
                            <div class="media userlist-box waves-effect waves-light" data-id="1" data-status="online" data-username="Josephin Doe">
                                    <img class="media-object img-100 " src="'.$data->image.'" alt="'.$data->name.'" width="" height="">
                            </div>
                        </div>';
            })
            ->editColumn('name', function ($data) {
                return '  <span class="chat-header">'.$data->name.'</span>';
            })


             ->editColumn('category_name', function ($data) {
                return '<span>'. $data["category"]->name.'</span>';
            })
            ->editColumn('created_at', function ($data) {
                return $data->created_at ? $data->created_at->format('d-m-Y') : "";
            })
            ->editColumn('status', function ($data) {
                if ($data->status == 1) {
                    $span = '<span class="badge badge-inverse-primary p-2 w-100">' . __('general.active') . ' </span >';
                } else {
                    $span = '<span class="badge badge-inverse-danger p-2 w-100">' . __('general.passive') . ' </span >';
                }

                return  $span;
            })

            ->addColumn('action', function ($data) use ($module_name) {

                $btn = '
                                     <div class="text-center">
                                       <a href="' . route($module_name.'.edit', $data->id) . '" class="edit  btn-sm " data-toggle="tooltip" data-placement="top" title="Düzenle"><i class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green"></i></a>
                                       <a href="' . route($module_name.'.destroy', $data->id) . '" onclick="return confirm(\'Silme İşlemi onaylıyormusunuz ?\')"  data-toggle="tooltip" data-placement="top" title="Sil"><i class="feather icon-trash-2 f-w-600 f-16 text-c-red"></i></a>
                               </div>
                               ';

                return $btn;
            })
            ->escapeColumns([])
            ->rawColumns(['name', 'email', 'job', 'action'])
            ->toJson(true);
    }


    public function portfolio_create()
    {
        $module_name = 'portfolio';

        $category = Category::where(['model'=>'portfolio','show'=>1])->get();
        return view('admin.'. $module_name.'.create',compact('category','module_name'));
    }
    public function portfolio_edit(PortFolio $model)
    {
        $module_name = 'portfolio';

        $category = Category::where(['model'=>'portfolio','show'=>1])->get();
        return view('admin.'. $module_name.'.edit', compact('model','category','module_name'));
    }



    public function portfolio_store(Request $request)
    {
        $request->validate([
            "name" => "required",
            "image" => "required|image|mimes:jpg,jpeg,png,tiff,gif,svg,webp,bmp,ico|max:2048",
            "value" => "nullable",
            "link" => "nullable",
            'status' => 'required',
        ], [
            'name.required' => 'İçerik adı zorunludur',
            'image.required' => 'İçerik resmi alanı zorunludur',
            'image.image' => 'İçerik resmi bir resim dosyası olmalıdır.',
            'image.mimes' => 'İçerik resmi yalnızca jpg,jpeg,png,tiff,gif,svg,webp,ico veya bmp formatında olabilir.',
            'image.max' => 'İçerik resmi en fazla 2 MB boyutunda olabilir.',
            'status.required' => 'Durum alanı zorunludur',
        ]);
        // dd($request->all());


        $data = $request->except('_token');

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $file_upload = fileUpload($request->image,'sliders');
            $data['image']=   $file_upload['path'];
            // $data['image'] = '/storage/' . $request->image->store('sliders', 'public');
        }
        PortFolio::create($data);

        toastr()->success('İşlem başarılı şekilde tamamlanmıştır.', 'Başarılı');
        return redirect()->back();
    }




    public function portfolio_update(Request $request, PortFolio $model)
    {

        $request->validate([
            "name" => "required",
            "image" => "image|mimes:jpg,jpeg,png,tiff,gif,svg,webp,bmp,ico|max:2048",
            "value" => "nullable",
            "link" => "nullable",
            "type" => "required",
            'status' => 'required',
        ], [
            'name.required' => 'İçerik adızorunludur',
            'image.required' => 'İçerik resmi alanı zorunludur',
            'image.mimes' => 'İçerik resmi yalnızca jpg,jpeg,png,tiff,gif,svg,webp,ico veya bmp formatında olabilir.',
            'image.max' => 'İçerik resmi en fazla 2 MB boyutunda olabilir.',
            'type.required' => 'İçerik türü alanı zorunludur',
            'status.required' => 'Durum alanı zorunludur',
        ]);
        // dd($request->all());
        $data = $request->except('_token');


        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            $file_upload = fileUpload($request->image,'sliders');
            $data['image']=   $file_upload['path'];
            // $data['image'] = '/storage/' . $request->image->store('sliders', 'public');
        }
        $model->update($data);

        toastr()->success('İşlem başarılı şekilde tamamlanmıştır.', 'Başarılı');
        return redirect()->back();
    }


    public function portfolio_delete(PortFolio $model)
    {

        $model->delete();
        // Log::info($user . ' ' . 'Forcedelete user_job' . ' | User:' . Auth::user()->name);
        //        session()->flash('message', 'Delete Successfully');
        toastr()->success('İşlem başarılı şekilde tamamlanmıştır.', 'Başarılı');
        return redirect()->back();
    }
}
