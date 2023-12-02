<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Source;


class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {        
        if (!session()->has('locale')) {
            $lang = locale_accept_from_http($_SERVER['HTTP_ACCEPT_LANGUAGE']);
            if (!in_array($lang, config('locales.supported'))) {
                $lang = 'en_US';
            }    
            session()->put('locale', $lang);
            app()->setLocale($lang);
            return redirect(localized_route('home', [], app()->getLocale()));
        }

        $lang = app()->getLocale();
        $lang = explode('_', $lang)[0];
        $sources = Source::join('languages', 'languages.id', '=', 'sources.language_id')
            ->where('languages.alpha2', $lang)->take(6)->get();
        return view('pages.home', compact('sources'));
    }
}
