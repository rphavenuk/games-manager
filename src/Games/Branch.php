<?php

declare(strict_types=1);

namespace RpHaven\Games;

use Psr\Http\Message\UriInterface;
use RpHaven\Games\Branch\Status;

final readonly class Branch
{
    public function __construct(
        public string $name,
        public UriInterface $uri,
        public Status $status
    )
    {
    }
}
