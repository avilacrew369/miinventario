<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $guarded = [];

       //Relacion many to many polimorphic
    public function imageable()
    {
        return $this->morphTo();
    }
    
}
