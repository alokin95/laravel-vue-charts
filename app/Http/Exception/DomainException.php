<?php

namespace App\Http\Exception;

use Symfony\Component\HttpKernel\Exception\HttpException;

class DomainException extends HttpException
{
    public function __construct
    (
        $message = null,
        int $statusCode = 400,
        \Throwable $previous = null,
        array $headers = [],
        ?int $code = 0
    )
    {
        if (null === $message) {
            $message = $this->message;
        } else {
            $message = ['errors' => $message];
            $message = json_encode($message);
        }
        parent::__construct($statusCode, $message, $previous, $headers, $code);
    }
}
