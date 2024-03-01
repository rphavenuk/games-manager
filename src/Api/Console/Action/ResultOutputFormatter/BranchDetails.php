<?php

declare(strict_types=1);

namespace Api\Console\Action\ResultOutputFormatter;

use Ds\Map;
use Ds\Set;
use Generator;
use RpHaven\Games\Branch;
use RpHaven\Games\Branch\BranchId;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Output\OutputInterface;

final class BranchDetails
{
    public function tabulate(OutputInterface $output, Map $branches): void
    {
        $table = new Table($output);
        $table->setHeaders([
            'Branch ID',
            'Name',
            'Uri',
            'Status'
        ]);
        $this->iterateOverBranches($table, $branches);

        $table->render();
    }

    private function iterateOverBranches(Table $table, Map $branches): void
    {
        foreach ($branches as $branchId => $branch) {
            $table->addRow([
                $branchId,
                $branch->name,
                $branch->uri,
                $branch->status->name,
            ]);
        }
    }
}
