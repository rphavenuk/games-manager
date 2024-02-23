<?php

declare(strict_types=1);

namespace Infra\Meet;

use DateTimeImmutable;
use Generator;
use RpHaven\Games\Branch\Space;
use RpHaven\Games\Meet;
use Shrikeh\DateTime\Period;
use Shrikeh\DateTime\Period\DurationDateInterval;

final readonly class MeetPeriod implements Meet
{
    public function __construct(
        private readonly Period $period,
        public readonly Space $space
    ) {
    }


    public function start(): DateTimeImmutable
    {
        return $this->period->start;
    }

    public function end(): DateTimeImmutable
    {
        return $this->period->end;
    }

    public function repeat(int $days, int $numberOfTimes = 1): Generator
    {
        $dateInterval = new DurationDateInterval(sprintf('P%dD', $days));

        /** @var Period $recurrence */
        foreach ($this->period->recurTimes($dateInterval, $numberOfTimes) as $recurrence) {
            yield new self($recurrence, $this->space);
        }
    }
}
