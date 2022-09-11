<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;
use Closure;
use Auth;
use Session;
class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $addHttpCookie = true;
    
    protected $except = [
        '/bbs/response-ekpay-ipn-tax'
    ];


    // public function handle($request, Closure $next) {
    //     if (Auth::check()) {
    //         return $next($request);
    //     }
    //     abort(403);
    // }

}
