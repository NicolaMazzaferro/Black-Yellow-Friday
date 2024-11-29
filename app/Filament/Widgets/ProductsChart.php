<?php

namespace App\Filament\Widgets;

use App\Models\Product;
use Filament\Widgets\ChartWidget;

class ProductsChart extends ChartWidget
{
    protected static ?string $heading = 'Dettagli Prodotti';

    protected function getData(): array
    {
        $productsWithDiscount = Product::where('discount', '>', 0)->count();
        $productsWithoutDiscount = Product::where('discount', '=', 0)->count();
    
        return [
            'datasets' => [
                [
                    'label' => 'Prodotti',
                    'data' => [$productsWithDiscount, $productsWithoutDiscount],
                ],
            ],
            'labels' => ['Con Sconto', 'Senza Sconto'],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
