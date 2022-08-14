<?php

namespace App\Services\Logging;
use Illuminate\Http\Request;
use Psr\Log\LoggerInterface;

abstract class AbstractRequestLogger implements RequestLoggerInterface
{
private  LoggerInterface $logger;

public  function __construct(LoggerInterface $logger){
    $this->logger=$logger;
}
public  function logRequest(Request $request): void
{
    $this->logger->info(
        $this->prepareMessage(),
        $this->extractRequestData($request)
    );
}
abstract  protected function prepareMessage():string;

abstract  protected function extractRequestData(Request $request):array;
}
