<?php

declare(strict_types=1);

namespace RpHaven\Games;

use DateInterval;
use DateTimeImmutable;
use Generator;
use RpHaven\Games\Meet\Duration;
use RpHaven\Games\Branch\Space;

interface Meet
{
    public function start(): DateTimeImmutable;

    public function end(): DateTimeImmutable;

    public function repeat(int $days, int $numberOfTimes = 1): Generator;
}
