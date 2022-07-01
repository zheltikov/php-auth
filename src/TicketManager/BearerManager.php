<?php

namespace Zheltikov\Auth\TicketManager;

use Zheltikov\Auth\Ticket\Token;
use Zheltikov\Auth\TicketInterface;
use Zheltikov\Auth\TicketManagerInterface;

abstract class BearerManager implements TicketManagerInterface
{
    public function gatherTicket(): ?Token
    {
        // TODO: Implement gatherTicket() method.
    }

    public function storeTicket(TicketInterface $ticket): void
    {
        if (!$ticket instanceof Token) {
            return;
        }

        // TODO: Implement storeTicket() method.
    }
}
