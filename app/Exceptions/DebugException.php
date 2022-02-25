<?php

namespace App\Exceptions;

use Exception;
use JetBrains\PhpStorm\Internal\LanguageLevelTypeAware;

class DebugException extends Exception
{
    private $data;

    public function __construct($data, string $message = "", int $code = 0, ?Throwable $previous = null)
    {
        $this->data = $data;
        parent::__construct($message, $code, $previous);
    }
}
