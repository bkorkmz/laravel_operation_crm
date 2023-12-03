<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Yajra\DataTables\Html\Editor\Fields\BelongsTo;

class Category extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded = [];
    protected $table = "categories";
    protected $dates = ['deleted_at'];



        
    protected static function boot(): void
    {
        parent::boot();
        static::creating(function ($article) {
            $article->user_id = auth()->id();
        });
    }


    public function author(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    

    public function content(): HasMany
    {
        return $this->hasMany(Article::class, 'category_id');
    }
    
    public function parent()
    {
      return $this->hasMany(Category::class,'parent_id', 'id')->select('id','name','parent_id');    
    }
    
    public function sub_category()
    {
        return $this->hasMany(Category::class, 'id','parent_id')->with('parent')->select('id','name','parent_id');
    }

}
