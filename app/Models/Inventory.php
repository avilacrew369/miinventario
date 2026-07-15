<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $guarded = [];

         // Relacion one to many inverse
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
         // Relacion one to many inverse
    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }
          //Relacion many to many polimorphic
    public function inventoryable()
    {
        return $this->morphTo();
    }
}
