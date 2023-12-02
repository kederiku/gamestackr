<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Locale;

class LocaleController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $locales = Locale::with('language', 'country')->get();
        $locales_by_region = [];
        foreach ($locales as $locale) {
            $region = $locale->country->region;
            if (!array_key_exists($region, $locales_by_region)) {
                $locales_by_region[$region] = [];
            }
            array_push($locales_by_region[$region], $locale);
        }
        return view('pages.choose-country-language', compact('locales_by_region'));
    }
}
