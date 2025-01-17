<?php

namespace BitzenTecnologia\Http\Middleware;

use Closure;

class Cors
{
    Public function handle($request, Closure $next)
    {
        return $next($request)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods',
                'GET, POST, PUT, PATCH, DELETE, OPTIONS')
            ->header('Access-Control-Allow-Headers',
                'Content-Type, Authorization, X-Requested-With, X-XSRF-TOKEN');
    }
}
