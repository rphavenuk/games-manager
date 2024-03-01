<?php

declare(strict_types=1);

namespace RpHaven\Games\Branch;

use Countable;
use Ds\Set;
use RpHaven\Games\Branch;
use RpHaven\Games\Interface\ToStringable;
use RpHaven\Games\Table;
use RpHaven\Games\Traits\ToString;

final readonly class Tables implements Countable, ToStringable
{
    use ToString;

    public static function create(Branch $branch, Table ...$tables): self
    {
        return new self($branch, new Set($tables));
    }

    private function __construct(public Branch $branch, private Set $tables)
    {
    }

    /**
     * @return iterable<Table>
     */
    public function tables(): iterable
    {
        yield from $this->tables;
    }

    public function add(Table $table): self
    {
        $tables = $this->tables->copy();
        $tables->add($table);

        return new self($this->branch, $tables);
    }

    public function count(): int
    {
        return $this->tables->count();
    }

    public function toString(): string
    {
        return $this->branch->name;
    }
}
