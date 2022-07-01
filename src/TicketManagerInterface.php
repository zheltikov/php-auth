<?php

namespace Zheltikov\Auth;

interface TicketManagerInterface
{
    public function gatherTicket(): ?TicketInterface;

    public function check(TicketInterface $ticket): bool;

    public function identify(TicketInterface $ticket): ?IdentityInterface;

    public function generate(CredentialsInterface $credentials, IdentityInterface $identity): TicketInterface;

    public function storeTicket(TicketInterface $ticket): void;
}
