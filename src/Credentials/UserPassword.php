<?php

namespace Zheltikov\Auth\Credentials;

use Zheltikov\Auth\CredentialsInterface;

class UserPassword implements CredentialsInterface
{
    public function __construct(
        protected string $user,
        protected string $password,
    ) {
    }
}
