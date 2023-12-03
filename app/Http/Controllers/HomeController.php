<?php

namespace App\Http\Controllers;

use App\Models\UserHeartBeat;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    
    
    public function cities(Request $request): JsonResponse
    {
        
        $ilce = [];
        $ilceler_data = DB::table('table_cityes')->where('id',$request->id)->pluck('content')->first();
        $data_array =  explode(",",$ilceler_data);
        foreach ($data_array as $i)
        {
            if ($i != ""  )
            {
                $ilce [] = $i;
            }
        }
        return response()->json($ilce);
    }
    

    public function heartBeat (Request $request): JsonResponse
    {       
        $data = [
            'ip' =>request()->ip(),
            'mobile'=>$request->ismobile,
            'page' =>$request->page,
            'latitude' =>$request->latitude,
            'longitude' =>$request->longitude,
            'user'=>  auth()->user() ? auth()->id() : "Misafir Kullanıcı"
        ];
        $dd=  UserHeartBeat::create([
            'user_id'=>$data['user'] ,
            'activity'=>json_encode($data)
        ]);
        
        
        return response()->json([true,200]);
    }


}
