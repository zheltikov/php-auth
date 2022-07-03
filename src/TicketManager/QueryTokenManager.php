<?php

namespace Zheltikov\Auth\TicketManager;

use GuzzleHttp\Psr7\Query;
use Psr\Http\Message\RequestInterface;
use Zheltikov\Auth\Ticket\Token;
use Zheltikov\Auth\TicketManagerInterface;

abstract class QueryTokenManager implements TicketManagerInterface
{
    protected RequestInterface $request;
    protected string $queryKey;

    public function gatherTicket(): ?Token
    {
        $queryString = $this->request->getUri()->getQuery();
        $queryParams = Query::parse($queryString);

        if (!array_key_exists($this->queryKey, $queryParams)) {
            return null;
        }

        return new Token(value: $queryParams[$this->queryKey]);
    }
}
