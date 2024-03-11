<?php

declare(strict_types=1);

namespace Api\Http\ResponseFormatter;

use Api\Http\ResponseFormatter\Hal\Factory\ResourceLinks;
use Api\Http\ResponseFormatter\Hal\Resource;

final readonly class HalFactory
{

    public function __construct(private ResourceLinks $resourceLinks)
    {
    }
    public function build(): Resource
    {
        return new Resource(
            $this->resourceLinks,
        );
    }
}
