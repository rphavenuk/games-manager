<?php

declare(strict_types=1);

namespace RpHaven\Games\Branch\Space\Details\Venue;

use JsonSerializable;
use RpHaven\Games\Branch\Space\Details\Venue\Coordinates\Latitude;
use RpHaven\Games\Branch\Space\Details\Venue\Coordinates\Longitude;
use RpHaven\Games\Interface\ToStringable;
use RpHaven\Games\Traits\ToString;

final readonly class Coordinates implements ToStringable, JsonSerializable
{
    use ToString;

    public static function create(float|string $latitude, float|string $longitude): self
    {
        return new self(
            Latitude::create($latitude),
            Longitude::create($longitude),
        );
    }
    public function __construct(
        public Latitude $latitude,
        public Longitude $longitude,
    ) {
    }

    public function toString(): string
    {
        return sprintf(
            '%s,%s',
            $this->latitude,
            $this->longitude
        );
    }

    public function matches(Coordinates $coordinates): bool
    {
        return $this->toString() === $coordinates->toString();
    }

    public function jsonSerialize(): array
    {
        return [
            $this->latitude,
            $this->longitude,
        ];
    }
}
