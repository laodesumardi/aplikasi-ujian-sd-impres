<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\URL;
use App\Models\AppSetting;

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
        Paginator::useTailwind();

        // Force HTTPS scheme in production to prevent mixed content
        if (app()->environment('production')) {
            URL::forceScheme('https');
        }

        // Initialize default logo_path if not set
        try {
            $currentPath = AppSetting::getValue('logo_path', null);
            if (!$currentPath) {
                $candidates = [
                    'logo.jpeg',
                    'logo.png',
                    'logo.svg',
                    'uploads/logo.png',
                    'uploads/logo.svg',
                ];
                foreach ($candidates as $c) {
                    if (file_exists(public_path($c))) {
                        AppSetting::setValue('logo_path', $c);
                        break;
                    }
                }
            }
        } catch (\Throwable $e) {
            // ignore
        }
    }
}
