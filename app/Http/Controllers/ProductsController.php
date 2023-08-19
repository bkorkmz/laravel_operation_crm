<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return view('admin.product.index');
    }
    
    public function index_data  ()  {
        $data = Products::CreatedBy()->select('id','name','status','created_at','quantity','price')->orderBy('id','ASC');
        return Datatables::of($data)
            ->addIndexColumn()
            ->editColumn('name', '<strong>{{$name}}</strong>')
            ->editColumn('description', function($data){
                return $data->description ? $data->description: "";
            })
            ->editColumn('status', function ($data) {
                if ($data->status == 0) {
                    return '<span class="badge badge-primary">' . __('Onay Bekliyor') . ' </span >';
                }
                if ($data->status == 1) {
                    return '<span class="badge badge-success ">' . __('Yayında') . '</span>';
                }
                if ($data->status == 2) {
                    return '<span class="badge badge-warning">' . __('Tükendi') . '</span >';
                }
                if ($data->status == 3) {
                    return '<span class="badge badge-danger">' . __('Yayından Kaldırıldı') . '</span>';
                }
            })
            ->editColumn('price', function ($data) {
             
               
                    return '<span class="badge" > ' .$data->price ? $data->price ." TL" : "". ' </span >';
                
            })
            ->editColumn('quantity', function ($data) {
                if($data->quantity == 0){
                    $msg = "<span class='badge badge-danger' >".$data->quantity."</span>";
                }
                else
                {
                    $msg = "<span class='badge' >".$data->quantity. "  Adet  </span >";
                    
                }
                
                
                
                return $msg;
                
            })
            
            ->addColumn('action', function ($data) {
                
                return  '
                      <div class="text-center">
                        <a href="'.route('product.edit', $data->id).'"  data-toggle="tooltip" data-placement="top" title="Düzenle"><i class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green"></i></a>
                        <a href="'.route('product.destroy', $data->id).'" onclick="return confirm(\'Silme İşlemi onaylıyormusunuz ?\')"  data-toggle="tooltip" 
                        data-placement="top" title="Sil"><i class="feather icon-trash-2 f-w-600 f-16 text-c-red"></i></a>
                      </div>
                ';
//
                 
//                return view('admin.user.include.user_action', compact('data'));
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
        return view('admin.product.create');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required|max:255',
            'stock' => 'required|min:1|max:9999',
            'price' => 'required|min:1',
            'status' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'name.required' => 'Ürün Adı alanı zorunludur.',
            'description.required' => 'Ürün açıklaması alanı zorunludur.',
            'description.max' => 'Ürün açıklaması alanı maximum 255 karakter olmalıdır.',
            'stock.required' => 'Ürün miktarı alanı zorunludur.',
            'stock.min' => 'Miktar en az 1 olmalıdır.',
            'stock.max' => 'Miktar  en fazla 9999  olabilir.',
            'status.required' => 'Ürün durumu alanı zorunludur.',
            'price.required' => 'Fiyat alanı zorunludur.',
            'price.min' => 'Fiyat en az 1  olmalıdır.',
            'image.image' => 'Ürün resmi bir resim dosyası olmalıdır.',
            'image.mimes' => 'Ürün resmi yalnızca jpeg, png, jpg, gif veya svg formatında olabilir.',
            'image.max' => 'Ürün resmi en fazla 2 MB boyutunda olabilir.',
        ]);
        
        
        $product = new Products;
        $product->name = $validatedData['name'];
        $product->description = $validatedData['description'];
        $product->quantity = $validatedData['stock'];
        $product->price = $validatedData['price'];
        $product->status = $validatedData['status'];
        if($request->image)
        {
            $product->photo = '/storage/'.$validatedData['image']->store('products', 'public');
            
        }
        
        $product->save();
        toastr()->success('Ürün Ekleme İşlemi Tamamlandı.', 'Başarılı');
        
        if($request->is_next == '1')
        {
            return redirect()->back();
        }else {
            return redirect(route('product.index'));
        }
       
    }

    /**
     * Display the specified resource.
     */
    public function show(Products $products)
    {
       return view('admin.product.show',compact('products'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Products $products)
    {
        return view('admin.product.edit',compact('products'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Products $products)
    {
        
      
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'nullable|max:255',
            'stock' => 'required|min:1|max:9999',
            'price' => 'required|min:1',
            'status' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'name.required' => 'Ürün Adı alanı zorunludur.',
            'description.max' => 'Ürün açıklaması alanı maximum 255 karakter olmalıdır.',
            'stock.required' => 'Ürün miktarı alanı zorunludur.',
            'stock.min' => 'Miktar en az 1 olmalıdır.',
            'stock.max' => 'Miktar  en fazla 9999  olabilir.',
            'status.required' => 'Ürün durumu alanı zorunludur.',
            'price.required' => 'Fiyat alanı zorunludur.',
            'price.min' => 'Fiyat en az 1  olmalıdır.',
            'image.image' => 'Ürün resmi bir resim dosyası olmalıdır.',
            'image.mimes' => 'Ürün resmi yalnızca jpeg, png, jpg, gif veya svg formatında olabilir.',
            'image.max' => 'Ürün resmi en fazla 2 MB boyutunda olabilir.',
        ]);
        
        

        if($request->hasFile('image'))
        {
            $products['photo'] = '/storage/'.$validatedData['image']->store('products', 'public');
        }
        $products->update([
            'name'=>$validatedData['name'],
            'description'=>$validatedData['description'],
            'stock'=>$validatedData['stock'],
            'price'=>$validatedData['price'],
            'status'=>$validatedData['status'],
        ]);
        toastr()->success('Ürün Güncelleme İşlemi Tamamlandı.', 'Başarılı');
        
        return redirect(route('product.index'));
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Products $products) 
    {
        if($products){
            $products->delete();
//            Log::info($products . ' ' . 'Delete Products'. ' | User:' . Auth::user()->name);
            toastr()->success('İşlem başarılı şekilde tamamlanmıştır.','Başarılı');
        }else {
            toastr()->error('Başarısız','İşlem sırasında bir hata meydana gelmiştir.');
        }
        return back();
    }
    
    
    
    public function trash()
    {
        $products = Products::onlyTrashed()->orderBy('deleted_at', 'desc')->paginate(20);
        return view('admin.product.trash_index');
        
    }
       
    public function trashed_data() {
        $products = Products::onlyTrashed()->CreatedBy()
        ->select('id','name','status','created_at','quantity','price')->orderBy('id','ASC');
        return Datatables::of($products)
            ->addIndexColumn()
            ->editColumn('name', '<strong>{{$name}}</strong>')
            ->editColumn('description', function($data){
                return $data->description ? $data->description: "";
            })
            ->editColumn('status', function ($data) {
                if ($data->status == 0) {
                    return '<span class="badge badge-primary">' . __('Onay Bekliyor') . ' </span >';
                }
                if ($data->status == 1) {
                    return '<span class="badge badge-success ">' . __('Yayında') . '</span>';
                }
                if ($data->status == 2) {
                    return '<span class="badge badge-warning">' . __('Tükendi') . '</span >';
                }
                if ($data->status == 3) {
                    return '<span class="badge badge-danger">' . __('Yayından Kaldırıldı') . '</span>';
                }
            })
            ->editColumn('price', function ($data) {
             
               
                    return '<span class="badge" > ' .$data->price ? $data->price ." TL" : "". ' </span >';
                
            })
            ->editColumn('quantity', function ($data) {
                if($data->quantity == 0){
                    $msg = "<span class='badge badge-danger' >".$data->quantity."</span>";
                }
                else
                {
                    $msg = "<span class='badge' >".$data->quantity. "  Adet  </span >";
                }
                return $msg;
            })
            
            ->addColumn('action', function ($data) {
                
                return  '
                      <div class="text-center">
                        <a href="'.route('product.edit', $data->id).'"  data-toggle="tooltip" data-placement="top" title="Düzenle"><i class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green"></i></a>
                        <a href="'.route('product.destroy', $data->id).'" onclick="return confirm(\'Silme İşlemi onaylıyormusunuz ?\')"  data-toggle="tooltip" 
                        data-placement="top" title="Sil"><i class="feather icon-trash-2 f-w-600 f-16 text-c-red"></i></a>
                      </div>
                ';
//
                 
//                return view('admin.user.include.user_action', compact('data'));
            })
            ->escapeColumns([])
            ->rawColumns(['name','status','action'])
            ->make(true);

            
    }
    
    
    public function restore (Products $products)
    {
        
    }
    
    
    
    
}
