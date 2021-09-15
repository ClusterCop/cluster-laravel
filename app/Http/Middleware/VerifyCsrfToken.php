<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;
use Closure;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        '/provider/request/*',
        '/provider/profile/available',
        '/stripe/account',
        '/contact/us',
        '/account/kit'
    ];
    
    public function handle($request, Closure $next)
    {
        if (
            parent::isReading($request) ||
            parent::runningUnitTests() ||
            parent::shouldPassThrough($request) ||
            parent::tokensMatch($request)
        ) {
            return parent::addCookieToResponse($request, $next($request));
        }

        return back()->with('error','The token has expired, please try again.');
    }
}
