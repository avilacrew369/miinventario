<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    protected $guarded = [];

    // Relacion one to many inverse
    public function suppliers()
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
