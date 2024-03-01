<?php

declare(strict_types=1);

namespace RpHaven\Games\Game;

use Psr\Http\Message\UriInterface;

readonly class System
{
    public function __construct(
        public string $name,
        public ?UriInterface $uri = null
    ) {
        if ('' === $name) {

        }
    }
}
