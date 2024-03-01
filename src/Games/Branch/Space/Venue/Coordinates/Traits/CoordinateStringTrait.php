<?php

declare(strict_types=1);

namespace RpHaven\Games\Branch\Space\Venue\Coordinates\Traits;

use Brick\Math\BigDecimal;

trait CoordinateStringTrait
{
    public function toString(): string
    {
        return (string) $this->coordinate();
    }

    abstract private function coordinate(): BigDecimal;
}
