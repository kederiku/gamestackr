<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
class Localization
{
    /**
    * Handle an incoming request.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \Closure  $next
    * @return mixed
    */
    public function handle(Request $request, Closure $next)
    {
        $route = $request->route()->getName();
        $route_exploded = explode('.', $route);
        if (!in_array($route_exploded[0], config('locales.supported'))) {
            if (app()->getLocale() != session()->get('locale')) {
                app()->setLocale(session()->get('locale'));
            }
        }
        else{
            if(count($route_exploded) > 1){
                if($route_exploded[1] == "home"){
                    if (session()->has('locale')) {
                        if (app()->getLocale() != session()->get('locale')) {
                            return redirect(localized_route('home', [], session()->get('locale')));
                        }
                    }
                    else{
                        $lang = locale_accept_from_http($_SERVER['HTTP_ACCEPT_LANGUAGE']);
                        if (!in_array($lang, config('locales.supported'))) {
                            $lang = 'en_US';
                        }    
                        session()->put('locale', $lang);
                        app()->setLocale($lang);
                        return redirect(localized_route('home', [], app()->getLocale()));
                    }
                }
            }
            if (app()->getLocale() != session()->get('locale')) {
                session()->put('locale', app()->getLocale());
            }
        }
        return $next($request);
    }
}
