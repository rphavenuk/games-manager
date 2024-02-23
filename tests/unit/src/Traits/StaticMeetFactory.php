<?php

declare(strict_types=1);

namespace Tests\Unit\Traits;

use DateInterval;
use Infra\Factory\MeetFactory;
use RpHaven\Games\Branch\Space\Venue;
use RpHaven\Games\Branch\Space\Venue\Coordinates;

trait StaticMeetFactory
{
    private static ?MeetFactory $meetFactory;

    private static function meetFactory(): MeetFactory
    {
        if (!isset(self::$meetFactory)) {
            $space = new Venue('Test Venue', Coordinates::create(0, 0));
            self::$meetFactory = new MeetFactory($space, new DateInterval("PT3H"));
        }

        return self::$meetFactory;
    }
}
