<?php

namespace HakimRazalan\EngineMailer\Exceptions;

class RequiredParameterException extends \Exception
{
    public function __construct(string $parameter = '', int $code = 422)
    {
        parent::__construct(sprintf('Parameter %s cannot be null.',$parameter), $code);
    }
}