<?php

declare(strict_types=1);

namespace Infra\Repository\Dbal\BranchGames;

use DateTimeImmutable;
use Doctrine\DBAL\Connection;
use Generator;
use RpHaven\Games\Branch\Tables;
use function Amp\async;
use function Amp\Future;
use function Amp\Future\await;

final class AsyncFactory
{
    public function __construct(private readonly Connection $connection)
    {
    }
    public function futures(DateTimeImmutable $dateTime, string ...$branches): array
    {
        return await($this->createAsync($dateTime, ...$branches));
    }

    private function createAsync(DateTimeImmutable $dateTime, string ...$branches): Generator
    {
        foreach ($branches as $branch) {
            yield async((new Async($this->connection, $dateTime, $branch))(...));
        }
    }
}
