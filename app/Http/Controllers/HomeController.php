<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
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
    
}
