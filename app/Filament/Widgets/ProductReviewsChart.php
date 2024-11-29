<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Product;

class ProductReviewsChart extends ChartWidget
{
    protected static ?string $heading = 'Prodotti con Recensioni Positive';

    /**
     * Specifica il tipo di grafico (bar chart).
     */
    protected function getType(): string
    {
        return 'bar';
    }

    /**
     * Ottiene i dati per il grafico.
     */
    protected function getData(): array
    {
        // Ottieni i prodotti con il conteggio delle recensioni positive
        $products = Product::withCount(['reviews as positive_reviews_count' => function ($query) {
            $query->where('rating', '>=', 4);
        }])->get();

        // Prepara i dati per il grafico
        $labels = $products->pluck('name')->toArray();
        $values = $products->pluck('positive_reviews_count')->toArray();

        return [
            'datasets' => [
                [
                    'label' => 'Recensioni Positive',
                    'data' => $values,
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                    'borderColor' => 'rgba(75, 192, 192, 1)',
                    'borderWidth' => 1,
                ],
            ],
            'labels' => $labels,
        ];
    }
}
