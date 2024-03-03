<?php

declare(strict_types=1);

namespace Api\Console\Action;

use Api\Console\Action;
use Api\Console\Action\ListBranches\ListBranchesQuery;
use Api\Console\Action\ListBranches\ResultFormatter;
use App\Query\QueryBus;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name:        'rphaven:branch:list',
    description: 'List branches',
)]
final class ListBranches extends Command implements Action
{
    public function __construct(
        private readonly QueryBus $queryBus,
        private readonly ListBranchesQuery $listBranchesQuery,
        private readonly ResultFormatter $resultFormatter
    ) {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $query = $this->listBranchesQuery->build($input, $output);
        $result = $this->queryBus->handle($query);
        $this->resultFormatter->format($output, $result);

        return Command::SUCCESS;
    }
}
