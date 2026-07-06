<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\Navigation\NavigationBuilder;
use Filament\Pages\Dashboard;
use App\Filament\Resources\Leads\LeadResource;
use App\Filament\Resources\Reviews\ReviewResource;
use App\Filament\Resources\Steps\StepResource;
use App\Filament\Resources\Examples\ExampleResource;
use App\Filament\Resources\CalculatorSettings\CalculatorSettingResource;
use App\Filament\Resources\Pages\PageResource;
use App\Filament\Resources\Users\UserResource;
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
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
            ])
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
            ->navigation(function (NavigationBuilder $builder): NavigationBuilder {
                $user = auth()->user();
                $items = [];
                
                // Dashboard
                $items = array_merge($items, Dashboard::getNavigationItems());
                
                // Ресурсы для всех
                $items = array_merge($items, LeadResource::getNavigationItems());
                $items = array_merge($items, ReviewResource::getNavigationItems());
                $items = array_merge($items, StepResource::getNavigationItems());
                $items = array_merge($items, ExampleResource::getNavigationItems());
                $items = array_merge($items, CalculatorSettingResource::getNavigationItems());
                $items = array_merge($items, PageResource::getNavigationItems());
                
                // Users только для админа
                if ($user && $user->isAdmin()) {
                    $items = array_merge($items, UserResource::getNavigationItems());
                }
                
                return $builder->items($items);
            });
    }
}