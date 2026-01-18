<?php

namespace App\Filament\Widgets;

use App\Models\Game;
use App\Models\Transaction;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total User', User::count())
                ->description('Pengguna terdaftar')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),

            Stat::make('Total Game', Game::count())
                ->description('Stok game tersedia')
                ->color('primary'),

            Stat::make('Pendapatan', 'Rp ' . number_format(Transaction::where('status', 'success')->sum('total_price'), 0, ',', '.'))
                ->description('Total uang masuk')
                ->color('success'),
        ];
    }
}