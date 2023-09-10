<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\QuestionBank;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class QuestionController extends Controller
{
    
    public function __construct()
    {
        $this->model_name = "App\Models\Question";
        $this->module_name = "question";
        $this->directory = "question";
    }
    
    public function index(Questionbank $model)
    {
        $modul_name = $this->module_name;
        return view('admin.question.index',compact('model','modul_name'));
    }
    
    public function index_data(Questionbank $model)
    {
       
       
        $questions = $model->questions;
        
        
        return Datatables::of($questions)
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
                return $data->created_at->format('d.m.Y h:i');
            })
            
            ->editColumn('action', function ($data) {
                return $data->id;
            })
            ->escapeColumns([])
            ->rawColumns(['action'])
            ->toJson(true);
        
    }
    
    public function add_question(Request $request)
    {
        return view('admin.question.create');
        
        
    }
    
    public function store(Request $request)
    {
        
        
    }
    
    public function edit(Question $model)
    {
        return view('admin.question.edit', compact('model'));
        
        
    }
    
    public function update(Question $model)
    {
        
        
    }
    
    public function destroy(Question $model)
    {
        
        
    }
    
    public function trashed(Question $model)
    {
        
        
    }
    
    public function trashed_index()
    {
        return view('admin.question.trashed_index');
        
        
    }
    
    public function trashed_data()
    {
        
        
    }
    
    public function restore(Question $model)
    {
        
        
    }
}
