<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class ResponseDataLoggingMiddleware
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
        $response = $next($request);

        if (!$response->exception) {
            Log::info('Delivering a response!', ['viewFile' => $response->original->getPath(), 'responseData' => $response->original->getData()]);
        }
        return $response;
    }
}
