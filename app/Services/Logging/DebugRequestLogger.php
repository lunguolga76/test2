<?php

namespace App\Services\Logging;

use Illuminate\Http\Request;

class DebugRequestLogger extends AbstractRequestLogger
{
    protected function prepareMessage(): string
    {

        return 'Useful information about Request';
    }

    protected function extractRequestData(Request $request): array
    {
        $url = $request->url();
        $urlWithQueryString = $request->fullUrl();
        $uri = $request->path();
        $input = $request->all();
        $method = $request->method();
        $ipAddress = $request->ip();
        $query = $request->query();
        $archived = $request->boolean('archived');

        return (compact([
            'url',
            'urlWithQueryString',
            'uri',
            'input',
            'method',
            'ipAddress',
            'query',
            'archived']));

    }
}
