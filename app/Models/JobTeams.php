<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobTeams extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = "job_teams";



    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
}
