<?php

namespace App\Http\Traits;

use Illuminate\Support\Str;

trait Uuid
{

    protected static function boot()
    {
        parent::boot();
        parent::boot();
        static::saving(function ($model) {
            $model->incrementing = false;
            $model->keyType = 'string';
            $model->{$model->getKeyName()} = Str::uuid()->toString();
        });
    }

    
}
