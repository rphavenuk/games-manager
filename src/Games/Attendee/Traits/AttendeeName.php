<?php

declare(strict_types=1);

namespace RpHaven\Games\Attendee\Traits;

use RpHaven\Games\Attendee\Pronouns;

trait AttendeeName
{
    public static function create(string $name, string ...$pronouns): static
    {
        $pronouns = (count($pronouns)) ? Pronouns::create(...$pronouns): null;

        return new static($name, $pronouns);
    }
}
