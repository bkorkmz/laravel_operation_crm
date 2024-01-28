<?php

namespace App\Models;

use App\Http\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuestionBank extends Model
{
    use HasFactory,Uuid,SoftDeletes;
    protected $table = 'question_banks';
    protected $guarded=[];



    protected static function boot(): void
    {
        parent::boot();
        static::saving(function ($model) {
             $model->user_id = auth()->id();

        });
    }



    public function author()
    {
        $this->hasOne(User::class);
    }

    public function questions()
    {
        return $this->belongsToMany(Question::class, 'question_has_question_bank', 'question_bank_id', 'question_id');
    }

}
