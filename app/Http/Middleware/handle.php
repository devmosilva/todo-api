<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class corsVerify extends Middleware
{
    public function handle($request, Closure $next)
    {
        return $next($request)
          ->header('Access-Control-Allow-Origin', '*') 
          ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, PATCH, DELETE, OPTIONS')
          ->header('Access-Control-Allow-Headers', 'content-type, authorization, x-requested-with');
    }
}
