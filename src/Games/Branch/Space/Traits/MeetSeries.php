<?php

declare(strict_types=1);

namespace RpHaven\Games\Branch\Space\Traits;

use DateInterval;
use DateTimeImmutable;
use Generator;
use RpHaven\Games\Branch\Space;
use RpHaven\Games\Meet;
use RpHaven\Games\Meet\Duration;

trait MeetSeries
{
    public function series(DateInterval $duration, DateTimeImmutable... $starts): Generator
    {
        foreach ($starts as $start) {
            yield new Meet($this->duration($start, $duration), $this->space());
        }
    }

    private function duration(DateTimeImmutable $start, DateInterval $duration): Duration
    {
        return new Duration($start, $start->add($duration));
    }

    abstract private function space(): Space;
}
