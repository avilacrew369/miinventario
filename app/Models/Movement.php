<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movement extends Model
{
    protected $guarded = [];

         //Relacion many to many polimorphic
    public function products()
    {
        return $this->morphToMany(Product::class, 'productable')
                ->withPivot('quantity', 'price', 'subtotal')->withTimestamps();
    }
    
}
