<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use Illuminate\Http\Request;

class SystemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $settings = Settings::latest()
            ->select('name','value','group')->get();
        return view('admin.settings.index',compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
    
    $dataArray =$request->except('_token');        

        if($request->hasFile('site_register_img')){
            $request->validate([
                'site_register_img' => 'required|file|mimes:jpeg,png,gif|max:4000'
            ],
                [
                    'site_register_img.required'=>'Resim alanı Zorunludur',
                    'site_register_img.mimes'=>'Yüklenen dosya desteklenen dosya tiplerinden birisi olmalıdır (jpeg,png,gif)',
                    'site_register_img.file'=>'Yüklenen dosya bir resim dosyası olmalıdır',
                    'site_register_img.max'=>'Yüklenen dosya en fazla 4MB (4000 Kb ) olmalıdır'                    
                ]
            );
            $dataArray['site_register_img'] = 'storage/'.$request->site_register_img->store('settings', 'public');
            
            
        }
        if($request->hasFile('site_login_img')){
            $request->validate([
                'site_login_img' => 'required|file|mimes:jpeg,png,gif|max:4000'
            ],
                [
                    'site_login_img.required'=>'Resim alanı Zorunludur',
                    'site_login_img.mimes'=>'Yüklenen dosya desteklenen dosya tiplerinden birisi olmalıdır (jpeg,png,gif)',
                    'site_login_img.file'=>'Yüklenen dosya bir resim dosyası olmalıdır',
                    'site_login_img.max'=>'Yüklenen dosya en fazla 4MB (4000 Kb ) olmalıdır',
                ]
            );
            $dataArray['site_login_img'] = 'storage/'.$request->site_login_img->store('settings', 'public');
            
        }
        if($request->hasFile('site_icon')){
            $request->validate([
                'site_icon' => 'required|file|mimes:jpeg,png,gif|max:4000'
            ],
                [
                    'site_icon.required'=>'Resim alanı Zorunludur',
                    'site_icon.mimes'=>'Yüklenen dosya desteklenen dosya tiplerinden birisi olmalıdır (jpeg,png,gif)',
                    'site_icon.file'=>'Yüklenen dosya bir resim dosyası olmalıdır',
                    'site_icon.max'=>'Yüklenen dosya en fazla 4MB (4000 Kb ) olmalıdır',
                                ]
            );
            $dataArray['site_icon'] = 'storage/'.$request->site_icon->store('settings', 'public');
            
        }
        if($request->hasFile('site_logo')){
            $request->validate([
                'site_logo' => 'required|file|mimes:jpeg,png,gif|max:4000'
            ],
                [
                    'site_logo.required'=>'Resim alanı Zorunludur',
                    'site_logo.mimes'=>'Yüklenen dosya desteklenen dosya tiplerinden birisi olmalıdır (jpeg,png,gif)',
                    'site_logo.file'=>'Yüklenen dosya bir resim dosyası olmalıdır',
                    'site_logo.max'=>'Yüklenen dosya en fazla 4MB (4000 Kb ) olmalıdır',
                
                ]
            );
            $dataArray['site_logo'] = 'storage/'.$request->site_logo->store('settings', 'public');
            
        }
        
        
       
        foreach ($dataArray as $key=>$item) {
            Settings::where('name',$key)->update([
                'value' => $item,
            ]);
            
        }
        
        toastr()->success('Ayar Güncelleme İşlemi Başarılı.', 'Başarılı');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
