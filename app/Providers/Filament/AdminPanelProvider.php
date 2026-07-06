<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets\AccountWidget;
use Filament\Widgets\FilamentInfoWidget;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\PreventRequestForgery;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\Navigation\NavigationBuilder;
use App\Filament\Resources\LeadResource;
use App\Filament\Resources\ReviewResource;
use App\Filament\Resources\StepResource;
use App\Filament\Resources\ExampleResource;
use App\Filament\Resources\CalculatorSettingResource;
use App\Filament\Resources\PageResource;
use App\Filament\Resources\UserResource;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
{
    return $panel
        ->default()
        ->id('admin')
        ->path('admin')
        ->login()
        ->colors([
            'primary' => Color::Amber,
        ])
        ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
        ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
        ->pages([])
        ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
        ->widgets([])
        ->middleware([
            EncryptCookies::class,
            AddQueuedCookiesToResponse::class,
            StartSession::class,
            AuthenticateSession::class,
            ShareErrorsFromSession::class,
            VerifyCsrfToken::class,
            SubstituteBindings::class,
            DisableBladeIconComponents::class,
            DispatchServingFilamentEvent::class,
        ])
        ->authMiddleware([
            Authenticate::class,
        ])
        // Добавь этот блок для группировки и проверки прав
        ->navigation(function (NavigationBuilder $builder): NavigationBuilder {
            $user = auth()->user();
            
            $items = [];
            
            // Dashboard всегда виден
            $items[] = Dashboard::getNavigationItems()[0];
            
            // Leads (заявки) - видны всем
            $items = array_merge($items, LeadResource::getNavigationItems());
            
            // Reviews (отзывы) - видны всем
            $items = array_merge($items, ReviewResource::getNavigationItems());
            
            // Steps (шаги) - видны всем
            $items = array_merge($items, StepResource::getNavigationItems());
            
            // Examples (примеры) - видны всем
            $items = array_merge($items, ExampleResource::getNavigationItems());
            
            // Calculator Settings - видны всем
            $items = array_merge($items, CalculatorSettingResource::getNavigationItems());
            
            // Pages - видны всем
            $items = array_merge($items, PageResource::getNavigationItems());
            
            // Users - ТОЛЬКО для админа
            if ($user && $user->isAdmin()) {
                $items = array_merge($items, UserResource::getNavigationItems());
            }
            
            return $builder->items($items);
        });
}
}
