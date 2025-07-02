<?php

namespace Otomaties\Twenty;

use Fansipan\Body\AsJson;
use Fansipan\Request;

final class UpdateObjectRequest extends Request
{
    use AsJson;

    public function __construct(
        private readonly string $objectApiName,
        protected string $id,
        protected array $objects,
        private readonly ?int $depth = null,
    ) {
        //
    }

    public function method(): string
    {
        return 'PATCH';
    }

    public function endpoint(): string
    {
        return 'rest/'.$this->objectApiName.'/'.$this->id;
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
