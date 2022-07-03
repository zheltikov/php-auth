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

    public function getUser(): string
    {
        return $this->user;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}
