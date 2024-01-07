<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\QuestionBank;
use App\Models\Test;
use App\Models\TestDefinition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class TestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->model_name = "App\Models\Test";
        $this->module_name = "test";
        $this->directory = "test";
    }
    
    
    public function index()
    {
        
        $module_name = $this->module_name;
        return view('admin.test.index',compact('module_name'));
    }
    
    public function index_data()
    {
        $model_data = $this->model_name::latest();
        
        return DataTables::of($model_data)
            ->addIndexColumn()
            ->editColumn('name', function ($data) {
                return $data->name;
            })
            ->editColumn('user', function ($data) {
                return $data->name ?: "";
            })
            ->editColumn('created_at', function ($data) {
                return $data->created_at->format('d.m.Y h:i');
            })
            ->editColumn('action', function ($data) {
                return $data->id;
            })
            ->editColumn('wage_status', function ($data) {
                return ['wage_status'=>$data->wage_status,'price'=>$data->price];
            })
            ->escapeColumns([])
            ->rawColumns(['action'])
            ->toJson(true);
    }
    
    public function create()
    {
        $module_name = $this->module_name;
        $questionBank = QuestionBank::where('status',1)->select('id','name')
            ->whereHas('questions')
            ->withCount('questions')->get();
        return view('admin.test.create',compact('module_name','questionBank'));
    }
    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:50',
            'description' => 'nullable|max:500',
            'wage_status' => 'required',
            'status' => 'required',
            'questionbank' => 'required',
            'price' => 'nullable|min:1',
        ], [],[
            'name'        =>"Ürün Adı",
            'description' =>"Ürün açıklaması",
            'price'       =>"Fiyat",
            'status'       =>"Durum",
            'wage_status' =>"Ücret Durumu",
            'questionbank'=>"Soru Bankası",
        ]);
        
        $testValue = new Test;
        $testValue->name = $validatedData['name'];
        $testValue->description = $validatedData['description'] ;
        $testValue->wage_status = $validatedData['wage_status'] ;
        $testValue->status = $request->status;
        $testValue->question_bank= $request->questionbank;
        $testValue->price = $validatedData['price'] ?? 0 ;
        if(blank($request->slug)){
            $slug = slug_format($validatedData['name']);
        }else{
            $slug = slug_format($request->slug);
        }
        
        $testValue->slug = $slug;
        
//        dd($testValue);
        $testValue->save();
       
        
        toastr()->success('Test Ekleme İşlemi Tamamlandı.', 'Başarılı');

        
        
        if($request->is_next == '1')
        {
            return redirect()->back();
        }else {
            return redirect(route('test.index'));
        }
        
    }
    
    public function edit($id)
    {
        $module_name = $this->module_name;
        $model = Test::where('id',$id)->first();
        $questionBank = QuestionBank::where('status',1)->select('id','name')
            ->whereHas('questions')
            ->withCount('questions')->get();
        return view('admin.test.edit',compact('module_name','model','questionBank'));
    }
    
    public function show($id)
    {
        $module_name = $this->module_name;
        $test = Test::where('id',$id)->with('questionBank')->first();
        return view('admin.test.show',compact('module_name','test'));
    }
    
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:50',
            'description' => 'nullable|max:500',
            'wage_status' => 'required',
            'status' => 'required',
            'questionbank' => 'required',
            'price' => 'nullable|min:1',
        ], [],[
            'name'        =>"Ürün Adı",
            'description' =>"Ürün açıklaması",
            'price'       =>"Fiyat",
            'status'       =>"Durum",
            'wage_status' =>"Ücret Durumu",
            'questionbank'=>"Soru Bankası",
        ]);
        
        $testValue['name'] = $validatedData['name'];
        $testValue['description'] = $validatedData['description'] ;
        $testValue['wage_status'] = $validatedData['wage_status'] ;
        $testValue['status'] = $request->status;
        $testValue['question_bank']= $request->questionbank;
        $testValue['price'] = $validatedData['price'] ?? 0 ;
        if(blank($request->slug)){
            $slug = slug_format($validatedData['name']);
        }else{
            $slug = slug_format($request->slug);
        }
        $testValue['slug'] = $slug;
        $test = Test::where('id',$id)->update($testValue);
        
        
        if($test)
        {
            toastr()->success('Test Ekleme İşlemi Tamamlandı.', 'Başarılı');
            return redirect(route('test.index'));
        }else {
            toastr()->error('Test Ekleme İşlemi Sırasında Hata Oldu.', 'Başarısız !!!');
            return redirect()->back();
        }
        
        
    }
    
    public function destroy(Test $model)
    {
        if($model){
            $model->delete();
            toastr()->success('İşlem başarılı şekilde tamamlanmıştır.','Başarılı');
        }else {
            toastr()->error('Başarısız','İşlem sırasında bir hata meydana gelmiştir.');
        }
        return back();
        
    }
    
    public function testDefinition() 
    {
        $user = auth()->user();
        $module_name= $this->module_name;
        return view('admin.test.user_test_definition',['module_name'=>$module_name]);
    }
    
    public function testDefinitionData()
    {
        $user = auth()->user();
        if($user->hasAnyRole('super admin')){
            $modelData =  TestDefinition::latest()->with('getTestData');
        }else{
            $modelData =  TestDefinition::where('user_email',$user->email)->latest()->with('getTestData');
        }
        return DataTables::of($modelData)
            ->addIndexColumn()
            ->addColumn('name', function ($data) {
                return $data['getTestData']->name;
            })
            ->addColumn('wage_status', function ($data) {
                return ['wage_status'=>$data['getTestData']->wage_status,'price'=>$data['getTestData']->price];
                
            })
            ->editColumn('created_at', function ($data) {
                return $data->created_at->format('d.m.Y h:i');
            })
            ->addColumn('action', function ($data) {
                return $data->id;
            })
            ->escapeColumns([])
            ->rawColumns(['action'])
            ->toJson(true);
    }
    public function testDefinitionShow($id)
    {
        $module_name = $this->module_name;
        $definition = TestDefinition::find($id);
        $score = json_decode($definition->answer_details,true);
        $answers_details = json_decode($definition->question_answers,true);
        $test = Test::where('id',$definition->test_id)->with('questionBank')->first();
        return view('admin.test.definition_show',compact('module_name','definition','test','score','answers_details'));
    }
}
