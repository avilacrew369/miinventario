<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $guarded = [];

    // Relacion one to many inverse
    public function supplier()
    {
        return $this->belongsTo(Suppliers::class);
    }
          //Relacion many to many polimorphic
    public function products()
    {
        return $this->morphToMany(Product::class, 'productable')
                ->withPivot('quantity', 'price', 'subtotal')->withTimestamps();
    }
    
}
