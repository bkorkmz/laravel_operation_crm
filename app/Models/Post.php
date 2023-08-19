<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{

    use SoftDeletes;
    protected $table = "post";
    protected $guarded = [];



       protected static function boot(): void
    {
        parent::boot();
        static::creating(function ($post) {
            $post->user_id = auth()->id();
        });
    }



    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function author(){
        return $this->belongsTo(User::class, 'user_id');
    }
    // public function photogallery(){
    //     return $this->belongsTo('App\PhotoGallery', 'photogallery_id');
    // }
    // public function videogallery(){
    //     return $this->belongsTo('App\VideoGallery', 'videogallery_id');
    // }
    // public function sources(){
    //     return $this->belongsTo('App\Source', 'source_id');
    // }

}
