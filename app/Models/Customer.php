<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $guarded = [];

    //Relacion one to many inverse
    public function identity()
    {
        return $this->belongsTo(Identity::class);
    }
       //Relacion one to many
    public function quotes()
    {
        return $this->belongsTo(Quotes::class);
    }

       //Relacion one to many
    public function sales()
    {
        return $this->belongsTo(Sale::class);
    }
    
}
