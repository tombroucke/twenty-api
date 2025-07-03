<?php

namespace Otomaties\Twenty;

use Fansipan\Contracts\ConnectorInterface;
use Fansipan\Middleware\Auth\BearerAuthentication;
use Fansipan\Traits\ConnectorTrait;

final class TwentyConnector implements ConnectorInterface
{
    use ConnectorTrait;

    public function __construct(private string $apiKey, private string $baseUri)
    {
        //
    }

    public function baseUri(): ?string
    {
        return rtrim($this->baseUri, '/').'/';
    }

    protected function defaultMiddleware(): array
    {
        return [
            new BearerAuthentication($this->apiKey),
        ];
    }
}
