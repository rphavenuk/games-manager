<?php

declare(strict_types=1);

namespace App\Command;

use App\Command;
use Ds\Set;
use Generator;
use RpHaven\Games\Table;

final readonly class CreateTables implements Command
{
    private Set $tables;
    public function __construct(Table ...$tables)
    {
        $this->tables = new Set($tables);
    }

    public function tables(): Generator
    {
        yield from $this->tables;
    }
}
