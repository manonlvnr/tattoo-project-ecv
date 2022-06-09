<?php

namespace App\Filament\Widgets;

use App\Models\Flash;
use Filament\Widgets\LineChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class FlashChart extends LineChartWidget

{
    protected static ?string $heading = 'Flash';

    protected function getData(): array
    {
        $data = Trend::model(Flash::class)
        ->between(
            start: now()->startOfYear(),
            end: now()->endOfYear(),
        )
        ->perMonth()
        ->count();
        return [
            'datasets' => [
                [
                    'label' => 'Flash Trend',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                    'borderColor' => '#EAB305',
                ],
            ],
            'labels' => $data->map(fn (TrendValue $value) => $value->date),
        ];
    }
}

