<?php

namespace App\Models;

//use App\Http\Traits\CreatedByTrait;

use App\Http\Traits\CreatedByTrait;
use App\Http\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Products extends Model
{
    use SoftDeletes,Uuid,CreatedByTrait;
    protected $fillable = [
        'name',
        'description',
        'quantity','settings',
        'price','status','created_by','photo'
    ];
    
    
  
    
    
    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
}
