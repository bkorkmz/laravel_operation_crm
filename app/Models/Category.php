<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $table = 'categories';

    protected $dates = ['deleted_at', 'created_at', 'updated_at'];

    public function scopeParentNull($query)
    {
        return $query->where(function ($query) {
            $query->where('parent_id', '=', null)
                ->orWhere('parent_id', '=', 0);
        });
    }


    protected static function boot(): void
    {
        parent::boot();
        static::creating(function ($article) {
            $article->user_id = auth()->id();
        });
        static::created(function () {
            //  siteMap();
        });
    }


    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function content(): HasMany
    {
        return $this->hasMany(Article::class, 'category_id');
    }

    public function parent(): HasMany   //alt kategori bilgisi sonsuz alt kategori bilgisi
    {
        return $this->hasMany(Category::class, 'parent_id', 'id')
            ->with('parent')->select('id', 'name', 'parent_id');
    }

    public function sub_category(): HasMany // üst kategori bilgisini verir
    {
        return $this->hasMany(Category::class, 'id', 'parent_id')
            ->with('sub_category')
            ->select('id', 'name', 'parent_id');
    }

    public function getArticle(): HasMany
    {
        return $this->hasMany(Article::class, 'category_id');
    }

    public function getProduct(): BelongsToMany
    {
        return $this->belongsToMany(Products::class, 'product_category', 'category_id', 'product_id');
    }

    public function scopeProduct($query)
    {
        return $query->where(function ($query) {
            $query->parentNull()->where('model', 'product');
        });
    }

    public function scopeArticle($query)
    {
        return $query->where(function ($query) {
            $query->parentNull()->where('model', 'article');
        });
    }


    public function promotions()
    {
        return $this->belongsToMany(Promotion::class, 'promotion_category', 'category_id', 'promotion_id');
    }
}
