<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class DemoCheck
{
    public function handle(Request $request, Closure $next)
    {
        if (config('app.product_mode') === 'DEMO') {
            if($request->ajax()){
                return response()->json(['errors' => ['Disabled for demo !']], 422);
            }else {
                return redirect()->back()->withErrors(['errors' => ['Disabled for demo !']]);
            }
        }

        return $next($request);
    }
}
