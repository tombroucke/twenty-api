<?php

namespace Otomaties\Twenty;

use Fansipan\Body\AsJson;
use Fansipan\Request;

final class FindObjectRequest extends Request
{
    use AsJson;

    public function __construct(
        private readonly string $objectApiName,
        protected string $id,
        private readonly ?int $depth = null,
    ) {
        //
    }

    public function method(): string
    {
        return 'GET';
    }

    public function endpoint(): string
    {
        return 'rest/'.$this->objectApiName.'/'.$this->id;
    }

    protected function defaultQuery(): array
    {
        return \array_filter([
            'depth' => $this->depth,
        ]);
    }
}
