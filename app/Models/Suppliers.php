<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Suppliers extends Model
{
    use HasFactory;
    protected $fillable = [
        'identity_id', 
        'document_number', 
        'name',
        'address', 
        'email', 
        'phone'
        ];
      

       //Relacion one to many
    public function identity()
    {
        return $this->belongsTo(Identity::class);
    }
       //Relacion one to many
    public function purchaseOrders()
    {
        return $this->hasMany(PurchaseOrder::class);
    }

       //Relacion one to many
    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }


    
}
