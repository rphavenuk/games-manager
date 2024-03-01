<?php

declare(strict_types=1);

namespace App\Command\Handler;

use App\Command\CommandHandler;
use App\Command\CreateBranch as CreateBranchCommand;
use App\Result\CreateBranch as CreateBranchResult;
use Psr\Log\LoggerInterface;
use RpHaven\Games\BranchManager;

final readonly class CreateBranch implements CommandHandler
{
    public function __construct(
        private BranchManager $branchManager,
        private LoggerInterface $logger,
    ) {
    }
    public function __invoke(CreateBranchCommand $createBranch): CreateBranchResult
    {
        $this->logStartHandle($createBranch);
        $branch = $this->branchManager->create($createBranch->name, $createBranch->uri);

        return new CreateBranchResult($branch->key(), $branch->current());
    }

    private function logStartHandle(CreateBranchCommand $createBranch): void
    {
        $this->logger->debug(sprintf(
            'Received command %s: name: %s, uri: %s',
            CreateBranchCommand::class,
            $createBranch->name,
            (string) $createBranch->uri
        ));
    }
}
