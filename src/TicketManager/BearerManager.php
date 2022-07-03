<?php

namespace Zheltikov\Auth\TicketManager;

use Psr\Http\Message\RequestInterface;
use Zheltikov\Auth\Ticket\Token;
use Zheltikov\Auth\TicketManagerInterface;

abstract class BearerManager implements TicketManagerInterface
{
    protected RequestInterface $request;

    public function gatherTicket(): ?Token
    {
        if (!$this->request->hasHeader('Authorization')) {
            return null;
        }

        $headerLines = $this->request->getHeader('Authorization');

        foreach ($headerLines as $header) {
            if (preg_match('/^Bearer\s(\S+)$/iuU', $header, $matches) !== 1) {
                continue;
            }

            return new Token(value: $matches[1]);
        }

        return null;
    }
}
