<?php

declare(strict_types=1);

namespace App\Result;

use App\Result;
use RpHaven\Games\Branch;
use RpHaven\Games\Branch\BranchId;

final readonly class CreateBranch implements Result
{
    public function __construct(
        public BranchId $branchId,
        public Branch $branch,
    ) {
    }

}
