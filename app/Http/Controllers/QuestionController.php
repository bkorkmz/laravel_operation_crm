<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\QuestionBank;
use Illuminate\Contracts\Session\Session;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
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
        return view('admin.question.index', compact('model', 'modul_name'));
    }

    public function index_data(QuestionBank $model)
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

    public function add_question(Request $request, QuestionBank $model)
    {

        $modul_name =   $this->module_name;
        return view('admin.question.create', compact('model', 'modul_name'));
    }

    public function question_store(Request $request): JsonResponse
    {
//         dd($request->all());
        $request->validate([
            'question' => 'required|max:500',
            'selectedAnswer' => 'required',
            'answerData' => 'required|array',
        ], [

            'selectedAnswer.required' => "Doğru seçenek gereklidir.",
            'question.required' => "Soru metni gereklidir.",
            'question.max' => "Soru metni en fazla 250 karakter olmalıdır.",
            'answerData.required' => 'Cevaplar dizisi gereklidir.',
            'answerData.array' => 'Cevaplar dizisi bir dizi olmalıdır.',

        ]);


        $data_array['question'] = $request->question;
        $data_array['status'] = $request->status;
        $trueAnswer = explode(',', $request->selectedAnswer);
        foreach ($request->answerData as $key => $value) {
            $data = explode(',', $value);
            $mark = false;


            if ($trueAnswer[0] == $data[0]) {
                $mark = true;
            }
            $answer_data[] = [$data[0] =>
                [
                    'code' => $data[0],
                    'title' => $data[1],
                    'mark' => $mark,
                ]];
        }

        $data_array['answers'] =  json_encode($answer_data);

        $question = Question::create($data_array);

        $qbank = QuestionBank::find($request->qbank);

        // return $request->all();
        $qbank->questions()->syncWithoutDetaching($question->id);


        return response()->json(['message' => 'success', 'status' => true,'action'=>'create'],200);
    }



    public function show_question(Question $model): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $modul_name = $this->module_name;
        return view('admin.question.show', compact('model','modul_name'));
    }



    public function edit_question  (Question $model): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $modul_name = $this->module_name;
        return view('admin.question.edit', compact('model','modul_name'));
    }




    public function update_question(Request $request,Question $model): JsonResponse
    {

        $request->validate([
            'question' => 'required|max:500',
            'selectedAnswer' => 'required',
            'answerData' => 'required|array',
        ], [

            'selectedAnswer.required' => "Doğru seçenek gereklidir.",
            'question.required' => "Soru metni gereklidir.",
            'question.max' => "Soru metni en fazla 250 karakter olmalıdır.",
            'answerData.required' => 'Cevaplar dizisi gereklidir.',
            'answerData.array' => 'Cevaplar dizisi bir dizi olmalıdır.',

        ]);


        $data_array['question'] = $request->question;
        $data_array['status'] = $request->status;
        $trueAnswer = explode(',', $request->selectedAnswer);
        foreach ($request->answerData as $key => $value) {
            $data = explode(',', $value);
            $mark = false;


            if ($trueAnswer[0] == $data[0]) {
                $mark = true;
            }
            $answer_data[] = [$data[0] =>
                [
                    'code' => $data[0],
                    'title' => $data[1],
                    'mark' => $mark,
                ]];
        }

        $data_array['answers'] =  json_encode($answer_data);

        $question =$model->update($data_array);

//        $qbank = QuestionBank::find($request->qbank);

        // return $request->all();
//        $qbank->questions()->syncWithoutDetaching($question->id);
        if($question){
            $message =['message' => 'success', 'status' => true,'action'=>'update'];
        }else{
            $message =['message' => 'error', 'status' => false];
        }


        return response()->json($message,200);


    }

    public function destroy(Question $model)
    {
        $model = $model->delete();

        if($model) {
            toastr()->success('Soru  Silme İşlemi Başarılı', 'Başarılı ');
        } else {
            toastr()->error('Soru  Silme İşlemi Sırasında Bir Hata Oluştu ', 'Başarısız !!! ');
        }

        return redirect()->back();

    }

    public function trashed(Question $model)
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
        return view('admin.question.trashed_index',compact('modul_name'));
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

    public function restore(Question $model)
    {

    }
}
