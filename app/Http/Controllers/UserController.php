<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailJob;
use App\Models\Customer;
use App\Models\JobTeams;
use App\Models\User;
use App\Models\Role;
use http\Env\Response;
use Illuminate\Contracts\Database\Eloquent\Builder;
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
use Termwind\Components\Dd;

class UserController extends Controller
{

    public function __construct()
    {
        $this->model_name = "App\Models\User";
        $this->module_name = "user";
        $this->directory = "user";
    }

    public function index()
    {
        return view('admin.user.index_datatable');
    }

    public function index_data()
    {
        $data = User::select('id', 'name', 'created_at', 'user_check', 'email')->with('roles');
        if (!auth()->user()->hasRole('Super admin')) {
            $data->where('id', '!=', 1);
        }
        // $data->latest();
        return Datatables::of($data)
            ->addIndexColumn()
            ->editColumn('name', '<strong>{{$name}}</strong>')
            ->editColumn('created_at', function ($data) {
                return $data->created_at ? $data->created_at->format('d-m-Y') : "";
            })
            ->editColumn('roles', function ($data) {
                if (blank($data['roles'])) {
                    $role = "Rol Atanmamış ";
                } else {
                    $role = __('general.' . $data['roles'][0]['name']);
                };
                return '<span class="badge ">' . $role . ' </span >';
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
            ->rawColumns(['name', 'email', 'status', 'user_check', 'action'])
            ->toJson(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $roles = Role::where('id', '<>', 1)->get();
        $citys = DB::table('table_cityes')->get();
        return view('admin.user.create', compact('citys', 'roles'));
    }


    public function store(Request $request)
    {
        // dd(request()->all());
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'nullable|min:10|max:11',
            'password' => 'required|min:6|confirmed',
            'status' => 'required|boolean',
            'role' => 'required',
            'about' => 'nullable',
            'gender' => 'nullable',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
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
            'avatar.mimes' => 'Profil resmi yalnızca jpeg, png, jpg, gif,svg veya webp formatında olabilir.',
            'avatar.max' => 'Profil resmi en fazla 2 MB boyutunda olabilir.',
        ]);


        $data = $request->except('_token');
        $data['password'] = Hash::make($validatedData['password']);
        if (request()->hasFile('avatar')) {

            if ($model->avatar != "") {
                deleteOldPicture($model->avatar);
             }
             $file_upload = fileUpload($request->avatar,'avatars');
             $data['avatar'] =   $file_upload['path'];


            // $data['avatar'] = '/storage/' . $validatedData['avatar']->store('avatars', 'public');
        }
        $user = User::create($data);
        $user->syncRoles($validatedData['role']);
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
     * @param int $id
     * @return Application|Factory|View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $userrole = $user->roles->all();
        $roles = Role::where('id', '<>', 1)->get();
        $citys = DB::table('table_cityes')->get()->toArray();
        //        $main_categorys = Category::where('parent_id' ,'=',"")->get();
        return view('admin.user.edit', compact('user', 'citys', 'roles', 'userrole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Request $request, User  $model)
    {

        if (trim($model->email)  == trim($request->email)) {
            $email_valid = 'required|email';
        } else {
            $email_valid = 'required|email|unique:users,email';
        }

        $validatedData = $request->validate([
            'name' => 'required',
            'email' => $email_valid,
            'phone' => 'nullable|min:10|max:11',
            'password' => 'nullable|min:6|confirmed',
            'status' => 'required|boolean',
            'country' => 'nullable',
            'city' => 'nullable',
            'county' => 'nullable',
            'about' => 'nullable',
            'gender' => 'nullable',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'name.required' => 'Ad alanı zorunludur.',
            'email.required' => 'E-posta alanı zorunludur.',
            'email.email' => 'Geçersiz bir e-posta adresi girdiniz.',
            'email.unique' => 'Bu e-posta adresi zaten kayıtlı.',
            'phone.min' => 'Telefon numarası en az 10 karakter olmalıdır.',
            'phone.max' => 'Telefon numarası en fazla 11 karakter olabilir.',
            'password.min' => 'Şifre en az 6 karakter olmalıdır.',
            'password.confirmed' => 'Şifreler eşleşmiyor.',
            'status.required' => 'Durum alanı zorunludur.',
            'status.boolean' => 'Durum alanı sadece doğru veya yanlış değeri alabilir.',
            'avatar.image' => 'Profil resmi bir resim dosyası olmalıdır.',
            'avatar.mimes' => 'Profil resmi yalnızca jpeg, png, jpg, gif veya svg formatında olabilir.',
            'avatar.max' => 'Profil resmi en fazla 2 MB boyutunda olabilir.',
        ]);




        $data = $request->except('_token', 'password_confirmation', 'password', 'role', 'avatar');
        if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
            if ($model->avatar != "") {
                deleteOldPicture($model->avatar);
             }
             $file_upload = fileUpload($request->avatar,'avatars');
             $data['avatar'] =   $file_upload['path'];
            // $data['avatar'] = '/storage/' . $validatedData['avatar']->store('avatars', 'public');
        }
        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }

        // dd($data);

        // $user = User::find($id);
        $model->update($data);
        $model->syncRoles($request->role);


        if (!$model) {
            toastr()->error('Kullanıcı Düzenleme Sırasında Hata Oluştu.', 'Başarısız');
        } else {
            toastr()->success('Kullanıcı Bilgileri Güncellendi.', 'Başarılı');
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if ($user->id != 1) {
            $user->delete();
            Log::info($user . ' ' . 'Delete user' . ' | User:' . Auth::user()->name);
            toastr()->success('İşlem başarılı şekilde tamamlanmıştır.', 'Başarılı');
        } else {
            toastr()->error('Başarısız', 'İşlem sırasında bir hata meydana gelmiştir.');
        }
        return back();
    }

    public function trashed_index()
    {
        $users = User::onlyTrashed()->orderBy('deleted_at', 'desc')->paginate(20);
        return view('admin.user.trash_index', compact('users'));
    }

    public function restore($id)
    {
        $user = User::onlyTrashed()->where('id', $id)->first();
        $user->restore();
        Log::info($user . ' ' . 'Restore user' . ' | User:' . Auth::user()->name);
        toastr()->success('İşlem başarılı şekilde tamamlanmıştır.', 'Başarılı');
        return back();
    }

    public function trashed($id)
    {
        //        dd($id);
        $delete_data = User::onlyTrashed()->findOrFail($id);
        $delete_data->forceDelete();
        Log::info($delete_data . ' ' . 'Forcedelete user' . ' | User:' . Auth::user()->name);
        //        session()->flash('message', 'Delete Successfully');
        toastr()->success('İşlem başarılı şekilde tamamlanmıştır.', 'Başarılı');
        return redirect()->back();
    }


    public function teams_index()
    {

        return view('admin.job_teams.index');
    }

    public function teams_index_data()
    {
        $data = JobTeams::select('id', 'name', 'job', 'status', 'created_at');
        // dd($data->get());
        return Datatables::of($data)
            ->addIndexColumn()
            ->editColumn('name', function ($data) {
                return '<strong>' . $data->name . '</strong>';
            })
            // ->editColumn('email', function ($data) {
            //     return '<strong>' . $data['user']->email . '</strong>';
            // })
            ->editColumn('created_at', function ($data) {
                return $data->created_at->format('d-m-Y H:i');
            })
            ->editColumn('job', function ($data) {

                return '<span class="badge badge-inverse-info p-2 w-50">' . $data->job . ' </span >';
            })
            ->editColumn('status', function ($data) {

                if ($data->status == 0) {
                    return '<span class="badge badge-danger" > ' . __('Pasif') . ' </span >';
                }
                if ($data->status == 1) {
                    return '<span class="badge badge-success">' . __('Aktif') . '</span>';
                }
            })


            ->addColumn('action', function ($data) {

                $btn = '
                        <div class="text-center">
                            <a href="' . route('user.teams.edit', $data->id) . '" class="edit  btn-sm " data-toggle="tooltip" data-placement="top" title="Düzenle"><i class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green"></i></a>
                            <a href="' . route('user.teams.destroy', $data->id) . '" onclick="return confirm(\'Silme İşlemi onaylıyormusunuz ?\')"  data-toggle="tooltip" data-placement="top" title="Sil"><i class="feather icon-trash-2 f-w-600 f-16 text-c-red"></i></a>
                        </div>
                               ';

                return $btn;
            })
            ->escapeColumns([])
            ->rawColumns(['name', 'email', 'job', 'action'])
            ->toJson(true);
    }


    public function teams_create()
    {
        $users =  JobTeams::where('status', 1)->select('id', 'name', 'job', 'avatar')->get();

        return view('admin.job_teams.create', compact('users'));
    }
    public function teams_edit($id)
    {
        $users =  User::where('id', '<>', 1)->select('id', 'name', 'created_at', 'user_check', 'email')->get();
        $user =  JobTeams::where('id', $id)->with('user:id,name,email')->first();
        return view('admin.job_teams.edit', compact('users', 'user'));
    }



    public function teams_store(Request $request)
    {
        $request->validate([
            // 'user_id' => 'required|unique:job_teams|exists:users,id',
            'job' => 'required|string',
            'name' => 'required|string',
            'status' => 'required',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',

        ], [
            'name.required' => 'Ad-Soyad   alanı  zorunludur',
            'name.string' => 'Ad-Soyad   alanı  sadece text olmalıdır',
            'job.required' => 'Görev alanı zorunludur',
            'job.string' => 'Görev alanı sadece text olmalıdır',
            'status.required' => 'Durum alanı zorunludur',
            'avatar.image' => 'Profil resmi bir resim dosyası olmalıdır.',
            'avatar.mimes' => 'Profil resmi yalnızca jpeg, png, jpg, gif,webp veya svg formatında olabilir.',
            'avatar.max' => 'Profil resmi en fazla 2 MB boyutunda olabilir.',
        ]);

        $data = $request->except('_token', 'avatar');
        if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
             $file_upload = fileUpload($request->avatar,'teams');
             $data['avatar'] =   $file_upload['path'];
            // $data['avatar'] = '/storage/' . $request->avatar->store('teams', 'public');
        }
        JobTeams::create($data);

        toastr()->success('İşlem başarılı şekilde tamamlanmıştır.', 'Başarılı');
        return redirect()->back();
    }




    public function teams_update(Request $request, JobTeams $model)
    {

        if ($model->user_id == intval($request->user_id)) {
            $user_vailate = "required|exists:users,id";
        } else {
            $user_vailate = "required|unique:job_teams|exists:users,id";
        }


        $request->validate([
            // 'user_id' => 'required|unique:job_teams|exists:users,id',
            'job' => 'required|string',
            'name' => 'required|string',
            'status' => 'required',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',

        ], [
            'name.required' => 'Ad-Soyad   alanı  zorunludur',
            'name.string' => 'Ad-Soyad   alanı  sadece text olmalıdır',
            'job.required' => 'Görev alanı zorunludur',
            'job.string' => 'Görev alanı sadece text olmalıdır',
            'status.required' => 'Durum alanı zorunludur',
            'avatar.image' => 'Profil resmi bir resim dosyası olmalıdır.',
            'avatar.mimes' => 'Profil resmi yalnızca jpeg, png, jpg, gif,webp veya svg formatında olabilir.',
            'avatar.max' => 'Profil resmi en fazla 2 MB boyutunda olabilir.',
        ]);

        $data = $request->except('_token', 'avatar');
        if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
            if ($model->avatar != "") {
                deleteOldPicture($model->avatar);
             }
             $file_upload = fileUpload($request->avatar,'teams');
             $data['avatar'] =   $file_upload['path'];
            // $data['avatar'] = '/storage/' . $request->avatar->store('teams', 'public');
        }

        $model->update($data);

        toastr()->success('İşlem başarılı şekilde tamamlanmıştır.', 'Başarılı');
        return redirect()->back();
    }


    public function teams_delete(JobTeams $model)
    {

        
        $model->delete();
        Log::info($model . ' ' . 'Forcedelete user_job' . ' | User:' . Auth::user()->name);
        //        session()->flash('message', 'Delete Successfully');
        toastr()->success('İşlem başarılı şekilde tamamlanmıştır.', 'Başarılı');
        return redirect()->back();
    }





















    ////user Onay senaryosu /

    /**
     * 
     * 
     */



    public function user_get(Request $request)
    {
        $data = User::findOrFail($request->item_id);

        $item = array($data);
        return response()->json($item, 200);
    }

    public function user_onay(Request $request)
    {
        $user = User::findOrFail($request->item_id);
        $user->user_check = 1;
        $user->save();
        Log::info($user . ' ' . 'Onay user' . ' | User:' . Auth::user()->name);
        return response()->json(['message' => 'true'], 200);
    }

    public function company_get(Request $request)
    {
        $data = Company::findOrFail($request->item_id);

        $country = Str::upper($data->country);
        $city = City::find($data->city)->name;
        $category = Category::find($data->category)->name;
        $item = array($data, $country, $city, $category);

        return response()->json($item, 200);
    }

    public function all_user_onay()
    {

        Customer::where('user_check', '0')->chunk(50, function ($companyes) {
            foreach ($companyes as $company) {

                $code = rand(111111, 999999);
                $control = User::where('email', $company->email)->exists();
                if ($control) {
                    Log::warning('Var olan Firma ==> ' . $control->email . ' ' . ' | User:' . Auth::user()->name);
                    $control->user_check = 1;
                    $control->save();
                } else {
                    $company->user_check = 1;
                    $company->save();

                    $user = new User();
                    $user->name = $company->name;
                    $user->phone = $company->phone;
                    $user->city = $company->city;
                    $user->country = $company->country;
                    $user->password = Hash::make($code);
                    $user->email = $company->email;
                    $user->status = $company->status;
                    $user->school_name = $company->compan;
                    $user->document = $company->document;
                    $user->bolum = $company->category;
                    $user->user_check = 1;

                    $user->save();

                    $data[] =
                        [
                            'name' => $user->name,
                            'email' => $user->email,
                            'create_date' => $user->created_at,
                            'company' => $user->school_name,
                            "code" => $code
                        ];
                }
            }


            foreach ($data as $d) {
                //    dispatch(new SendEmailJob($d,'company_onay'));
                Mail::to($d['email'])->send(new Companynew($d));
                Log::info($d['name'] . ' ' . 'Yeni firmalar eklendi mail gitti' . ' | Onaylayan:' . Auth::user()->name);
            }
        });


        alert('Başarılı', 'Tüm Firmalar onaylanmıştır.', 'success')->autoClose(3000);
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
        $code = rand(111111, 999999);

        $check_user = User::where('email', $company->email)->exists();


        //    dd($check_user);
        if ($check_user) {
            // alert()->error('Başarısız','Bu email adresinde kullanıcı var.'.$company->email)->autoClose(3000);
            Log::warning('Var olan Firma ==> ' . $company->email . ' ' . ' | User:' . Auth::user()->name);
            $company->user_check = 1;
            $company->save();
            return response(['check_user' => 'True']);
        } else {

            $user = new User();
            $user->name = $company->name;
            $user->email = $company->email;
            $user->status = $company->status;
            $user->phone = $company->phone;
            $user->city = $company->city;
            $user->country = $company->country;
            $user->bolum = $company->category;
            $user->school_name = $company->company;
            $user->document = $company->document;
            $user->password = Hash::make($code);
            $user->user_check = 1;
            $user->save();


            $data = [
                'name' => $user['name '],
                'email' => $user['email'],
                'create_date' => $user['created_at'],
                'company' => $user['school_name'],
                "code" => $code
            ];

            Mail::to($user->email)->send(new Companynew($data));
            Log::info($user . ' ' . 'Yeni firma eklendi mail gitti' . ' | User:' . Auth::user()->name);
            $company->user_check = 1;
        }

        $company->save();

        return response(['success' => 'True']);
    }
}
