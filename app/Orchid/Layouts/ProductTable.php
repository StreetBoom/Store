<?php

namespace App\Orchid\Layouts;

use App\Models\Product;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class ProductTable extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'product.list';

    protected function striped(): bool
    {
        return true;
    }
    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('name','Название '),
            TD::make('description', 'Описание'),
            TD::make('price', 'Цена'),
            TD::make('created_at', 'Дата добавления'),


        ];
    }
}
