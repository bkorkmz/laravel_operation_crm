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
    
    public function index(QuestionBank $model)
    {
        
        $modul_name = $this->module_name;
        return view('admin.questionbank.index', compact('modul_name', 'model'));
        
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
            toastr()->success('Soru Grubu Ekleme İşlemi Başarılı', 'Başarılı ');
        } else {
            toastr()->error('Soru Grubu Ekleme İşlemi Sırasında Bir Hata Oluştu ', 'Başarısız !!! ');
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
            toastr()->success('Soru Grubu  Ekleme İşlemi Başarılı', 'Başarılı ');
        } else {
            toastr()->error('Soru Grubu Ekleme İşlemi Sırasında Bir Hata Oluştu ', 'Başarısız !!! ');
        }
        
    }
    
    public function destroy(QuestionBank $model)
    {
        $model = $model->delete();
        
        if($model) {
            toastr()->success('Soru Grubu  Silme İşlemi Başarılı', 'Başarılı ');
        } else {
            toastr()->error('Soru Grubu Silme İşlemi Sırasında Bir Hata Oluştu ', 'Başarısız !!! ');
        }
        
        
    }
    
    public function trashed(QuestionBank $model)
    {
        
        
    }
    
    public function trashed_index()
    {
        $modul_name = $this->module_name;
        return view('admin.questionbank.trashed_index', compact('modul_name'));
        
        
    }
    
    public function trashed_data()
    {
        
        
    }
    
    public function restore(QuestionBank $model)
    {
        $model = $model->destroy();
        
        if($model) {
            toastr()->success('Soru Grubu  Silme İşlemi Başarılı', 'Başarılı ');
        } else {
            toastr()->error('Soru Grubu Silme İşlemi Sırasında Bir Hata Oluştu ', 'Başarısız !!! ');
        }
        
    }
    
    
    public function questions(QuestionBank $model)
    {
        $modul_name = $this->module_name;
        return view('admin.questionbank.questions', compact('model', 'modul_name'));
        
    }
    
    public function questions_data(Questionbank $model)
    {
        
        
        $questions = $model->questions;
        
        
        return Datatables::of($questions)
            ->addIndexColumn()
            ->editColumn('question', function ($data) {
                return $data->question;
            })
            ->editColumn('status', function ($data) {
                
                if($data->status == 1) {
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
    
    
    public function add_question(Request $request,$qb)
    {
        $modul_name = $this->module_name;
        
        return view('admin.question.create',compact('qb','modul_name'));
        
        
    }
    
    public function show_question(Question $model)
    {
        
    
        return view('admin.question.show',compact('model'));
    }
    
    public function question_store(Request $request,$qb)
    {
        
        
    }
    
    public function edit_question()
    {
        
        
    }
    
    public function question_update(Request $request, Question  $model)
    {
        
        
    }
    
    public function question_delete()
    {
        
        
    }
}
