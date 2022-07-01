<?php

namespace Zheltikov\Auth;

interface CredentialsManagerInterface
{
    public function gatherCredentials(): ?CredentialsInterface;

    public function check(CredentialsInterface $credentials): bool;

    public function identify(CredentialsInterface $credentials): ?IdentityInterface;
}
