<?php

namespace Zheltikov\Auth\Ticket;

use Zheltikov\Auth\TicketInterface;

class Token implements TicketInterface
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
