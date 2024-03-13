<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;



    public function categories()
    {
        return $this->belongsToMany(Category::class, 'promotion_category', 'promotion_id', 'category_id');
    }
}
