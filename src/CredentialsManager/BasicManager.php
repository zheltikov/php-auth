<?php

namespace Zheltikov\Auth\CredentialsManager;

use Zheltikov\Auth\Credentials\UserPassword;
use Zheltikov\Auth\CredentialsManagerInterface;

abstract class BasicManager implements CredentialsManagerInterface
{
    public function gatherCredentials(): ?UserPassword
    {
        // TODO: Implement gatherCredentials() method.
    }
}
