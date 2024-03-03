<?php

declare(strict_types=1);

namespace App\Query;

use App\Query;
use App\Query\Exception\ActiveBranchesCannotBeEmpty;
use DateTimeImmutable;
use Ds\Set;
use RpHaven\Games\Branch;
use RpHaven\Games\Branch\Tables;

final readonly class QueryActiveBranchGames implements Query
{
    private Set $branches;
    public function __construct(
        public DateTimeImmutable $date,
        string ...$branches,
    ) {
        if (!count($branches)) {
            throw new ActiveBranchesCannotBeEmpty();
        }

        $this->branches = new Set($branches);
    }

    /**
     * @return iterable<string>
     */
    public function branches(): iterable
    {
        yield from $this->branches;
    }
}
