<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;

class Article extends Model
{
    use HasFactory,SoftDeletes;
    protected $table= 'articles';
    protected $guarded = [];






    protected static function boot(): void
    {
        parent::boot();
        static::creating(function ($article) {
            $article->user_id = auth()->id();
        });
        static::creating(function ($model) {
            Log::info('Creating event fired for model: ' . get_class($model));
            Artisan::call('site-map');
        });

        static::updating(function ($model) {
            Artisan::call('site-map');
            Log::info('Updating event fired for model: ' . get_class($model));
        });

        static::deleting(function ($model) {
            Artisan::call('site-map');
            Log::info('Deleting event fired for model: ' . get_class($model));
        });

    }



    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function author(){
        return $this->belongsTo(User::class, 'user_id');
    }



    public function get_article(){
        return $this->hasMany(Article::class, 'category_id');
    }
    public function get_product(){
        return $this->hasMany(Products::class, 'category_id');
    }

}
