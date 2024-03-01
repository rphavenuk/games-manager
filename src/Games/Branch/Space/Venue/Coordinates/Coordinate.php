<?php

declare(strict_types=1);

namespace RpHaven\Games\Branch\Space\Venue\Coordinates;

interface Coordinate
{
    public const DEGREE_SYMBOL = "\u{00B0}";
    public function degrees(): float;
}
