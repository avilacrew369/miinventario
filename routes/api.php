<?php

use App\Models\Product;
use App\Models\Suppliers;
use Illuminate\Http\Request;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Route;


Route::post('/products', function (Request $request) {
    return Product::select('id', 'name')
             ->when($request->search,
                function( $query, $search) {
                    $query->where('name', 'like', "%{$search}%")
                    ->orWhere('sku', 'like', "%{$search}%");
                })
                    ->when(
                $request->exists('selected'),
                fn ($query) => $query->whereIn('id', $request->input('selected', [])),
                fn ($query) => $query->limit(10)
            )->get();
})->name('api.products.index');


Route::post('/suppliers', function (Request $request) {
    return Suppliers::select('id', 'name')
            ->when($request->search, function ($query, $search) {
                $query->where('name', 'like', "%{$search}%")
                ->orWhere('document_number', 'like', "%{$search}%");
            })
              ->when(
                $request->exists('selected'),
                fn (Builder $query) => $query->whereIn('id', $request->input('selected', [])),
                fn (Builder $query) => $query->limit(10)
            )->get();

})->name('api.suppliers.index');
