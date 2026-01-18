<?php

namespace App\Filament\Widgets;

use App\Models\Transaction;
use App\Models\Game;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 1; // Taruh paling atas

    protected function getStats(): array
    {
        return [
            Stat::make('Total Pemasukan', 'Rp ' . number_format(Transaction::where('status', 'success')->sum('total_price'), 0, ',', '.'))
                ->description('Uang masuk terverifikasi')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),

            Stat::make('Total Transaksi', Transaction::count())
                ->description('Semua pesanan masuk')
                ->descriptionIcon('heroicon-m-shopping-cart')
                ->color('warning'),

            Stat::make('Total Game', Game::count())
                ->description('Produk aktif')
                ->descriptionIcon('heroicon-m-cube')
                ->color('primary'),
        ];
    }
}