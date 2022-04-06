<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class XSS
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
        $input = $request->all();
		array_walk_recursive($input, function(&$input) {
			$input = strip_tags(htmlspecialchars(str_replace(array('<script>','</script>'),"",htmlspecialchars_decode($input))));
		});
		$request->merge($input);
		return $next($request);
    }
}
