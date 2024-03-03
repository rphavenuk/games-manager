<?php

declare(strict_types=1);

namespace Infra\CommandBus;

use App\Command;
use App\Command\CommandBus;
use App\Result;

use Symfony\Component\Messenger\HandleTrait;
use Symfony\Component\Messenger\MessageBusInterface;

final class SymfonyCommandBus implements CommandBus
{
    use HandleTrait {
        handle as handleCommand;
    }
    public function __construct(MessageBusInterface $commandBus)
    {
        $this->messageBus = $commandBus;
    }

    public function handle(Command $command): Result|null
    {
        return $this->handleCommand($command);
    }
}
