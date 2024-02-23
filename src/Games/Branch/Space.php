<?php

declare(strict_types=1);

namespace RpHaven\Games\Branch;

use DateInterval;
use DateTimeImmutable;
use JsonSerializable;

interface Space extends JsonSerializable
{
    public function series(DateInterval $duration, DateTimeImmutable... $starts): iterable;
}
