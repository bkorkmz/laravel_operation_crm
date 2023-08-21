<?php

namespace App\Http\Controllers;

use App\Models\FaqSss;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class FaqSssController extends Controller
{



    public function __construct()
    {
        $this->model_name = "App\Models\FaqSss";
        $this->module_name = "faq_sss";
        $this->directory = "faq";
    }
    public function index()
    {
        $module_name = $this->module_name;

        return view('admin.faq.index', compact('module_name'));
    }
    public function index_data()
    {
        $faq = FaqSss::latest()->select('question', 'answer', 'status', 'id','order');

        $module_name = $this->module_name;
        return DataTables()->of($faq)

            ->editColumn('action', function ($data) use ($module_name) {
                $btn = '
                        <div class="text-center">
                        <a href="' . route($module_name.'.edit', $data->id) . '" class="edit  btn-sm " data-toggle="tooltip" data-placement="top" title="Düzenle"><i class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green"></i></a>
                        <a href="' . route($module_name.'.destroy', $data->id) . '" onclick="return confirm(\'Silme İşlemi onaylıyormusunuz ?\')"  data-toggle="tooltip" data-placement="top" title="Sil"><i class="feather icon-trash-2 f-w-600 f-16 text-c-red"></i></a>
                </div>
                ';

                                return $btn;
            })

            ->editColumn('status', function ($data) {
                if ($data->user_check == 0) {
                    return '<span class="badge badge-danger" > ' . __('Pasif') . ' </span >';
                }
                if ($data->user_check == 1) {
                    return '<span class="badge badge-success">' . __('Aktif') . '</span>';
                }
            })



            ->escapeColumns([])
            ->rawColumns([])
            ->toJson(true);
    }
    public function create()
    {

        $module_name = $this->module_name;

        return view('admin.faq.create', compact('module_name'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string',
            'answer' => 'required|string',
            'order' => 'nullable|integer',
        ], [
            'question.required'  => "Soru alanı zorunludur.",
            'question.string'  => "Soru alanı sadece yazı olmalıdır.",
            'answer.required'  => "Cevap alanı zorunludur.",
            'answer.string'  => "Cevap alanı sadece yazı olmalıdır.",
            'order.integer'  => "Sıralama sadec sayı girilebilir.",
        ]);


        $array_data = $request->except('_token');


        $create = $this->model_name::create($array_data);
        toastr()->success('İşlem başarılı şekilde tamamlanmıştır.', 'Başarılı');
        return redirect()->back();
    }

    public function edit(FaqSss $model)
    {
        $module_name = $this->module_name;

        return view('admin.faq.edit', compact('module_name', 'model'));
    }
    public function update(Request $request, FaqSss $model)
    {


        $request->validate([
            'question' => 'required|string',
            'answer' => 'required|string',
            'order' => 'nullable|integer',

        ], [
            'question.required'  => "Soru alanı zorunludur.",
            'question.string'  => "Soru alanı sadece yazı olmalıdır.",
            'answer.required'  => "Cevap alanı zorunludur.",
            'answer.string'  => "Cevap alanı sadece yazı olmalıdır.",
            'order.integer'  => "Sıralama sadec sayı girilebilir.",

        ]);


        $array_data = $request->except('_token');

        $create = $model->update($array_data);
        toastr()->success('İşlem başarılı şekilde tamamlanmıştır.', 'Başarılı');
        return redirect()->back();
    }
    public function destroy(FaqSss $model)
    {


        $model->delete();
        toastr()->success('İşlem başarılı şekilde tamamlanmıştır.', 'Başarılı');

        return redirect()->back();
    }
}
