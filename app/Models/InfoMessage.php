<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoMessage extends Model
{
    use HasFactory;

    protected $table = "info_message";
    protected $guarded = [];
    
}
