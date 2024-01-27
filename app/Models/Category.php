<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
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



    /**
     * @param $query
     * @return mixed
     */
    public function scopeParentNull($query): mixed
    {
        return $query->where(function ($query) {
            $query->where('parent_id', '=', null)
                ->orWhere('parent_id', '=', 0);
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

    public function parent(): HasMany   //alt kategori bilgisi sonsuz alt kategori bilgisi
    {
      return $this->hasMany(Category::class,'parent_id', 'id')
          ->with('parent')->select('id','name','parent_id');

    }


    public function sub_category(): HasMany // üst kategori bilgisini verir
    {
        return $this->hasMany(Category::class, 'id','parent_id')
            ->with('sub_category')
            ->select('id','name','parent_id');
    }





}
