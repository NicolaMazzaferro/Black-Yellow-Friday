<?php

namespace App\Filament\Widgets;

use App\Models\Review;
use Filament\Widgets\ChartWidget;

class ReviewsChart extends ChartWidget
{
    protected static ?string $heading = 'Dettagli Recensioni';

    protected function getData(): array
    {
        // Ottieni il conteggio delle recensioni per ogni rating da 1 a 5
        $ratings = Review::selectRaw('rating, COUNT(DISTINCT product_id) as count')
            ->groupBy('rating')
            ->orderBy('rating', 'asc')
            ->pluck('count', 'rating')
            ->toArray();

        // Aggiungi i rating mancanti (se non ci sono recensioni con quel rating)
        for ($i = 1; $i <= 5; $i++) {
            if (!array_key_exists($i, $ratings)) {
                $ratings[$i] = 0;
            }
        }

        // Ordina i rating in modo crescente
        ksort($ratings);

        return [
            'datasets' => [
                [
                    'label' => 'Recensioni',
                    'data' => array_values($ratings),
                ],
            ],
            'labels' => array_keys($ratings), // Rating da 1 a 5
        ];
    }

    protected function getType(): string
    {
        return 'bar'; // Grafico a barre
    }
}
