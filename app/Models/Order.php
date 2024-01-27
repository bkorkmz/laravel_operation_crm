<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
        'price',
        'total_price'
    ];




    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }



    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Products::class, 'order_product')
            ->withPivot('quantity');
        // Eğer siparişte her üründen kaç adet olduğunu takip etmek istiyorsanız
    }
}
