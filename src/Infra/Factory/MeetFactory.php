<?php

declare(strict_types=1);

namespace Infra\Factory;

use DateInterval;
use DateTimeImmutable;
use Generator;
use RpHaven\Games\Branch\Space;

final readonly class MeetFactory
{
    public function __construct(
        private Space $space,
        private DateInterval $meetDuration
    ) {
    }

    public function series(
        DateTimeImmutable $firstMeetStart,
        DateInterval $seriesInterval,
        int $numberOfMeets
    ): Generator {
        $lastMeet = $firstMeetStart;
        $meets = [$lastMeet];
        for ($i = 1; $i<$numberOfMeets; $i++) {
            $lastMeet = $lastMeet->add($seriesInterval);
            $meets[] = $lastMeet;

        }
        yield from $this->space->series($this->meetDuration, ... $meets);
    }
}
