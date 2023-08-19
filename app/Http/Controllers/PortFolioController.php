<?php

namespace App\Http\Controllers;

use App\Models\PortFolio;
use Faker\Guesser\Name;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;


class PortFolioController extends Controller
{
   
    public function index()
    {

        return view('admin.slider.index');
    }

    public function index_data()
    {
        $data = PortFolio::all();
        // dd($data->get());
        return DataTables::of($data)
            ->addIndexColumn()
            ->editColumn('name', function ($data) {
                return '<strong>' . $data->name . '</strong>';
            })
            ->editColumn('image', function ($data) {
                return '<img class="img-fluid slider__images" src="'.$data->image.'" alt="' . $data->name . '" width="80" height="80"></img>';
            })
            ->editColumn('link', function ($data) {
                return '<a data-toggle="tooltip"  title="'.$data->link.'"  target="_blank" href="'.$data->link.'" >'.Str::limit($data->link,"20","...").'</a>';
            })
            ->editColumn('created_at', function ($data) {
                return $data->created_at ? $data->created_at->format('d-m-Y') : "";
            })
            ->editColumn('type', function ($data) {

                return '<span class="badge badge-inverse-danger p-2 w-100">' . __('general.'.$data->type) . ' </span >';
            })

            ->addColumn('action', function ($data) {

                $btn = '
                                     <div class="text-center">
                                       <a href="' . route('slider.edit', $data->id) . '" class="edit  btn-sm " data-toggle="tooltip" data-placement="top" title="Düzenle"><i class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green"></i></a>
                                       <a href="' . route('slider.destroy', $data->id) . '" onclick="return confirm(\'Silme İşlemi onaylıyormusunuz ?\')"  data-toggle="tooltip" data-placement="top" title="Sil"><i class="feather icon-trash-2 f-w-600 f-16 text-c-red"></i></a>
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

        return view('admin.slider.create');
    }
    public function edit($id)
    {
        $slider =  PortFolio::where('id', $id)->first();
        return view('admin.slider.edit', compact('slider'));
    }



    public function store(Request $request)
    {
        $request->validate([
            "name" =>"required",
            "image" =>"required|image|mimes:jpeg,png,jpg,gif,bmp|max:2048",
            "value" =>"nullable",
            "link" =>"nullable",
            "type" =>"required",
            'status' => 'required',
        ], [
            'name.required' => 'İçerik adızorunludur',
            'image.required' => 'İçerik resmi alanı zorunludur',
            'image.image' => 'İçerik resmi bir resim dosyası olmalıdır.',
            'image.mimes' => 'İçerik resmi yalnızca jpeg, png, jpg, gif veya bmp formatında olabilir.',
            'image.max' => 'İçerik resmi en fazla 2 MB boyutunda olabilir.',
            'type.required' => 'İçerik türü alanı zorunludur',
            'status.required' => 'Durum alanı zorunludur',
        ]);
        // dd($request->all());

       
        $data = $request->except('_token');

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $data['image'] = '/storage/' . $request->image->store('sliders', 'public');
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
            "name" =>"required",
            "image" =>"image|mimes:jpeg,png,jpg,gif,bmp|max:2048",
            "value" =>"nullable",
            "link" =>"nullable",
            "type" =>"required",
            'status' => 'required',
        ], [
            'name.required' => 'İçerik adızorunludur',
            'image.required' => 'İçerik resmi alanı zorunludur',
            'image.mimes' => 'İçerik resmi yalnızca jpeg, png, jpg, gif veya bmp formatında olabilir.',
            'image.max' => 'İçerik resmi en fazla 2 MB boyutunda olabilir.',
            'type.required' => 'İçerik türü alanı zorunludur',
            'status.required' => 'Durum alanı zorunludur',
        ]);
        // dd($request->all());
        $data = $request->except('_token');

        
        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            $data['image'] = '/storage/' . $request->image->store('sliders', 'public');
        }
        $model->update($data);

        toastr()->success('İşlem başarılı şekilde tamamlanmıştır.', 'Başarılı');
        return redirect()->back();
    }


    public function delete(PortFolio $model)
    {

        $user->delete();
        Log::info($user . ' ' . 'Forcedelete user_job' . ' | User:' . Auth::user()->name);
        //        session()->flash('message', 'Delete Successfully');
        toastr()->success('İşlem başarılı şekilde tamamlanmıştır.', 'Başarılı');
        return redirect()->back();
    }



}
