<?php

namespace App\Services\Logging;
use Illuminate\Http\Request;

interface RequestLoggerInterface
{
public  function logRequest(Request $request):void;
}
