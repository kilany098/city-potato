<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Illuminate\Support\Facades\Cache;

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
        // URL::forceScheme('https');
        View::composer('*', function ($view) {
            $supportedLocales = LaravelLocalization::getSupportedLocales();
            $localizedUrls = [];
            $communications =  Cache::get('contacts.all');
            foreach ($supportedLocales as $localeCode => $properties) {
                $localizedUrls[$localeCode] = LaravelLocalization::getLocalizedURL($localeCode);
            }

            $view->with([
                'supportedLocales' => $supportedLocales,
                'currentLocaleDirection' => LaravelLocalization::getCurrentLocaleDirection(),
                'currentLocale' => app()->getLocale(),
                'localizedUrls' => $localizedUrls,
                'communications' => $communications,
            ]);
        });
    }
}
