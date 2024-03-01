<?php

declare(strict_types=1);

namespace RpHaven\Games\Branch\Space;

use DateInterval;
use DateTimeImmutable;
use RpHaven\Games\Branch\Space;

final readonly class Virtual implements Space
{
    public function jsonSerialize(): array
    {
        return [];
    }

    public function series(DateInterval $duration, DateTimeImmutable ...$starts): iterable
    {
        // TODO: Implement series() method.
    }
}
