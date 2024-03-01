<?php

declare(strict_types=1);

namespace RpHaven\Games\BranchManager;

use Psr\Http\Message\UriInterface;
use RpHaven\Games\Branch\BranchId;
use RpHaven\Games\Branch\Status;

interface CreateBranchRepository
{
    public function saveBranch(string $branchName, UriInterface $uri, Status $status): BranchId;
}
