<?php

namespace Otomaties\Twenty;

use Fansipan\Body\AsJson;
use Fansipan\Request;

final class CreateObjectRequest extends Request
{
    use AsJson;

    public function __construct(
        private readonly string $objectApiName,
        protected array $object = [],
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
        return 'rest/'.$this->objectApiName;
    }

    protected function defaultBody()
    {
        return $this->object;
    }

    protected function defaultQuery(): array
    {
        return \array_filter([
            'depth' => $this->depth,
        ]);
    }
}
