<?php

namespace App\Models;

use App\Http\Traits\CreatedByTrait;
use App\Http\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use mysql_xdevapi\Table;

class Question extends Model
{
    use HasFactory, Uuid;
    
    protected $table = 'questions';
    protected $guarded = [];
    



    protected static function boot(): void
    {
        parent::boot();
        static::saving(function ($model) {
             $model->user_id = auth()->id();
            
        });
    }


    

}
