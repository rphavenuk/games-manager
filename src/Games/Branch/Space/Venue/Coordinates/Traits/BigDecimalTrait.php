<?php

declare(strict_types=1);

namespace RpHaven\Games\Branch\Space\Venue\Coordinates\Traits;

use Brick\Math\BigDecimal;

trait BigDecimalTrait
{
    public static function create(float|string $coordinate): static
    {
        return new self(BigDecimal::of($coordinate));
    }

    private function __construct(private readonly BigDecimal $coordinate)
    {

    }
}
