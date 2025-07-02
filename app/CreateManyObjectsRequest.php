<?php

namespace Otomaties\Twenty;

use Fansipan\Body\AsJson;
use Fansipan\Request;

final class CreateManyObjectsRequest extends Request
{
    use AsJson;

    public function __construct(
        private readonly string $objectApiName,
        protected array $objects = [],
        private readonly ?int $depth = null,
    ) {
        //
    }

    public function method(): string
    {
        return 'POST';
    }

    public function endpoint(): string
    {
        return 'rest/batch/'.$this->objectApiName;
    }

    protected function defaultBody()
    {
        return $this->objects;
    }

    protected function defaultQuery(): array
    {
        return \array_filter([
            'depth' => $this->depth,
        ]);
    }
}
