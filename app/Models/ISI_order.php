<?php

namespace App\Models;

use App\Http\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ISI_order extends Model
{
    use SoftDeletes,Uuid;
    // use Translatable;
    protected $table = 'isi_order_new';
    protected $dates = ['deleted_at'];
    protected $guarded=[];
    
}
