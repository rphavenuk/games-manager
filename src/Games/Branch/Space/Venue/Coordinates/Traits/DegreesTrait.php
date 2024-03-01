<?php

declare(strict_types=1);

namespace RpHaven\Games\Branch\Space\Venue\Coordinates\Traits;

use Brick\Math\BigDecimal;

trait DegreesTrait
{
    public function degrees(): float
    {
        return $this->coordinate()->toFloat();
    }

    abstract private function coordinate(): BigDecimal;
}
