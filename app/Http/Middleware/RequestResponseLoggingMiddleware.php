<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;



class RequestResponseLoggingMiddleware
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
        return $next($request);
    }
    public function terminate($request, $response)
    {
//        if (!$response->exception) {
//            Log::info(
//                'Processed a request and tried to deliver a response',
//                [
//                    'request' => ['accessedUrl' => $request->getUri(), 'routeUri' => $request->getRequestUri()],
//                    'response' => ['viewFile' => $response->original->getPath(), 'responseData' => $response->original->getData()]
//                ]
//            );
//        }
    }
}
