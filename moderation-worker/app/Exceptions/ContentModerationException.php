<?php

namespace ModWorker\Exceptions;

use Exception;

class ContentModerationException extends Exception
{
    public function __construct(
        string $message = 'Content moderation failed',
        int $code = 0,
        $previous = null
    )
    {
        parent::__construct($message, $code, $previous);
    }
}
