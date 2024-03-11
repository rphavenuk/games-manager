<?php

declare(strict_types=1);

namespace Infra\Duration;

use DateInterval;
use DateTimeImmutable;
use RpHaven\Games\Meet\Duration;
use Shrikeh\DateTime\Period as TimePeriod;

final readonly class Period implements Duration
{
    public function __construct(private TimePeriod $period)
    {
    }

    public function start(): DateTimeImmutable
    {
        return $this->period->start;
    }

    public function end(): DateTimeImmutable
    {
        return $this->period->end;
    }

    public function diff(): DateInterval
    {
        return $this->period->interval();
    }

    public function intersects(Duration $duration): bool
    {
        $period = TimePeriod::create($duration->start(), $duration->end());

        return $this->period->intersects($period);
    }
}
