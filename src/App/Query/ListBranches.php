<?php

declare(strict_types=1);

namespace App\Query;

use App\Query;
use Ds\Set;
use Generator;
use RpHaven\Games\Branch\Status;

final readonly class ListBranches implements Query
{
    private readonly Set $statuses;

    public function __construct(Status ...$statuses)
    {
        $this->statuses = new Set($statuses);
    }

    public function statuses(): Generator
    {
        yield from $this->statuses;
    }
}
