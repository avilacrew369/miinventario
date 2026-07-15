<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'sku',
        'barcode',
        'price',
        'category_id'
    ];

    protected function img(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->images()->count() ? Storage::url($this->images()->first()->path) : 'https://static.vecteezy.com/system/resources/previews/022/059/000/non_2x/no-image-available-icon-vector.jpg',
        );
    }

         // Relacion one to many inverse
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
         // Relacion one to many 
    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }

     //Relacion  muchos a muchos polimorphic
    public function purchaseOrder()
    {
        return $this->morphedbyMany(PurchaseOrder::class, 'productable');
    }
       public function quotes()
    {
        return $this->morphedbyMany(Quotes::class, 'productable');
    }
    
      //Relacion  polimorphic
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function image()
    {
        return $this->images();
    }
    
}
