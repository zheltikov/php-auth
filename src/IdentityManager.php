<?php

namespace Zheltikov\Auth;

class IdentityManager implements IdentityManagerInterface
{
    public function identify(
        CredentialsManagerInterface $credentialsManager,
        TicketManagerInterface $ticketManager,
    ): ?IdentityInterface {
        $ticket = $ticketManager->gatherTicket();

        if ($ticket !== null) {
            if ($ticketManager->check($ticket) === true) {
                $identity = $ticketManager->identify($ticket);

                if ($identity !== null) {
                    return $identity;
                }
            }
        }

        $credentials = $credentialsManager->gatherCredentials();

        if ($credentials !== null) {
            if ($credentialsManager->check($credentials) === true) {
                $identity = $credentialsManager->identify($credentials);

                if ($identity !== null) {
                    $ticket = $ticketManager->generate($credentials, $identity);

                    if ($ticket !== null) {
                        $ticketManager->storeTicket($ticket);
                    }

                    return $identity;
                }
            }
        }

        return null;
    }
}
