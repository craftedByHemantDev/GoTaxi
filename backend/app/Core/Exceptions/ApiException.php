<?php

namespace App\Core\Exceptions;

use Exception;

class ApiException extends Exception
{
    public function __construct(
        string $message,
        protected int $status = 400,
        protected mixed $errors = null
    ) {
        parent::__construct($message);
    }

    public function getStatus(): int
    {
        return $this->status;
    }

    public function getErrors(): mixed
    {
        return $this->errors;
    }
}
