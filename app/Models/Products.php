<?php

namespace App\Models;

use App\Http\Traits\CreatedByTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Products extends Model
{
    use CreatedByTrait, SoftDeletes;

    protected $fillable = [
        'id',
        'name',
        'description','short_detail',
        'stock', 'settings', 'slug', 'old_price',
        'price', 'status', 'created_by', 'photo','attributes'
    ];

    protected static function boot(): void
    {
        parent::boot();
        static::saving(function ($product) {
//            $product->created_by = auth()->id();
            $product->status = 1; //0: onay bekleniyor 1:aktif 2:tükendi 3:yayından kaldırıldı
        });
        static::created(function () {
            //            siteMap();
        });
        //        static::deleting(function ($product) {
        //            $user = Auth::user();
        //            if ($user->status === 1  || $product->created_by  !== $user->id) {
        //                throw new \Exception('Ürünü yalnızca oluşturan kullanıcı silebilir.');
        //            }
        //        });
    }

    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(Order::class);
    }

    public function category(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'product_category', 'product_id', 'category_id')
            ->with('sub_category');
    }
}
