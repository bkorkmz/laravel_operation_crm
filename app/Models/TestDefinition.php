<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestDefinition extends Model
{
    use HasFactory;
    
    
    
    
    protected $table="user_test_definition";
    protected $guarded=[];
    
    
    
    
    public function getTestData()
    {
      return  $this->hasOne(Test::class,'id','test_id');
    }
     public function getQbank()
    {
      return   $this->hasOne(QuestionBank::class,'id','qbank_id')->with('questions');
    }
    
    
}
