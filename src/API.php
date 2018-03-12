<?php

declare(strict_types=1);

namespace Yuloh\Math;

use Google\Protobuf\Internal\Message;

class API implements CalculatorInterface
{
	private $handler;

	public function __construct()
	{
		$this->handler = new Handler();
	}

    public function add(AddRequest $request): AddReply
    {
    	$reply = new AddReply();
	    $data = $this->makeRequest($request, 'add');
	    $reply->mergeFromString($data);

    	return $reply;
    }

    public function subtract(SubtractRequest $request): SubtractReply
    {
    	$reply = new SubtractReply();
	    $data = $this->makeRequest($request, 'subtract');
	    $reply->mergeFromString($data);

    	return $reply;
    }

    private function makeRequest(Message $message, string $method): string
    {
    	return  $this->handler->run($method, $message->serializeToString());
    }
}