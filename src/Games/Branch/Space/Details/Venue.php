<?php

declare(strict_types=1);

namespace RpHaven\Games\Branch\Space\Details;

use RpHaven\Games\Branch\Space\Details;
use RpHaven\Games\Branch\Space\Details\Venue\Coordinates;
use RpHaven\Games\Branch\Space\Type;

final readonly class Venue implements Details
{
    public const TYPE = Type::VENUE;

    public function __construct(
        public Coordinates $coordinates,
    ) {
    }

    public function type(): Type
    {
        return self::TYPE;
    }
}
