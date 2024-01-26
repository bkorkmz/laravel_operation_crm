<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Artisan;

class Article extends Model
{
    use HasFactory,SoftDeletes;
    protected $table= 'articles';
    protected $guarded = [];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function author(){
        return $this->belongsTo(User::class, 'user_id');
    }


    /**
     * @return void
     */




    protected static function boot(): void
    {
        parent::boot();
        static::creating(function ($article) {
            $article->user_id = auth()->id();
        });


        static::created(function () {
            siteMap();
        });
        static::updated(function () {
            siteMap();
        });
        static::deleted(function () {
            siteMap();
        });

    }

}
