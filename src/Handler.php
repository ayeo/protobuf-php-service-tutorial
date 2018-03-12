<?php

declare(strict_types=1);

namespace Yuloh\Math;

class Handler
{
    public function run(string $method, string $requestData): string
    {
        switch ($method)
        {
            case 'add':
                $request = new AddRequest();
                $request->mergeFromString($requestData);
                $reply = (new Calculator())->add($request);
                return $reply->serializeToString();
            case 'subtract':
                $request = new SubtractRequest();
                $request->mergeFromString($requestData);
                $reply = (new Calculator())->subtract($request);
                return $reply->serializeToString();
            default:
                throw new \LogicException('Invalid method');
        }
    }
}