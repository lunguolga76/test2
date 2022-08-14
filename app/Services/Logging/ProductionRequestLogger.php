<?php

namespace App\Services\Logging;

use Illuminate\Http\Request;

class ProductionRequestLogger extends AbstractRequestLogger
{
    protected function prepareMessage(): string
    {
        return 'Useful information for production';
    }

    protected function extractRequestData(Request $request): array
    {
        $url = $request->url();
        $ipAddress = $request->ip();
        $method = $request->method();

        return (compact(['url', 'ipAddress','method']));
    }
}

