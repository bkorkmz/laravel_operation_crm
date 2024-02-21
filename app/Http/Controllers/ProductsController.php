<?php

namespace App\Http\Controllers;

use App\Models\Category;
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

    public function index_data()
    {
        $data = Products::select('id', 'name', 'status', 'created_at', 'stock', 'price', 'photo')
            ->with('category')
            ->orderBy('id', 'desc');
        return Datatables::of($data)
            ->addIndexColumn()
            ->editColumn('name', '<strong>{{$name}}</strong>')
            ->editColumn('description', function ($data) {
                return $data ? $data->description : "";
            })
            ->editColumn('status', content: function ($data) {

                switch ($data->status) {
                    case '0':
                        $status = '<span class="badge badge-primary">' . __('Onay Bekliyor') . ' </span >';
                    case '1':
                        return '<span class="badge badge-success ">' . __('Yayında') . '</span>';
                    case '2':
                        $status = '<span class="badge badge-warning">' . __('Tükendi') . '</span >';
                    case '3':
                        $status = '<span class="badge badge-danger">' . __('Yayından Kaldırıldı') . '</span>';
                    default:
                        $status = '<span class="badge badge-default">' . __('Durum Yok') . '</span>';
                }
                return $status;
            })
            ->editColumn('price', function ($data) {
                if($data->stock) {
                    if($data->stock <= 10) {
                        $msg = "<span class='badge badge-danger'>" . $data->stock . "</span>";
                    } elseif($data->stock > 10) {
                        $msg = "<span class='badge badge-info text-dark' >" . $data->stock . "</span>";
                    } elseif($data->stock == 0) {
                        $msg = "<span class='badge badge-default text-dark' >" . $data->stock . "</span>";
                    }
                } else {
                    $msg = "<span class='badge badge-default' >Stok girilmedi</span>";
                }
                $price =$data ? $data->price . " TL" : "" ;



                return $msg. '/ <span class="badge badge-inverse-primary" >'.$price.'</span>';
            })
            ->editColumn('stock', function ($data) {
                if(!blank($data->category)) {
                    foreach($data->category as $category) {
                        $msg[] = "<span class='badge badge-inverse-info' >$category->name</span><br>";
                    }
                } else {
                    $msg = "<span class='badge badge-inverse-danger' >Kategori  girilmedi</span>";
                }

                return $msg;

            })
            ->editColumn('photo', function ($data) {
                return "<img src='" . $data->photo . " alt=''  class='img-responsive img-centered' width='34' height='34'    ";
            })
            ->addColumn('action', function ($data) {

                return '
                      <div class="text-center">
                        <a href="' . route('product.edit', $data->id) . '"  data-toggle="tooltip" data-placement="top" title="Düzenle"><i class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green"></i></a>
                        <a href="' . route('product.destroy', $data->id) . '" onclick="return confirm(\'Silme İşlemi onaylıyormusunuz ?\')"  data-toggle="tooltip"
                        data-placement="top" title="Sil"><i class="feather icon-trash-2 f-w-600 f-16 text-c-red"></i></a>
                      </div>
                ';
//

//                return view('admin.user.include.user_action', compact('data'));
            })
            ->escapeColumns([])
            ->rawColumns(['name', 'status', 'action'])
            ->only()
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $all_categories = Category::where(['model' => 'product', 'show' => '1'])
            ->parentNull()->with('parent',function ($q){
                $q->where('show',1);
            })
            ->get();
        return view('admin.product.create', compact('all_categories'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|max:250',
            'description' => 'nullable|max:1000',
            'stock' => 'nullable|min:1',
            'price' => 'nullable|min:1',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ], [],[
            'name' => 'Ürün Adı',
            'description' => 'Ürün Açıklaması',
            'stock' => 'Ürün stoku.',
            'image' => 'Ürün resmi',
            'price' => 'Fiyat',
        ]);

        $product = new Products;
        $product->name = $validatedData['name'];
        $product->stock = $validatedData['stock'];
        $product->price = $validatedData['price'] ?? 0;
        $product->status = $request->status;
        $product->attributes = json_encode($request['attributes']);
        if(blank($request->slug)) {
            $slug = slug_format($validatedData['name']);
        } else {
            $slug = slug_format($request->slug);
        }
        $product->slug = $slug;

        $description = $validatedData['description'];

        if (request()->hasFile('image')) ;
        {
            $file_upload = fileUpload($validatedData['image'], 'products');
            $product->photo = $file_upload['path'];
        }

        if(request()->hasFile('files')) {
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
                if(!file_exists(public_path("upload"))) {
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
        $product->category()->sync($request->category_id);

        toastr()->success('Ürün Ekleme İşlemi Tamamlandı.', 'Başarılı');



        if($request->is_next == '1') {
            return back();
        } else {
            return redirect(route('product.index'));
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Products $products)
    {
        return view('admin.product.show', compact('products'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {

        $products = Products::where('id', $id)
            ->with('category:id,name')->first();
        return view('admin.product.edit', compact('products'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $products)
    {


        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:5000',
            'stock' => 'nullable|max:9999',
            'price' => 'nullable|min:1',
            'status' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ],[],
            [
            'name' => 'Ürün Adı ',
            'description' => 'Ürün açıklaması ',
            'stock' => 'Ürün miktarı ',
            'status' => 'Ürün durumu ',
            'price' => 'Ürün Fiyatı',
            'image' => 'Ürün resmi',

        ]);


        $data = [
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'stock' => $validatedData['stock'],
            'price' => $validatedData['price'],
            'status' => $validatedData['status'],
            'attributes' => json_encode($request['attributes']),
        ];

        if($request->hasFile('image')) {
            $file_upload = fileUpload($validatedData['image'], 'products');
            $data['photo'] = $file_upload['path'];
        }

        $product = Products::find($products);

//        $data['slug'] = slug_format(Str::limit($validatedData['name'],30));
        if(blank($request->slug)) {
            $data['slug'] = slug_format($validatedData['name']);
        } else {
            $data['slug'] = slug_format($request->slug);
        }

        $product->update($data);
        $product->category()->sync($request->category_id);

        toastr()->success('Ürün Güncelleme İşlemi Tamamlandı.', 'Başarılı');
        return redirect(route('product.index'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Products $products)
    {
        if($products) {
            $products->delete();
            toastr()->success('İşlem başarılı şekilde tamamlanmıştır.', 'Başarılı');
        } else {
            toastr()->error('Başarısız', 'İşlem sırasında bir hata meydana gelmiştir.');
        }
        return back();
    }


    public function trashed_index()
    {
        $products = Products::onlyTrashed()->orderBy('deleted_at', 'desc')->paginate(20);
        return view('admin.product.trash_index');

    }

    public function trashed_data()
    {
        $products = Products::onlyTrashed()->CreatedBy()
            ->select('id', 'name', 'status', 'created_at', 'stock', 'price')->orderBy('id', 'ASC');
        return Datatables::of($products)
            ->addIndexColumn()
            ->editColumn('name', '<strong>{{$name}}</strong>')
            ->editColumn('description', function ($data) {
                return $data->description ? $data->description : "";
            })
            ->editColumn('status', function ($data) {
                if($data->status == 0) {
                    return '<span class="badge badge-primary">' . __('Onay Bekliyor') . ' </span >';
                }
                if($data->status == 1) {
                    return '<span class="badge badge-success ">' . __('Yayında') . '</span>';
                }
                if($data->status == 2) {
                    return '<span class="badge badge-warning">' . __('Tükendi') . '</span >';
                }
                if($data->status == 3) {
                    return '<span class="badge badge-danger">' . __('Yayından Kaldırıldı') . '</span>';
                }
            })
            ->editColumn('price', function ($data) {


                return '<span class="badge" > ' . $data->price ? $data->price . " TL" : "" . ' </span >';

            })
            ->editColumn('stock', function ($data) {
                if($data->stock == 0) {
                    $msg = "<span class='badge badge-danger' >" . $data->stock . "</span>";
                } else {
                    $msg = "<span class='badge' >" . $data->stock . "  Adet  </span >";
                }
                return $msg;
            })
            ->addColumn('action', function ($data) {

                return '
                      <div class="text-center">
                        <a href="' . route('product.restored', $data->id) . '"  data-toggle="tooltip" data-placement="top" title="Düzenle"><i class="icon feather icon-refresh-ccw f-w-600 f-16 m-r-15 text-c-green"></i></a>
                        <a href="' . route('product.trashed', $data->id) . '" onclick="return confirm(\'Silme İşlemi onaylıyormusunuz ?\')"  data-toggle="tooltip" data-placement="top" title="Sil"><i class="feather icon-trash-2 f-w-600 f-16 text-c-red"></i></a>
                      </div>
                ';
//

//                return view('admin.user.include.user_action', compact('data'));
            })
            ->escapeColumns([])
            ->rawColumns(['name', 'status', 'action'])
            ->make(true);


    }


    public function restore($id)
    {
        $model = Products::onlyTrashed()->where('id', $id)->first();
        $model->restore();
        Log::info($model . ' ' . 'Restore Products' . ' | User:' . Auth::user()->name);
        toastr()->success('İşlem başarılı şekilde tamamlanmıştır.', 'Başarılı');
        return back();
    }

    public function trashed($id)
    {
        $model = Products::onlyTrashed()->findOrFail($id);
        $model->forceDelete();
        Log::info($model . ' ' . 'Forcedelete product' . ' | User:' . Auth::user()->name);
        //        session()->flash('message', 'Delete Successfully');
        toastr()->success('İşlem başarılı şekilde tamamlanmıştır.', 'Başarılı');
        return redirect()->back();
    }


}
