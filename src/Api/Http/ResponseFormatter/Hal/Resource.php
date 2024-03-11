<?php

declare(strict_types=1);

namespace Api\Http\ResponseFormatter\Hal;

use Api\Http\ResponseFormatter\Hal\Factory\ResourceLinks;
use Api\Http\ResponseFormatter\Hal\Resource\Embedded;
use Api\Http\ResponseFormatter\Hal\Resource\State;
use JsonSerializable;

final readonly class Resource implements JsonSerializable
{
    public function __construct(
        private ResourceLinks $linksFactory,
        private ?State $state = new State(),
        private ?Embedded $embedded = new Embedded(),
    ) {
    }

    public function jsonSerialize(): array
    {
        return array_merge(
            $this->linksFactory->links($this)->jsonSerialize(),
            $this->state->jsonSerialize(),
            $this->embedded->jsonSerialize(),
        );
    }
}
