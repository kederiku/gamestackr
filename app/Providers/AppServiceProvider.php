<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Cache;
use App\Models\Locale;
use App\Models\Language;
use Spatie\Translatable\Facades\Translatable;

Translatable::fallback(
    fallbackLocale: 'en_GB',
    fallbackAny: true,
);

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
        /*
        $languages = Cache::remember('language_list', now()->addDays(30), function () {
            return Language::select("alpha2")->get()->transform(function ($locale) {
                return $locale->alpha2;
            })->toArray();
        });*/
        $languages = ['en', 'fr', 'es', 'ja'];
        config(['locales.languages' => $languages]);
    }
}
