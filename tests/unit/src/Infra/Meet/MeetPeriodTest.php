<?php

declare(strict_types=1);

namespace Tests\Unit\Infra\Meet;

use DateTimeImmutable;
use Infra\Meet\MeetPeriod;
use PHPUnit\Framework\TestCase;
use Prophecy\PhpUnit\ProphecyTrait;
use RpHaven\Games\Branch\Space;
use Shrikeh\DateTime\Period;

final class MeetPeriodTest extends TestCase
{
    use ProphecyTrait;

    public function testItCanRecur(): void
    {
        $space = $this->prophesize(Space::class)->reveal();
        $period = Period::create(new DateTimeImmutable(), new DateTimeImmutable('+3 hours'));
        $meet = new MeetPeriod($period, $space);

        foreach ($meet->repeat(7, 5) as $recurrence) {
            var_dump($recurrence);
        }
    }
}
