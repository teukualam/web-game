<?php

namespace App\Filament\Widgets;

use App\Models\Transaction;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class IncomeChart extends ChartWidget
{
    protected static ?string $heading = 'Grafik Pemasukan Tahun Ini';
    
    protected static ?int $sort = 2; // Urutan posisi widget
    
    protected int | string | array $columnSpan = 'full'; // Agar grafik lebar (full width)

    protected function getData(): array
    {
        // Mengambil data transaksi per bulan tahun ini
        $data = Trend::model(Transaction::class)
            ->between(
                start: now()->startOfYear(),
                end: now()->endOfYear(),
            )
            ->perMonth()
            ->sum('total_price'); // Menjumlahkan total harga

        return [
            'datasets' => [
                [
                    'label' => 'Pemasukan (Rp)',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                    'borderColor' => '#ea580c', // Warna Orange
                    'fill' => true,
                    'backgroundColor' => 'rgba(234, 88, 12, 0.1)', // Transparan Orange
                ],
            ],
            'labels' => $data->map(fn (TrendValue $value) => $value->date),
        ];
    }

    protected function getType(): string
    {
        return 'line'; // Tipe Line Chart
    }
}