<?php

declare(strict_types=1);

namespace App\Command;

use App\Command;
use Ds\Set;
use Generator;
use RpHaven\Games\Branch\Space;

final class CreateSpaces implements Command
{
    private Set $spaces;
    public function __construct(Space ...$spaces)
    {
        $this->spaces = new Set($spaces);
    }

    public function spaces(): Generator
    {
        yield from $this->spaces;
    }
}
