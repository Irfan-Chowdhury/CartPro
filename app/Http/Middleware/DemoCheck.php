<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class DemoCheck
{
    public function handle(Request $request, Closure $next)
    {
        if (env('USER_VERIFIED')!=1) {
            // return response()->json(['demo' => ['Disabled for demo !']]);
            return response()->json(['errors' => ['Disabled for demo !']], 422);
        }

        return $next($request);
    }
}
