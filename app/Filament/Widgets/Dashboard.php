<?php

namespace App\Filament\Widgets;

use App\Models\User;
use App\Models\Aspirasi; // Pastikan nama model aspirasi Anda benar
use Filament\Facades\Filament;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class Dashboard extends BaseWidget
{

public static function canView(): bool
    {
        // Widget ini hanya tampil jika user yang login punya role 'admin'
        return Filament::auth()->user()->role === 'admin';
    }
    protected function getStats(): array
    {
        return [
            Stat::make('Jumlah Admin', User::where('role', 'admin')->count())
                ->description('Total akun administrator')
                ->descriptionIcon('heroicon-m-user-group')
                ->color('danger'),

            Stat::make('Jumlah Siswa', User::where('role', 'siswa')->count())
                ->description('Total akun siswa terdaftar')
                ->descriptionIcon('heroicon-m-users')
                ->color('info'),

            Stat::make('Aspirasi Masuk', Aspirasi::count())
                ->description('Total semua aspirasi')
                ->descriptionIcon('heroicon-m-chat-bubble-left-right')
                ->color('success'),
        ];
    }
}