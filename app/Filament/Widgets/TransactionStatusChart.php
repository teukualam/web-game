<?php

namespace App\Filament\Widgets;

use App\Models\Transaction;
use Filament\Widgets\ChartWidget;

class TransactionStatusChart extends ChartWidget
{
    protected static ?string $heading = 'Status Transaksi';
    
    protected static ?int $sort = 3;

    protected function getData(): array
    {
        // Hitung jumlah berdasarkan status
        $pending = Transaction::where('status', 'pending')->count();
        $success = Transaction::where('status', 'success')->count();
        $failed = Transaction::where('status', 'failed')->count();

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Transaksi',
                    'data' => [$pending, $success, $failed],
                    'backgroundColor' => [
                        '#fbbf24', // Kuning (Pending)
                        '#22c55e', // Hijau (Success)
                        '#ef4444', // Merah (Failed)
                    ],
                ],
            ],
            'labels' => ['Pending', 'Success', 'Failed'],
        ];
    }

    protected function getType(): string
    {
        return 'doughnut'; // Tipe Donut Chart
    }
}