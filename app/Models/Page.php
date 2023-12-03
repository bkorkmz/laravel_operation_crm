<?php

namespace App\Models;

use App\Http\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use Uuid;
    
    protected  $table ='pages';
    protected $guarded = [];
    public $incrementing = false;
    protected $primaryKey = 'id';
    
    protected $casts = [
        'id' => 'string'
    ];
    
    
    
    
}
