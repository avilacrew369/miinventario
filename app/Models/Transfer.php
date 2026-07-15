<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    protected $guarded = [];

      // Relacion one to many inverse
    public function originWarehouse()
    {
        return $this->belongsTo(Warehouse::class, 'origin_warehouse_id');
    }
        // Relacion one to many inverse
    public function destinationWarehouse()
    {
        return $this->belongsTo(Warehouse::class, 'destination_warehouse_id');
    }
    
         //Relacion many to many polimorphic
    public function products()
    {
        return $this->morphToMany(Product::class, 'productable')
                ->withPivot('quantity', 'price', 'subtotal')->withTimestamps();
    }
}
