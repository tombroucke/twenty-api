<?php

namespace Otomaties\Twenty\Metadata;

use Fansipan\Body\AsJson;
use Fansipan\Request;

final class ObjectsRequest extends Request
{
    use AsJson;

    public function __construct(
        private readonly ?string $objectName = null,
    ) {
        //
    }

    public function method(): string
    {
        return 'GET';
    }

    public function endpoint(): string
    {
        $endpoint = 'rest/metadata/objects';

        if ($this->objectName) {
            $endpoint .= '/'.$this->objectName;
        }

        return $endpoint;
    }
}
