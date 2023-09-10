<?php

namespace App\Http\Traits;


trait CreatedByTrait
{

    public function scopeCreatedBy($query)
    {
        if (auth()->id() != 1) 
        {
            return $query->where('created_by',auth()->id() );
        }
        else
        {
            return $query;
        }
        
    }
    
}
    