<?php

declare(strict_types=1);

namespace Api\Console\Action\ListBranches;

use Api\Console\Action\ResultOutputFormatter\BranchDetails;
use Api\Console\ResultOutputFormatter;
use App\Result;
use App\Result\CreateBranch;
use Ds\Map;
use RpHaven\Games\Branch\Status;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Output\OutputInterface;

final readonly class ResultFormatter implements ResultOutputFormatter
{

    public function __construct(private BranchDetails $branchDetails)
    {

    }

    public function format(OutputInterface $output, ?Result $result = null): void
    {
        if (!$result instanceof CreateBranch) {
            throw new \RuntimeException('huh');
        }
        $this->confirmBranchCreated($result, $output);
    }

    private function confirmBranchCreated(CreateBranch $createBranch, OutputInterface $output): void
    {
        $branch = new Map();
        $branch->put($createBranch->branchId, $createBranch->branch);
        $this->branchDetails->tabulate($output, $branch);
    }
}
