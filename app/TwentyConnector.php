<?php

namespace Otomaties\Twenty;

use Fansipan\Contracts\ConnectorInterface;
use Fansipan\Traits\ConnectorTrait;
use GuzzleHttp\Client;
use Psr\Http\Client\ClientInterface;

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

    protected function defaultClient(): ClientInterface
    {
        return new Client([
            'timeout' => 10,
            'headers' => [
                'Authorization' => 'Bearer '.$this->apiKey,
            ],
        ]);
    }
}
