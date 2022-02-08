<?php

namespace App\Http\Middleware;

use Closure;

use \Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Request;


class Lang {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){
        if(Request::segment(1)==='en' or Request::segment(1)==='ar'){
            App::setLocale(Request::segment(1));
        }else{
            App::setLocale('en');
        }

        if(App::getLocale()==='ar'){
            Session::put('HomeLang','ar');
        }else{
            Session::put('HomeLang','');
        }

        return $next($request);
    }
}
