<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Test extends Model
{
    use HasFactory;
    
    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }
    
    
    
    /**
     * @return BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_tests_table');
    }
    
    /**
     * @return HasOne
     */
    public function questionBank()
    {
        return $this->hasOne(QuestionBank::class,'id', 'question_bank')->withCount('questions');
    }
    
}
