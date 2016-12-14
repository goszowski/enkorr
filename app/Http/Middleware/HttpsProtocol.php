<?php

namespace App\Http\Middleware;

use Closure;

class HttpsProtocol
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      if (!$request->secure() and config('runsite.enable_ssl')) {
        return redirect()->secure($request->getRequestUri());
      }

      if ($request->secure() and !config('runsite.enable_ssl')) {
        return redirect($request->getRequestUri(), 302, array(), false);
      }
        return $next($request);
    }
}
