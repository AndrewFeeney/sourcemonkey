<?php

namespace WebSpanner\SourceMonkey\Exceptions;

use Exception;

class MonkeyNeedsAFileException extends Exception
{
    public function __construct(
        $message = 'You need to specify a file for source monkey to work on. Use the class constructor or the setPath() method.'
    )
    {
        parent::__construct($message);
    }
}
