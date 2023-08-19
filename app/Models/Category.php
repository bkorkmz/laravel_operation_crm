<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = "categories";




        
    protected static function boot(): void
    {
        parent::boot();
        static::creating(function ($article) {
            $article->user_id = auth()->id();
        });
    }


    public function author(){
        return $this->belongsTo(User::class, 'user_id');
    }

}
