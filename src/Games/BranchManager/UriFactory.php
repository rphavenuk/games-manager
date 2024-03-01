<?php

declare(strict_types=1);

namespace RpHaven\Games\BranchManager;

use Psr\Http\Message\UriInterface;

interface UriFactory
{
    public function create(string $branchName): UriInterface;
}
