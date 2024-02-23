<?php

declare(strict_types=1);

namespace Infra\QueryBus;

use App\Query;
use App\Query\QueryBus;
use App\Result;
use Symfony\Component\Messenger\HandleTrait;
use Symfony\Component\Messenger\MessageBusInterface;

final class SymfonyQueryBus implements QueryBus
{
    use HandleTrait {
        handle as handleCommand;
    }
    public function __construct(MessageBusInterface $messageBus)
    {
        $this->messageBus = $messageBus;
    }

    public function handle(Query $query): Result
    {
        return $this->handleCommand($command);
    }
}