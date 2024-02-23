<?php

declare(strict_types=1);

namespace RpHaven\Games\Attendee;

use RpHaven\Games\Attendee;
use RpHaven\Games\Attendee\Traits\AttendeeName;
use RpHaven\Games\Traits\ToString;

final readonly class Member implements Attendee
{
    use ToString;
    use AttendeeName;


    private function __construct(
        public string $publicName,
        public ?Pronouns $pronouns
    ) {
    }

    public function toString(): string
    {
        if ($this->pronouns) {
            return sprintf('%s (%s)', $this->publicName, $this->pronouns->toString());
        }

        return $this->publicName;
    }
}
