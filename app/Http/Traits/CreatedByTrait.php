<?php

namespace App\Http\Traits;


trait CreatedByTrait
{

    public function scopeCreatedBy($query)
    {
        if (auth()->user()->hasRole('Super admin')) 
        {
            return $query->where('created_by',auth()->id() );
        }
        else
        {
            return $query;
        }
        
    }
    
}
    