<?php

namespace Zheltikov\Auth;

interface IdentityManagerInterface
{
    public function identify(
        CredentialsManagerInterface $credentialsManager,
        TicketManagerInterface $ticketManager,
    ): ?IdentityInterface;
}
