<?php

declare(strict_types=1);

namespace RpHaven\Games\Branch\Space;

use Psr\Http\Message\UriInterface;
use RpHaven\Games\Branch\Space;
use RpHaven\Games\Branch\Space\Traits\MeetSeries;
use RpHaven\Games\Branch\Space\Venue\Coordinates;

final readonly class Venue implements Space
{
    use MeetSeries;

    public function __construct(
        public string $name,
        public Coordinates $coordinates,
        public ?UriInterface $uri = null
    ) {
    }


    public function matches(Venue $venue): bool
    {
        return $this->coordinates->matches($venue->coordinates);
    }

    public function jsonSerialize(): array
    {
        return [
            'name'          => $this->name,
            'coordinates'   => $this->coordinates,
            'uri'           => (string) $this->uri
        ];
    }

    private function space(): Space
    {
        return $this;
    }
}
