<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\InfoMessage;
use App\Models\JobTeams;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class AdminController  extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {

        $article = Article::whereRelation('category', function ($query) {
            $query->where('model', 'article');
        });
        $total_article = $article->get()->count();
        $last_article = $article->latest()->limit(5)->get();


        $services = Article::whereRelation('category', function ($query) {
            $query->where('model', 'services');
        });
        $total_services = $services->get()->count();
        $last_services = $services->latest()->limit(5)->get();


        $user_count = JobTeams::where('status', 1)->get()->count();
        $requesForm = InfoMessage::where('type','request_form')->orderBy('created_at', 'asc')->paginate(10); 
        $infoMessages = InfoMessage::where('type','info_form')->orderBy('created_at', 'asc');
        $infoMessages =  $infoMessages->limit(5)->get();        $mesaageCount =  $infoMessages->where('publish',0)->count();
        
        
        
        
        
        
        
        
        
        
        
        
        return view('admin.index', compact(
            'total_article',
            'last_article',
            'total_services',
            'last_services',
            'user_count',
            'infoMessages','mesaageCount','requesForm'
        ));
    }

    public function clearCache()
    {

        Artisan::call('optimize:clear');
        toastr()->success('Sistem Önbelleği Temizlendi.', 'Başarılı');
        return redirect()->back();
    }
    public function info_message()
    {
        $messages = InfoMessage::orderBy('created_at', 'asc')->paginate(10);
        return view('admin.message', compact('messages'));
    }
    public function info_message_edit($id)
    {
        $messages = InfoMessage::where('id', $id)->update(['publish' => 1]);
        if ($messages) {
            $msg = true;
        } else {
            $msg = false;
        }
        return response($msg);
    }



    public function ckEditorUpload(Request $request)
    {
        if($request->hasFile('image')) {
                $request->validate(
                    [
                        'image' => 'required|file|mimes:jpg,jpeg,png,tiff,gif,svg,webp,bmp,ico|max:5000'
                    ],
                    [
                        'image.required' => 'Resim alanı Zorunludur',
                        'image.mimes' => 'Yüklenen dosya desteklenen dosya tiplerinden birisi olmalıdır (jpg,jpeg,png,tiff,gif,svg,webp,bmp,ico)',
                        'image.file' => 'Yüklenen dosya bir resim dosyası olmalıdır',
                        'image.max' => 'Yüklenen dosya en fazla 4MB (4000 Kb ) olmalıdır',
    
                    ]
                );
                $file_upload = fileUpload($request->image,'Ck-images');
                $url=   $file_upload['path'];
                // $url = '/storage/' . $request->image->store('Ck-images', 'public');          
              
          
                return response()->json([
                    'uploaded' => true,
                    'url' => $url,
                ]);
          
          
            // $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            // // $url = $data;
            // $msg = 'Resim başarıyla yüklendi.';
            // $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            // @header('Content-type: text/html; charset=utf-8');
            // echo $response;
        }
    }


    public function getToken(){

        // $token = substr(bin2hex(random_bytes(4)), 0, 10); // Token'ı isteğinize göre oluşturun

        $payload = [
            "sub" => "1234567890", // Konu (subject)
            "iat" => time(), // Oluşturulma tarihi (issued at)
            "exp" => time() + 3600, // Son kullanma tarihi (expiration time), örneğin 1 saat sonra
            "data" => [
                "randomCode" => substr(bin2hex(random_bytes(3)), 0, 6) // Rastgele kodu ekleyin
            ]
        ];
        
        // Veriyi JSON formatına dönüştürün
        $payloadJson = json_encode($payload);
        
        // Veriyi Base64 URL güvenli bir şekilde kodlayın
        $encodedPayload = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($payloadJson));
        
        // Sonuç JWT verisi
        $jwt = $encodedPayload;

        return response()->json([
            'token' => $jwt,
        ]);
    }
}
