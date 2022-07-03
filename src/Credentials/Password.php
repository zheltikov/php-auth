<?php

namespace Zheltikov\Auth\Credentials;

use Zheltikov\Auth\CredentialsInterface;

class Password implements CredentialsInterface
{
    public function __construct(
        protected string $value,
    ) {
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
