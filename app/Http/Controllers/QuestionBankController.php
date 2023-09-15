<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\QuestionBank;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;

class QuestionBankController extends Controller
{
    
    public function __construct()
    {
        $this->model_name = "App\Models\QuestionBank";
        $this->module_name = "questionbank";
        $this->directory = "questionbank";
    }
    
    public function index()
    {
        
        $modul_name = $this->module_name;
        return view('admin.questionbank.index', compact('modul_name'));
        
    }
    
    public function index_data()
    {
        $model = $this->model_name::withCount('questions')->latest();
        
        return Datatables::of($model)
            ->addIndexColumn()
            ->editColumn('name', function ($data) {
                return $data->name;
            })
            ->editColumn('status', function ($data) {
                
                if($data->status == 1) {
                    $span = '<span class="badge badge-inverse-primary">Aktif</span>';
                } else {
                    $span = '<span class="badge badge-inverse-danger">Pasif</span>';
                }
                return $span;
            })
            ->editColumn('questions_count', function ($data) {
                return [
                    'questions_count' => $data['questions_count'],
                    'id' => $data->id,
                
                ];
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
    
    public function create(Request $request)
    {
        $modul_name = $this->module_name;
        
        return view('admin.questionbank.create', compact('modul_name'));
        
        
    }
    
    public function store(Request $request)
    {
        
        $request->validate(
            [
                'name' => 'required|max:50',
                'description' => 'nullable|max:250',
            
            ],
            [
                'name.required' => 'Başlık gereklidir.',
                'name.max' => 'Başlık alanı en fazla 50 karakter olömalıdır.',
                'description.max' => 'Açıklama alanı en fazla 550 karakter olömalıdır.',
            ]
        );
        
        
        $data_array = $request->except(
            '_token',
        );
        $data_array['slug'] = slug_format(Str::limit($request->name, 60));
        
        $model = $this->model_name::create($data_array);
        
        if($model) {
            toastr()->success('SoruBankası Ekleme İşlemi Başarılı', 'Başarılı ');
        } else {
            toastr()->error('SoruBankası Ekleme İşlemi Sırasında Bir Hata Oluştu ', 'Başarısız !!! ');
        }
        
        return redirect()->back();
        
    }
    
    public function edit(QuestionBank $model)
    {
        $modul_name = $this->module_name;
        return view('admin.questionbank.edit', compact('model', 'modul_name'));
        
        
    }
    
    public function update(Request $request, QuestionBank $model)
    {
//        dd($model);
        $request->validate(
            [
                'name' => 'required|max:50',
                'description' => 'nullable|max:250',
            
            ],
            [
                'name.required' => 'Başlık gereklidir.',
                'name.max' => 'Başlık alanı en fazla 50 karakter olömalıdır.',
                'description.max' => 'Açıklama alanı en fazla 550 karakter olömalıdır.',
            ]
        );
        
        
        $data_array = $request->except(
            '_token',
        );
        $data_array['slug'] = slug_format(Str::limit($request->name, 60));
        
        $model = $model->update($data_array);
        
        if($model) {
            toastr()->success('SoruBankası  Ekleme İşlemi Başarılı', 'Başarılı ');
        } else {
            toastr()->error('SoruBankası Ekleme İşlemi Sırasında Bir Hata Oluştu ', 'Başarısız !!! ');
        }
        return redirect(route($this->module_name.'.index'));
        
    }
    
    public function destroy(QuestionBank $model)
    {
        $model = $model->delete();
        
        if($model) {
            toastr()->success('SoruBankası  Silme İşlemi Başarılı', 'Başarılı ');
        } else {
            toastr()->error('SoruBankası Silme İşlemi Sırasında Bir Hata Oluştu ', 'Başarısız !!! ');
        }
        
        return redirect(route($this->module_name.'.index'));
        
    }
    
    public function trashed(QuestionBank $model)
    {
        
        $trash = $model->trashed();
        if ($trash  ){
                toastr()->success('SoruBankası  Silme İşlemi Başarılı', 'Başarılı ');
            } else {
                toastr()->error('SoruBankası Silme İşlemi Sırasında Bir Hata Oluştu ', 'Başarısız !!! ');
            }
        
        return redirect()->back();
        
        
    }
    
    public function trashed_index()
    {
        $modul_name = $this->module_name;
        return view('admin.questionbank.trash_index', compact('modul_name'));
    }
    
    public function trashed_data()
    {
        $model_data = $this->model_name::onlyTrashed()->select(
                'id',
                'name',
                'description',
                'deleted_at'
            )->orderBy('deleted_at', 'desc');
        
        return DataTables::of($model_data)
            ->addIndexColumn()
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
    



    

}
