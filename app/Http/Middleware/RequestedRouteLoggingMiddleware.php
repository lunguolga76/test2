<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RequestedRouteLoggingMiddleware
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
//    Log::info(
//        'Receiving a request!',
//        [
//            'accessedUrl' => $request->getUri(), 'routeUri' => $request->getRequestUri(),
//            'inputData' => $request->isJson() ? $request->json()->all() : $request->input()
//        ]
//    );

        return $next($request);
    }
}
