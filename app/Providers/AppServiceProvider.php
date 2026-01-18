<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use Filament\Http\Responses\Auth\Contracts\LogoutResponse as LogoutResponseContract;
use App\Http\Responses\LogoutResponse;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Tetap pertahankan bind untuk logout kustom King
        $this->app->bind(LogoutResponseContract::class, LogoutResponse::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // 1. Paksa HTTPS di produksi agar tampilan CSS/JS tidak berantakan
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }

        // 2. Pertahankan Observer King
        \App\Models\Transaction::observe(\App\Observers\TransactionObserver::class);
    }
}