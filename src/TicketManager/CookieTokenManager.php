<?php

namespace Zheltikov\Auth\TicketManager;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Yiisoft\Cookies\Cookie;
use Zheltikov\Auth\Ticket\Token;
use Zheltikov\Auth\TicketInterface;
use Zheltikov\Auth\TicketManagerInterface;

abstract class CookieTokenManager implements TicketManagerInterface
{
    protected ServerRequestInterface $serverRequest;
    protected ResponseInterface $response;
    protected string $cookieName;

    public function gatherTicket(): ?Token
    {
        $cookieParams = $this->serverRequest->getCookieParams();

        if (!array_key_exists($this->cookieName, $cookieParams)) {
            return null;
        }

        return new Token(value: $cookieParams[$this->cookieName]);
    }

    public function storeTicket(TicketInterface|Token $ticket): void
    {
        if ($ticket instanceof Token) {
            $cookie = new Cookie(name: $this->cookieName, value: $ticket->getValue());
            $cookie = $this->setCookie($cookie);
            $this->response = $cookie->addToResponse($this->response);
        }
    }

    abstract public function setCookie(Cookie $cookie): Cookie;
}
