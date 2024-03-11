<?php

declare(strict_types=1);

namespace RpHaven\Games\Branch\Space\Details;

use RpHaven\Games\Branch\Space\Details;
use RpHaven\Games\Branch\Space\Type;

final readonly class Virtual implements Details
{
    public const TYPE = Type::VIRTUAL;

    public function type(): Type
    {
        return self::TYPE;
    }
}
