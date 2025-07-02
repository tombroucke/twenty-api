<?php

namespace Otomaties\Twenty;

use Fansipan\Body\AsJson;
use Fansipan\Request;

final class FindManyObjectsRequest extends Request
{
    use AsJson;

    public function __construct(
        private readonly string $objectApiName,
        private readonly ?string $orderBy = null,
        private readonly ?string $filter = null,
        private readonly ?int $limit = null,
        private readonly ?int $depth = null,
        private readonly ?string $startingAfter = null,
        private readonly ?string $endingBefore = null,
    ) {
        //
    }

    public function method(): string
    {
        return 'GET';
    }

    public function endpoint(): string
    {
        return 'rest/'.$this->objectApiName;
    }

    protected function defaultQuery(): array
    {
        return \array_filter([
            'order_by' => $this->orderBy,
            'filter' => $this->filter,
            'limit' => $this->limit,
            'depth' => $this->depth,
            'starting_after' => $this->startingAfter,
            'ending_before' => $this->endingBefore,
        ]);
    }
}
