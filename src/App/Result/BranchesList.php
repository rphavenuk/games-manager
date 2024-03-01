<?php

declare(strict_types=1);

namespace App\Result;

use App\Result;
use Ds\Map;
use Generator;
use RpHaven\Games\Branch;
use RpHaven\Games\Branch\BranchId;

final readonly class BranchesList implements Result
{
    public static function init(?BranchId $branchId = null, ?Branch $branch = null): self
    {
        $branches = new Map();
        if ($branchId) {
            $branches->put($branchId, $branch);
        }

        return new self($branches);
    }

    private function __construct(private Map $branches)
    {
    }

    public function branches(): Generator
    {
        yield from $this->branches;
    }

    public function with(BranchId $branchId, Branch $branch): self
    {
        $branches = $this->branches->copy();

        $branches->put($branchId, $branch);

        return new self($branches);
    }
}
