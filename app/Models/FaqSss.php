<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaqSss extends Model
{
    use HasFactory;
    protected $table= 'faq_ssses';
    protected $guarded= [];

    protected static function boot(): void
    {
        parent::boot();
        static::saving(function ($product) {
             $product->user_id = auth()->id();
            
        });
    }
}
