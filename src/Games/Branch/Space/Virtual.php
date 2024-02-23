<?php

declare(strict_types=1);

namespace RpHaven\Games\Branch\Space;

use RpHaven\Games\Branch\Space;

final readonly class Virtual implements Space
{
    public function jsonSerialize(): array
    {
        return [];
    }
}
