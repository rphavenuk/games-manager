<?php

declare(strict_types=1);

namespace RpHaven\Games\Branch\Space\Venue\Coordinates;

use Brick\Math\BigDecimal;
use JsonSerializable;
use RpHaven\Games\Branch\Space\Venue\Coordinates\Traits\BigDecimalTrait;
use RpHaven\Games\Branch\Space\Venue\Coordinates\Traits\CoordinateStringTrait;
use RpHaven\Games\Branch\Space\Venue\Coordinates\Traits\DegreesTrait;
use RpHaven\Games\Interface\ToStringable;
use RpHaven\Games\Traits\ToString;

final readonly class Longitude implements Coordinate, ToStringable, JsonSerializable
{
    use BigDecimalTrait;
    use DegreesTrait;
    use CoordinateStringTrait;
    use ToString;

    public function jsonSerialize(): array
    {
        return [GeographicCoordinate::LATITUDE->value => $this->toString()];
    }
    private function coordinate(): BigDecimal
    {
        return $this->coordinate;
    }
}
