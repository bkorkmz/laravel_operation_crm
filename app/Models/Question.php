<?php

namespace App\Models;

use App\Http\Traits\CreatedByTrait;
use App\Http\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use mysql_xdevapi\Table;

class Question extends Model
{
    use HasFactory, Uuid,SoftDeletes;
    
    protected $table = 'questions';
    protected $guarded = [];
    



    protected static function boot(): void
    {
        parent::boot();
        static::saving(function ($model) {
             $model->user_id = auth()->id();
            
        });
    }



    public function attendetQuestionBank()
    {
        $this->belongsTo(QuestionBank::class,'question_has_question_bank','question_bank_id','question_id');
    }

    

}
