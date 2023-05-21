<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'city',
        'state',
        'zip_code'
    ];
    
    /**
     * @return HasMany
     * Ürünler-
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
    
    
    /**
     * @return HasMany|null
     * Son sipariş verilen ürünler
     */
    public function mostOrderedProduct(): HasMany|null
    {
        return $this->hasMany(Order::class)
            ->selectRaw('product_id, count(*) as total_orders')
            ->groupBy('product_id')
            ->orderByDesc('total_orders')
            ->first();
    }
    
    /**
     * @param $count
     * @return mixed
     * Son kayıt olan müşteriler
     */
    
    public static function latestCustomers($count = 10)
    {
        return self::orderByDesc('created_at')
            ->take($count)
            ->get();
    }
    
    /**
     * @param $year
     * @return mixed
     * İlk yılı dolan müşteriler
     * 
     */
    public static function customersFirstYear($year = null)
    {
        if(is_null($year)) {
            $year = date('Y') - 1; // geçen yılın tarihi
        }
        return self::whereYear('created_at', $year)
            ->get();
    }
    
    
    /**
     * @param $count
     * @return mixed
     * En çok sipariş veren müşteriler
     */
    public static function mostOrderingCustomers($count = 10)
    {
        return self::withCount('orders')
            ->orderByDesc('orders_count')
            ->take($count)
            ->get();
    }
    
}
