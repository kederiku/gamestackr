<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Cache;
use App\Models\Locale;
use App\Models\Language;

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
        $locales_supported = Cache::remember('locales_supported', now()->addDays(30), function () {
            return Locale::select("name")->get()->transform(function ($locale) {
                return $locale->name;
            })->toArray();
        });

        $languages = Cache::remember('language_list', now()->addDays(30), function () {
            return Language::select("alpha2")->get()->transform(function ($locale) {
                return $locale->alpha2;
            })->toArray();
        });
        config(['locales.supported' => $locales_supported]);
        config(['locales.languages' => $languages]);
    }
}
