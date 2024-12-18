<?php

namespace App\Providers;

use App\Livewire\CustomLogin;
use App\Livewire\Pages\Auth\Login;
use Filament\Facades\Filament;
use Illuminate\Support\ServiceProvider;
use Filament\Support\Assets\Css;
use Filament\Support\Facades\FilamentAsset;
use Filament\Support\Facades\FilamentView;
use Filament\View\PanelsRenderHook;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        FilamentAsset::register([
            Css::make('agricultura', __DIR__ . '/../../resources/css/agricultura.css'),
        ]);

        FilamentView::registerRenderHook(
            PanelsRenderHook::BODY_START,
            fn (): View => view('filament.settings.custom-navbar'),
            scopes: Login::class,
        );

        FilamentView::registerRenderHook(
            PanelsRenderHook::BODY_START,
            fn ():  View => view('filament.settings.custom-login-banner'),
            scopes: Login::class,
        );

        FilamentView::registerRenderHook(
            PanelsRenderHook::FOOTER,
            fn (): View => view('filament.settings.custom-footer'),
            scopes: Login::class,
        );
    }
}
