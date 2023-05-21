<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailJob;
use App\Models\Customer;
use App\Models\User;
use http\Env\Response;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Laracasts\Flash\Flash;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Mail;


class UserController extends Controller
{
    public function index()
    {
        $users = User::where('id','!=',1)->orderBy('id', 'desc')->get();
//        $users = User::where('status','=',$id)->orderBy('id', 'desc')->paginate(20);
        return view('admin.user.index_datatable', compact('users'));
    }
    public function index_data()
    {
        $data = User::select('id','name','created_at','user_check','email')->orderBy('created_at','desc')->get();
        
        return Datatables::of($data)
            ->addIndexColumn()
            ->editColumn('name', '<strong>{{$name}}</strong>')
            ->editColumn('created_at', function($data){
                return $data->created_at ? $data->created_at->format('d-m-Y') : "";
            })
            ->editColumn('status', function ($data) {
                if ($data->status == 0) {
                    return '<span class="badge ">' . __('Müşteri') . ' </span >';
                }
                if ($data->status == 1) {
                    return '<span class="badge ">' . __('Süper admin') . '</span>';
                }
                if ($data->status == 2) {
                    return '<span class="badge ">' . __('Firma') . '</span >';
                }
                if ($data->status == 3) {
                    return '<span class="badge ">' . __('Editör') . '</span>';
                }
            })
            ->editColumn('user_check', function ($data) {
                if ($data->user_check == 0) {
                    return '<span class="badge badge-danger" > ' . __('Onaysız') . ' </span >';
                }
                if ($data->user_check == 1) {
                    return '<span class="badge badge-success">' . __('Onaylandı') . '</span>';
                }

            })

            ->addColumn('action', function ($data) {

//                $btn = '
//                      <div class="text-center">
//                        <a href="'.route('user.edit', $data->id).'" class="edit btn btn-info btn-smdata-toggle="tooltip" data-placement="top" title="Düzenle"><i class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green"></i></a>
//                        <a href="'.route('user.destroy', $data->id).'" onclick="return confirm(\'Silme İşlemi onaylıyormusunuz ?\')"  data-toggle="tooltip" data-placement="top" title="Sil"><i class="feather icon-trash-2 f-w-600 f-16 text-c-red"></i></a>
//                </div>
//                ';
//
//                    return $btn;
                return view('admin.user.include.user_action', compact('data'));
            })
            ->escapeColumns([])
            ->rawColumns(['name','email','status','user_check','action'])
            ->toJson(true);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
           $citys = DB::table('table_cityes')->get();
        return view('admin.user.create',compact('citys'));
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'min:10|max:11',
            'password' => 'required|min:6|confirmed',
            'status' => 'required|boolean',
            'country' => 'nullable',
            'city' => 'nullable',
            'county' => 'nullable',
            'about' => 'nullable',
            'gender' => 'required',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'name.required' => 'Ad alanı zorunludur.',
            'email.required' => 'E-posta alanı zorunludur.',
            'email.email' => 'Geçersiz bir e-posta adresi girdiniz.',
            'email.unique' => 'Bu e-posta adresi zaten kayıtlı.',
//            'phone.required' => 'Telefon numarası alanı zorunludur.',
            'phone.min' => 'Telefon numarası en az 10 karakter olmalıdır.',
            'phone.max' => 'Telefon numarası en fazla 11 karakter olabilir.',
            'password.required' => 'Şifre alanı zorunludur.',
            'password.min' => 'Şifre en az 6 karakter olmalıdır.',
            'password.confirmed' => 'Şifreler eşleşmiyor.',
            'status.required' => 'Durum alanı zorunludur.',
            'status.boolean' => 'Durum alanı sadece doğru veya yanlış değeri alabilir.',
//            'country.required' => 'Ülke alanı zorunludur.',
//            'city.required' => 'Şehir alanı zorunludur.',
//            'county.required' => 'İlçe alanı zorunludur.',
//            'about.required' => 'Hakkında alanı zorunludur.',
            'gender.required' => 'Cinsiyet alanı zorunludur.',
//            'avatar.required' => 'Profil resmi zorunludur.',
            'avatar.image' => 'Profil resmi bir resim dosyası olmalıdır.',
            'avatar.mimes' => 'Profil resmi yalnızca jpeg, png, jpg, gif veya svg formatında olabilir.',
            'avatar.max' => 'Profil resmi en fazla 2 MB boyutunda olabilir.',
        ]);
        
        
        $user = new User;
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->phone = $validatedData['phone'];
        $user->password = Hash::make($validatedData['password']);
        $user->status = $validatedData['status'];
        $user->country = $validatedData['country'];
        $user->city = $validatedData['city'];
        $user->county = $validatedData['county'];
        $user->about = $validatedData['about'];
        $user->gender = $validatedData['gender'];
        $user->avatar = 'storage/'.$validatedData['avatar']->store('avatars', 'public');
        $user->save();
        toastr()->success('Kullanıcı Ekleme İşlemi Başarılı.', 'Başarılı');
        return redirect(route('user.index'));
        
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $citys = DB::table('table_cityes')->get()->toArray();
//        $main_categorys = Category::where('parent_id' ,'=',"")->get();
        return view('admin.user.edit',compact('user','citys'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'phone' => 'min:10|max:11',
            'password' => 'nullable|min:6|confirmed',
            'status' => 'required|boolean',
            'country' => 'nullable',
            'city' => 'nullable',
            'county' => 'nullable',
            'about' => 'nullable',
            'gender' => 'required',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'name.required' => 'Ad alanı zorunludur.',
            'phone.min' => 'Telefon numarası en az 10 karakter olmalıdır.',
            'phone.max' => 'Telefon numarası en fazla 11 karakter olabilir.',
            'password.min' => 'Şifre en az 6 karakter olmalıdır.',
            'password.confirmed' => 'Şifreler eşleşmiyor.',
            'status.required' => 'Durum alanı zorunludur.',
            'status.boolean' => 'Durum alanı sadece doğru veya yanlış değeri alabilir.',
            'gender.required' => 'Cinsiyet alanı zorunludur.',
            'avatar.image' => 'Profil resmi bir resim dosyası olmalıdır.',
            'avatar.mimes' => 'Profil resmi yalnızca jpeg, png, jpg, gif veya svg formatında olabilir.',
            'avatar.max' => 'Profil resmi en fazla 2 MB boyutunda olabilir.',
        ]);
        
        $user = User::find($id);
        $user->name = $validatedData['name'];
        $user->phone = $validatedData['phone'];
        $user->status = $validatedData['status'];
        $user->country = $validatedData['country'];
        $user->city = $validatedData['city'];
        $user->county = $validatedData['county'];
        $user->about = $validatedData['about'];
        $user->gender = $validatedData['gender'];
        
        if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = 'storage/'.$avatarPath;
        }
        if ($request->password) {
            $user->password = $request->password;
        }
        
        $user->save();
        
        
        if (!$user) {
            toastr()->error('Kullanıcı Düzenleme Sırasında Hata Oluştu.', 'Başarısız');
        }else {
            toastr()->success('Kullanıcı Bilgileri Güncellendi.', 'Başarılı');
        }
        return redirect()->back();
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
            $user = User::findOrFail($id);
            if($user->id != 1){
                $user->delete();
                Log::info($user . ' ' . 'Delete user'. ' | User:' . Auth::user()->name);
                  toastr()->success('İşlem başarılı şekilde tamamlanmıştır.','Başarılı');
            }else {
                  toastr()->error('Başarısız','İşlem sırasında bir hata meydana gelmiştir.');
            }
        return back();

    }

    public function trashed_index()
    {
        $users = User::onlyTrashed()->orderBy('deleted_at', 'desc')->paginate(20);
        return view('admin.user.trash_index',compact('users'));
    }
    public function restore($id)
    {
      $user =  User::withTrashed()->where('id', $id)->first();
       $user->restore();
        Log::info($user . ' ' . 'Restore user'. ' | User:' . Auth::user()->name);
        toastr()->success('İşlem başarılı şekilde tamamlanmıştır.','Başarılı');
        return back();
    }
    public function trashed($id)
    {
//        dd($id);
       $delete_data = User::withTrashed()->findOrFail($id);
        $delete_data->forceDelete();
        Log::info($delete_data . ' ' . 'Forcedelete user'. ' | User:' . Auth::user()->name);
//        session()->flash('message', 'Delete Successfully');
         toastr()->success('İşlem başarılı şekilde tamamlanmıştır.','Başarılı');
        return redirect()->back();
    }

    public function user_get(Request $request)
    {
        $data = User::findOrFail($request->item_id);

        $item = array($data);
        return  response()->json($item,200);
    }
    public function user_onay(Request $request)
    {
        $user = User::findOrFail($request->item_id);
        $user->user_check = 1 ;
        $user->save();
        Log::info($user . ' ' . 'Onay user'. ' | User:' . Auth::user()->name);
        return response()->json(['message' =>'true'], 200);

    }
   public function company_get(Request $request)
    {
        $data = Company::findOrFail($request->item_id);

        $country = Str::upper($data->country);
        $city = City::find($data->city)->name;
        $category = Category::find($data->category)->name;
        $item = array($data,$country,$city,$category);

        return  response()->json($item,200);
    }

    public function all_user_onay()
    {
        set_time_limit(3600);




        Customer::where('user_check','0')->chunk(50, function ($companyes) {
            foreach ($companyes as $company) {

                $code = rand(111111,999999);
                $control = User::where('email',$company->email)->exists();
                if($control){
                    Log::warning( 'Var olan Firma ==> '.$control->email .' '.' | User:' . Auth::user()->name);
                    $control->user_check = 1;
                    $control->save();
                }
                else {
                    $company->user_check = 1;
                    $company->save();
                   
                   $user = new User();
                   $user->name      = $company->name;
                   $user->phone     = $company->phone;
                   $user->city      = $company->city;
                   $user->country   = $company->country;
                   $user->password  = Hash::make($code);
                   $user->email     = $company->email;
                   $user->status    = $company->status;
                   $user->school_name = $company->compan;
                   $user->document    = $company->document;
                   $user->bolum       = $company->category;
                   $user->user_check  = 1;

                   $user->save();

                    $data[] =
                        [
                        'name'=>       $user->name,
                        'email'=>      $user->email,
                        'create_date'=>$user->created_at,
                        'company' =>   $user->school_name,
                        "code" =>      $code
                        ];
                
                }
                  
            
            }

         
                foreach ($data as $d){
                //    dispatch(new SendEmailJob($d,'company_onay'));
                    Mail::to($d['email'])->send(new Companynew($d));
                    Log::info($d['name'] .' '. 'Yeni firmalar eklendi mail gitti'. ' | Onaylayan:' . Auth::user()->name);
                }
            
        

            });


            alert('Başarılı','Tüm Firmalar onaylanmıştır.', 'success')->autoClose(3000);
            return redirect()->back();
    



        // $companys = Company::where('user_check','0')->pluck('id')->toarray();
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return  RedirectResponse
     */
    public function company_create(Request $request)
    {
        
        
        $company = Company::findOrFail($request->data);
        $code = rand(111111,999999);

  $check_user = User::where('email', $company->email)->exists();



    //    dd($check_user);
        if ($check_user){
            // alert()->error('Başarısız','Bu email adresinde kullanıcı var.'.$company->email)->autoClose(3000);
            Log::warning( 'Var olan Firma ==> '.$company->email .' '.' | User:' . Auth::user()->name);
            $company->user_check = 1;
            $company->save();
            return response(['check_user'=>'True']);
        }
        else
        {
    
        $user = new User();
        $user->name        = $company->name;
        $user->email       = $company->email;
        $user->status      = $company->status;
        $user->phone       = $company->phone;
        $user->city        = $company->city;
        $user->country     = $company->country;
        $user->bolum       = $company->category;
        $user->school_name = $company->company;
        $user->document    = $company->document;
        $user->password    = Hash::make($code);
        $user->user_check = 1 ;
        $user->save();


       
        $data = [
            'name'       => $user['name '],
            'email'      => $user['email'],
            'create_date'=> $user['created_at'],
            'company'    => $user['school_name'],
            "code"       => $code
        ];

        Mail::to($user->email)->send(new Companynew($data));
        Log::info($user .' '. 'Yeni firma eklendi mail gitti'. ' | User:' . Auth::user()->name);
        $company->user_check = 1 ;
        }

        $company->save();

        return response(['success'=>'True']);


    }





}
