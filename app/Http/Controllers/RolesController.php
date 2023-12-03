<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Role;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Yajra\DataTables\DataTables;

class RolesController extends Controller
{
    public function index()
    {
       $role = Role::query()->get();
       return view('admin.roles.index',compact('role'));
    }
    public function index_data()
    {
        $data = Role::orderBy('id','ASC');
        if ( auth()->id() != 1){
            $data->where('id', '!=', 1);
        }
        
        return DataTables::of($data)
            ->addIndexColumn()
            ->editColumn('name',function($data){
                return __('roles.'.$data->name);

            })
            ->addColumn('action', function ($data) {
                
                return  '
                      <div class="text-center">
                        <a href="'.route('roles.edit', $data->id).'"  data-toggle="tooltip" data-placement="top" title="Düzenle"><i class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green"></i></a>
            
                        <a href="'.route('roles.destroy', $data->id).'" onclick="return confirm(\'Silme İşlemi onaylıyormusunuz ?\')"  data-toggle="tooltip" 
                        data-placement="top" title="Sil"><i class="feather icon-trash-2 f-w-600 f-16 text-c-red"></i></a>
                      </div>
                ';
            })
            ->escapeColumns([])
            ->rawColumns(['name','status','action'])
            ->make(true);
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.roles.create');
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
    protected function edit(string $id)
    {
        $role = Role::findOrFail($id);
        $permission = Permission::latest()->pluck('name')->toarray();

       $group_permission =  $this->groupPermissionsByModel($permission);
//       return $group_permission;
       return view("admin.roles.edit",  compact('group_permission','role'));
    }
    

    function groupPermissionsByModel($permissions) {
        $groups = [];
        foreach ($permissions as $permission) {
            // İzin adını boşluğa göre parçalayarak son kelimeyi alınması
            $words = explode('_', $permission);
            $last_word = end($words);
    
            // Grup henüz yoksa yenisi oluşturulacak
            if (!array_key_exists($last_word, $groups)) {
                $groups[$last_word] = [];
            }
    
            // İzni ilgili gruba ekle
            array_push($groups[$last_word], $permission);
        }
    
        return response($groups);
    }
    
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

      
        $request->validate([
            'display_name' => 'required',


        ],[
            'display_name.required' => 'Rol Alanı Gereklidir.',

        ]);


        $role = Role::findOrFail($id);

        $permissions = $request['permissions'];

      
        if ($role->hasPermissionto($request->permissions)) {
            $role->revokePermissionTo($request->permissions);

        }else {
            $role->givePermissionTo($request->permissions);
        }
//   dd($role->hasPermissionto($request->permissions));

        //Log::info(label_case($module_title . ' ' . $module_action) . ' | User:' . auth()->user()->name . '(ID:' . auth()->user()->id . ')');

        // Flash::success(__('labels.updated_successfully'))->success()->important();
       return response()->json(['status'=>'success','msg'=>true],200);
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
