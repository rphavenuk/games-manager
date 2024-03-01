<?php

declare(strict_types=1);

namespace RpHaven\Games\Attendee;

use RpHaven\Games\Attendee;
use RpHaven\Games\Attendee\Traits\AttendeeName;
use RpHaven\Games\Traits\ToString;

final readonly class Guest implements Attendee
{
    use ToString;
    use AttendeeName;

    public function toString(): string
    {
        return 'Guest';
    }
}
