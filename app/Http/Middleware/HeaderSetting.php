<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HeaderSetting
{
    public function handle(Request $request, Closure $next)
    {
        return $next($request);
    }
}
