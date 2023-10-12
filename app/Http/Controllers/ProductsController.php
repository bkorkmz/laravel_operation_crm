<?php

namespace App\Http\Controllers;

use App\Models\ISI_order;
use App\Models\Products;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
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
        $data = Products::select('id','name','status','created_at','stock','price','photo')->orderBy('id','ASC');
        return Datatables::of($data)
            ->addIndexColumn()
            ->editColumn('name', '<strong>{{$name}}</strong>')
            ->editColumn('description', function($data){
                return $data->description ? $data->description: "";
            })
            ->editColumn('status', content: function ($data) {
                
                switch ($data->status) {
                    case '0':
                    return '<span class="badge badge-primary">' . __('Onay Bekliyor') . ' </span >';
                        break;
                    case '1':
                    return '<span class="badge badge-success ">' . __('Yayında') . '</span>';
                        break;
                    case '2':
                    return '<span class="badge badge-warning">' . __('Tükendi') . '</span >';
                        break;
                    case '3':
                    return '<span class="badge badge-danger">' . __('Yayından Kaldırıldı') . '</span>';
                        break;
                    
                    default:
                        return '<span class="badge badge-default">' . __('Durum Yok') . '</span>'; 
                        break;
                }
                
                
                if ($data->status == 0) {return '<span class="badge badge-primary">' . __('Onay Bekliyor') . ' </span >';}
                if ($data->status == 1) {return '<span class="badge badge-success ">' . __('Yayında') . '</span>';}
                if ($data->status == 2) {return '<span class="badge badge-warning">' . __('Tükendi') . '</span >';}
                if ($data->status == 3) {return '<span class="badge badge-danger">' . __('Yayından Kaldırıldı') . '</span>';}
            })
            ->editColumn('price', function ($data) {
                
                    return '<span class="badge" > ' .$data->price ? $data->price ." TL" : "". ' </span >';
            })
            ->editColumn('stock', function ($data) {
                if($data->stock){
                    if ($data->stock <= 10) {
                        $msg = "<span class='badge badge-danger' >".$data->stock."</span>";
                    } elseif ($data->stock > 10) {
                        $msg = "<span class='badge badge-success' >".$data->stock."</span>";
                    } elseif ($data->stock == 0) {
                        $msg = "<span class='badge badge-default' >".$data->stock."</span>";
                    }
                }else {
                    $msg = "<span class='badge badge-default' >Stok Yok</span>";
                }
                
                return $msg;
                
            })
            ->editColumn('photo',function ($data) {
                return "<img src='".$data->photo." alt=''  class='img-responsive img-centered' width='34' height='34'    ";
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
            ->rawColumns(['name','status','action','photo'])
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
//      dd($request->all());
        $validatedData = $request->validate([
            'name' => 'required|max:250',
            'description' => 'required|max:1000',
            'stock' => 'nullable|min:1',
            'price' => 'nullable|min:1',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'name.required' => 'Ürün Adı alanı zorunludur.',
            'description.required' => 'Ürün açıklaması alanı zorunludur.',
            'description.max' => 'Ürün açıklaması alanı maximum 255 karakter olmalıdır.',
            'stock.min' => 'Ürün stok  en az 1 olmalıdır.',
            'image.required' => 'Ürün resmi alanı zorunludur.',
            'price.min' => 'Fiyat en az 1  olabilir.',
            'image.image' => 'Ürün resmi bir resim dosyası olmalıdır.',
            'image.mimes' => 'Ürün resmi yalnızca jpeg, png, jpg, gif veya svg formatında olabilir.',
            'image.max' => 'Ürün resmi en fazla 2 MB boyutunda olabilir.',
        ]);
        
        $product = new Products;
        $product->name = $validatedData['name'];
        $product->stock = $validatedData['stock'];
        $product->price = $validatedData['price'];
        $product->status = $request->status;
        $description = $validatedData['description'];
        
        if($request->image);
        {
            $file_upload = fileUpload($validatedData['image'],'products');
            $product->photo =   $file_upload['path'];
        }
        
        if (request()->hasFile('files')) {
            $dom = new \DOMDocument();
            $dom->loadHtml($description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            $images = $dom->getElementsByTagName('img');
            
            foreach ($images as $k => $img) {
                $data = $img->getAttribute('src');
                
                list($type, $data) = explode(';', $data);
                list(, $data) = explode(',', $data);
                $data = base64_decode($data);
                $image_name = "upload/" . time() . $k . '.png';
                $path = public_path("{$image_name}");
                
                if (!file_exists(public_path("upload"))) {
                    mkdir(public_path("upload"), 0777, true);
                }
                
                file_put_contents($path, $data);
                
                $img->removeAttribute('src');
                $img->setAttribute('src', asset("{$image_name}"));
            }
            $description = $dom->saveHTML();
        }
        
        $product->description = $description;
        $product->save();
        $slug = slug_format(Str::limit('30',$validatedData['name'],"").$product->id);
        
        $product->update([
           'slug'=> $slug,
        ]);
        
        toastr()->success('Ürün Ekleme İşlemi Tamamlandı.', 'Başarılı');
        
//        return response()->json(['message' => 'success', 'status' => true,'action'=>'create'],200);

        
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
            // if ($model->image != "") {
            //     deleteOldPicture($model->avatar);
            //  }
             $file_upload = fileUpload($validatedData['image'],'products');
             $products['photo'] =   $file_upload['path'];
            // $products['photo'] = '/storage/'.$validatedData['image']->store('products', 'public');
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
        ->select('id','name','status','created_at','stock','price')->orderBy('id','ASC');
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
            ->editColumn('stock', function ($data) {
                if($data->stock == 0){
                    $msg = "<span class='badge badge-danger' >".$data->stock."</span>";
                }
                else
                {
                    $msg = "<span class='badge' >".$data->stock. "  Adet  </span >";
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
