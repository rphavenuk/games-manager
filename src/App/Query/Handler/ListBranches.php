<?php

declare(strict_types=1);

namespace App\Query\Handler;

use App\Query\ListBranches as ListBranchesQuery;
use App\Query\QueryHandler;
use App\Result\BranchesList;
use RpHaven\Games\BranchManager;

final readonly class ListBranches implements QueryHandler
{
    public function __construct(private BranchManager $branchManager)
    {

    }

    public function __invoke(ListBranchesQuery $listBranches): BranchesList
    {

    }
}
