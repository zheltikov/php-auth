<?php

namespace Zheltikov\Auth\CredentialsManager;

use Psr\Http\Message\RequestInterface;
use Zheltikov\Auth\Credentials\UserPassword;
use Zheltikov\Auth\CredentialsManagerInterface;

abstract class BasicManager implements CredentialsManagerInterface
{
    protected RequestInterface $request;

    public function gatherCredentials(): ?UserPassword
    {
        if (!$this->request->hasHeader('Authorization')) {
            return null;
        }

        $headerLines = $this->request->getHeader('Authorization');

        foreach ($headerLines as $header) {
            if (preg_match('/^Basic\s(\S+)$/iuU', $header, $matches) !== 1) {
                continue;
            }

            $token = base64_decode($matches[1]);

            if ($token === false) {
                continue;
            }

            $tokenParts = explode(':', $token, 2);

            if (count($tokenParts) !== 2) {
                continue;
            }

            return new UserPassword(user: $tokenParts[0], password: $tokenParts[1]);
        }

        return null;
    }
}
