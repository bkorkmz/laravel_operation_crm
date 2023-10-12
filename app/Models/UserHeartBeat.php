<?php

namespace App\Models;

use App\Http\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserHeartBeat extends Model
{
    use HasFactory,Uuid;
    
    protected $table = 'user_heart_beats';
    protected $guarded=[];
}
