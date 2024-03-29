<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortFolio extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = "sliders";


      
    protected static function boot(): void
    {
        parent::boot();
        static::saving(function ($product) {
             $product->user_id = auth()->id();
            
        });
    }

    public function category (){
        return $this->hasOne(Category::class,'id','category_id')->select('id','name','slug','show','model');
    }
    
}
