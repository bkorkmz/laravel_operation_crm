<?php

namespace App\Models;

use App\Http\Traits\CreatedByTrait;
use App\Http\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Products extends Model
{
    use SoftDeletes,CreatedByTrait;
    protected $fillable = [
        'id',
        'name',
        'description',
        'quantity','settings',
        'price','status','created_by','photo'
    ];
    
    
    protected static function boot(): void
    {
        parent::boot();
        static::saving(function ($product) {
             $product->created_by = auth()->id();
            if ($product->quantity == 0) {
                $product->status = 2;
            }
            if (auth()->user()->status !== 1)
            {
                $product->status =0;
            }
        });
        static::deleting(function ($product) {
            $user = Auth::user();
            if ($user->status === 1  || $product->created_by  !== $user->id) {
                throw new \Exception('Ürünü yalnızca oluşturan kullanıcı silebilir.');
            }
        });
    }
    
    
    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
}
