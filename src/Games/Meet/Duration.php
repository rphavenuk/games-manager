<?php

namespace RpHaven\Games\Meet;

use DateInterval;
use DateTimeImmutable;
use RpHaven\Games\Meet\Duration\Exception\StartDateTimeCannotBeAfterEndDateTime;

final readonly class Duration
{
    public function __construct(
        public DateTimeImmutable $start,
        public DateTimeImmutable $end,
    ) {
        if ($this->start > $this->end) {
            throw new StartDateTimeCannotBeAfterEndDateTime($this->start, $this->end);
        }
    }

    public function start(): DateTimeImmutable
    {
        return $this->start;
    }

    public function end(): DateTimeImmutable
    {
        return $this->end;
    }

    public function diff(): DateInterval
    {
        return $this->start->diff($this->end);
    }

    public function intersects(Duration $duration): bool
    {
        return ($duration->start < $this->end) && ($duration->end > $this->start);
    }
}

