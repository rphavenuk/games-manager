<?php

declare(strict_types=1);

namespace Api\Console\Action;

use Api\Console\Action\CreateBranch\ListBranchesCommand;
use App\Command\CommandBus;
use Api\Console\Action;
use Api\Console\Action\CreateBranch\CreateBranchCommand;
use Api\Console\Action\CreateBranch\ResultFormatter;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name:        'rphaven:branch:create',
    description: 'Create a new Branch',
)]
final class CreateBranch extends Command implements Configurated
{
    public function __construct(
        private readonly CommandBus $commandBus,
        private readonly CreateBranchCommand $createBranchCommand,
        private readonly ResultFormatter $resultFormatter
    ) {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $command = $this->createBranchCommand->build($input, $output);
        $result = $this->commandBus->handle($command);
        $this->resultFormatter->format($output, $result);

        return Command::SUCCESS;
    }
}
