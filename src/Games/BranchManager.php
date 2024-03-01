<?php

declare(strict_types=1);

namespace RpHaven\Games;

use Generator;
use Psr\Http\Message\UriInterface;
use RpHaven\Games\Branch\Tables;
use RpHaven\Games\Branch\Status;
use RpHaven\Games\BranchManager\CreateBranchRepository;
use RpHaven\Games\BranchManager\UriFactory;

final readonly class BranchManager
{
    public function __construct(
        private CreateBranchRepository $createBranchRepository,
        private UriFactory $uriFactory
    ) {
    }
    public function create(string $name, ?UriInterface $uri = null): Generator
    {
        $uri = $uri ?? $this->uriFactory->create($name);
        $branchId = $this->createBranchRepository->saveBranch($name, $uri, Status::OPEN);
        yield $branchId => new Branch($name, $uri, Status::OPEN);
    }
}
