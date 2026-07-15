<?php

namespace App\Livewire\Admin\Datatables;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\ImageColumn;

class ProductTable extends DataTableComponent
{
    // protected $model = Product::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setDefaultSort('id', 'desc');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            ImageColumn::make("Imagen")
                ->location(
                    fn($row) => $row->img
                )->attributes(
                    fn($row) => [
                        'class' => 'w-20 h-15 object-cover'
                    ]

                ),
            Column::make("Nombre", "name")
                ->searchable()
                ->sortable(),
            Column::make("Categoria", "category.name")
                ->searchable()
                ->sortable(),
            Column::make("Precio", "price")
                ->sortable(),
              Column::make('Acciones')
                ->label(function($row){
                    return view('admin.products.actions', ['product' => $row]);
                })
          
        ];
    }

    public function builder() : Builder
    {
        return Product::query()
            ->with('category', 'images');
    }
}
