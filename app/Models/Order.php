<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'customer_id',
        'product_id',
        'quantity',
        'price',
        'total_price'
    ];
    
    public function customer()
    {
        return $this->belongsToMany(Customer::class);
    }
    
    public function products()
    {
        return $this->belongsToMany(Products::class);
    }
}
