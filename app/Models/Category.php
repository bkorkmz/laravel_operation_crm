<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded = [];
    protected $table = "categories";
    protected $dates = ['deleted_at','created_at','updated_at'];




    protected static function boot(): void
    {
        parent::boot();
        static::creating(function ($article) {
            $article->user_id = auth()->id();
        });
        static::created(function () {
            siteMap();
        });
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
