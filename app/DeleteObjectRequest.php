<?php

namespace Otomaties\Twenty;

use Fansipan\Body\AsJson;
use Fansipan\Request;

final class DeleteObjectRequest extends Request
{
    use AsJson;

    public function __construct(
        private readonly string $objectApiName,
        protected string $id,
    ) {
        //
    }

    public function method(): string
    {
        return 'DELETE';
    }

    public function endpoint(): string
    {
        return 'rest/'.$this->objectApiName.'/'.$this->id;
    }
}
