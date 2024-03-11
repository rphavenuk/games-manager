<?php

declare(strict_types=1);

namespace RpHaven\Games\Branch;

use Psr\Http\Message\UriInterface;
use RpHaven\Games\Branch\Space\Details;
use RpHaven\Games\Branch\Space\SpaceId;
use RpHaven\Games\Branch\Space\Status;

final readonly class Space
{
    public static function open(string $name, Details $details, UriInterface $uri): self
    {
        return new self(
            name: $name,
            details: $details,
            uri: $uri,
            status: Status::OPEN,
        );
    }

    private function __construct(
        public string $name,
        public Details $details,
        public UriInterface $uri,
        public Status $status,
    ) {
    }

    public function toId(): SpaceId
    {
        return SpaceId::create($this);
    }
}
